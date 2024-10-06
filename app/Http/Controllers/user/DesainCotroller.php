<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DesainProdukTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DesainCotroller extends Controller
{
    public function index($transaksi_code)
    {
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->first();
        return view('user.desain.index', compact('transaksi'));
    }

    public function confirm(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        if ($request->status == 'rejected') {
            $request->validate([
                'catatan' => 'required|max:255'
            ]);
        }

        $desain_produk_transaksi = DesainProdukTransaksi::find($id);

        $desain_produk_transaksi->update([
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        return redirect()->back()->with('success', 'Desain berhasil konformasi');
    }
}
