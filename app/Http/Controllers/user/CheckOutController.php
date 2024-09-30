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
                if ($city['type'] == 'Kabupaten') {
                    $kabupatenName = str_replace('Kabupaten', '', $alamat->kabupaten);
                } else {
                    $kabupatenName = str_replace('Kota', '', $alamat->kabupaten);
                }
                return strtolower($city['city_name']) == strtolower(trim($kabupatenName));
            });

            $cityId = null;

            if (!empty($filteredCity)) {
                $city = reset($filteredCity);
                $cityId = $city['city_id'];
            }

            $total_weight = 0;
            foreach ($transaksi->produk_transaksi as $produk_transaksi) {
                $produck_weight = $produk_transaksi->produck->data_produck->berat * $produk_transaksi->jumlah;
                $total_weight += $produck_weight;
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

        $request->validate([
            'catatan' => 'required',
        ]);
        $produk_transaksi = ProdukTransaksi::findOrFail($id);

        if ($request->hasFile('doc_pendukung')) {
            // Jika file ada, lakukan upload
            $doc_name = FileHelper::uploadFile($request->file('doc_pendukung'), 'doc_pendukung');
        } else {
            $doc_name = $produk_transaksi->doc_pendukung->doc ?? null;
        }

        $existingDoc = $produk_transaksi->doc_pendukung()->first();

        if ($existingDoc) {
            $existingDoc->update([
                'doc' => $doc_name,
                'link' => $request->link,
                'catatan' => $request->catatan,
            ]);
        } else {
            $produk_transaksi->doc_pendukung()->create([
                'doc' => $doc_name,
                'link' => $request->link,
                'catatan' => $request->catatan,
            ]);
        };

        $url = $request->session()->get('prev_url') ?? route('user.dashboard');

        return redirect($url)->with('success', 'Produk berhasil diupdate');

        // return redirect()->->with('success', 'Produk berhasil diupdate');
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
        $shiping_cost = $request->shiping_cost;

        $payment_metode = $request->pembayaran;

        if ($request->pembayaran == 'walet' || $request->pembayaran == 'transfer_bank') {
            $payment_metode = $request->via_id;
        }
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();

        if (!$transaksi) {
            return redirect()->route('guest.dashboard')->whit('error', 'Transaksi tidak ditemukan');
        }

        $total_pice = 0;
        $admin_price = 1000;

        foreach ($transaksi->produk_transaksi as $produk_transaksi) {
            $produk_transaksi->produck->data_produck->update([
                'stok' => $produk_transaksi->produck->data_produck->stok - $produk_transaksi->jumlah
            ]);
            $price = $produk_transaksi->produck->data_produck->harga_satuan * $produk_transaksi->jumlah;
            $total_pice += $price;

            Cart::destroy($produk_transaksi->cart_id);
        }

        $transaksi->update([
            'status' => 'payment',
            'total_harga' => $shiping_cost + $admin_price + $total_pice,
        ]);

        $transaksi->transaksi_data()->create([
            'alamat_id' => $request->alamat_id,
            'metode_pengiriman' => $request->pengiriman,
            'metode_pembayaran' => $payment_metode,
        ]);

        return redirect()->route('user.transaksi.index')->with('success', 'Transaksi berhasil');
    }
}
