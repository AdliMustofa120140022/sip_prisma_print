<?php

namespace App\Http\Controllers\user;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Cart;
use App\Models\ProdukTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckOutController extends Controller
{
    //
    public function index($transaksi_code)
    {

        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();
        if (!$transaksi) {
            return redirect()->route('user.dashboard')->with('error', 'Transaksi tidak ditemukan');
        }
        $alamat = Alamat::where('user_id', Auth::id())->where('is_default', 1)->first();

        try {
            $responseCity = Http::withHeaders([
                'key' => config('app.rajaongkir.api_key'),
            ])->get('https://api.rajaongkir.com/starter/city');

            $data = $responseCity->json();

            $listCity = $data['rajaongkir']['results'];

            $filteredCity = array_filter($listCity, function ($city) use ($alamat) {
                $kabupatenName = str_replace('Kabupaten', '', $alamat->kabupaten);
                return strtolower($city['city_name']) == strtolower(trim($kabupatenName));
            });


            $cityId = null;

            if (!empty($filteredCity)) {
                $city = reset($filteredCity);
                $cityId = $city['city_id'];
            }
            $responseCost = Http::withHeaders([
                'key' => config('app.rajaongkir.api_key'),
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => config('app.rajaongkir.origin_city_id'),
                'destination' => $cityId,
                'weight' => 5000,
                'courier' => 'jne',
            ]);
            $costData = $responseCost->json();
            $shippingCosts = $costData['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];

            return view('user.checkout.index', compact('transaksi', 'alamat', 'shippingCosts'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'internal server error - ' . $e->getMessage());
        }
    }

    public function product_detail($id, Request $request)
    {
        if ($request->query('origin')) {
            // clear previous_url session
            $request->session()->forget('prev_url');
            $request->session()->put('prev_url', $request->query('origin'));
        }
        $produk_transaksi = ProdukTransaksi::findOrFail($id);

        return view('user.checkout.product_detail', compact('produk_transaksi'));
    }



    public function update_produck_transaksi($id, Request $request)
    {
        $produk_transaksi = ProdukTransaksi::findOrFail($id);

        // dd($request->all());

        $doc_name = FileHelper::uploadFile($request->file('doc_pendukung'), 'doc_pendukung');

        $produk_transaksi->doc_pendukung()->create([
            'doc' => $doc_name,
            'link' => $request->link,
            'catatan' => $request->catatan
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diupdate');
    }

    //buatkah function store untuk menyimpan data checkout?
    public function store(Request $request)
    {
        $items = json_decode($request->input('items'), true);

        $totalharga = 0;
        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
        ]);

        foreach ($items as $item) {

            //ambil semua data yang ada di cart dengan id yang ada di items
            $cart = Cart::findOrFail($item['id']);
            $totalharga += $cart->product->data_produck->harga_satuan * $cart->quantity;
            $transaksi->produk_transaksi()->create([
                'jumlah' => $cart->quantity,
                'produk_id' => $cart->product_id,
                'cart_id' => $cart->id,
            ]);
            // $cart->delete();
        };

        $transaksi->update([
            'total_harga' => $totalharga
        ]);

        // dd('Checkout processed.', $totalharga);

        return redirect()->route('user.checkout.index', $transaksi->transaksi_code);
    }

    public function updateQuantity(Request $request)
    {
        // Ambil ID produk dan kuantitas dari request
        $productId = $request->input('product_id');
        $newQuantity = $request->input('quantity');

        // Validasi kuantitas (tidak boleh negatif)
        if ($newQuantity < 0) {
            return response()->json(['error' => 'Quantity cannot be negative'], 400);
        }

        // Misal kita gunakan Model Product (pastikan Anda telah mengimpor model tersebut)
        $product = ProdukTransaksi::find($productId);

        // Cek apakah produk ada
        if ($product) {
            $product->jumlah = $newQuantity;
            $product->save();

            return response()->json(['message' => "Quantity for product ID $productId updated successfully"], 200);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }

    function checkout(Request $request, $transaksi_code)
    {

        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();

        if (!$transaksi) {
            return redirect()->route('guest.dashboard')->whit('error', 'Transaksi tidak ditemukan');
        }

        $transaksi->update([
            'status' => 'make'
        ]);

        foreach ($transaksi->produk_transaksi as $produk_transaksi) {
            $produk_transaksi->produk->update([
                'stok' => $produk_transaksi->produk->stok - $produk_transaksi->jumlah
            ]);
            $produk_transaksi->cart->delete();
        }

        $transaksi->transaksi_data()->create([
            'alamat_id' => $request->alamat_id,
            'metode_pengiriman' => $request->metode_pengiriman,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);



        dd($request->all(), $transaksi);
    }
}
