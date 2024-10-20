<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CostumeTransaktionController extends Controller
{
    public function index()
    {

        $transaksis = Transaksi::where('tansaktion_type', 'costume')->where('status', '=', 'make')->get();
        return view('admin.costume.index', compact('transaksis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $transaksi = Transaksi::find($id);

        if ($request->status == 'approved') {
            $request->validate([
                'harga' => 'required|integer|min:0'
            ]);

            $transaksi->costume_transaksi->update([
                'status' => $request->status,
                'harga' => $request->harga
            ]);
        } else {
            $request->validate([
                'Catatan' => 'required|string'
            ]);

            $transaksi->costume_transaksi->update([
                'status' => $request->status,
                'note' => $request->Catatan
            ]);
        }

        if ($request->status  == 'approved') {
            return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan Kustom berhasil diapprove');
        } else {
            return redirect()->back()->with('success', 'Pesanan Kustom berhasil direject');
        }
    }
}
