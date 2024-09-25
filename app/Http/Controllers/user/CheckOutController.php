<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    //
    public function index($transaksi_code)
    {
        // dd($transaksi_code);
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();
        if (!$transaksi) {
            return redirect()->route('user.dashboard')->with('error', 'Transaksi tidak ditemukan');
        }
        return view('user.checkout.index', compact('transaksi'));
    }

    public function product_detail($id)
    {
        return view('user.checkout.product_detail');
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
            $cart = Cart::find($item['id']);
            $totalharga += $cart->product->data_produck->harga_satuan * $cart->quantity;
            $transaksi->produk_transaksi()->create([
                'jumlah' => $cart->quantity,
                'produk_id' => $cart->product_id,
            ]);
            $cart->delete();
        };

        $transaksi->update([
            'total_harga' => $totalharga
        ]);

        // dd('Checkout processed.', $totalharga);

        return redirect()->route('user.checkout.index', $transaksi->transaksi_code);
    }
}
