<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {

        $transaksis = Transaksi::whereNotIn('status', ['make', 'gagal'])->get();
        // $transaksis = Transaksi::where('status', 'payment')->get();
        return view('admin.pembayaran.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('admin.pembayaran.confirm', compact('transaksi'));
    }


    public function paymentConfirm(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required'
        ]);
        if ($request->status_pembayaran == 'rejected') {
            $request->validate([
                'payment_note' => 'required',
            ]);
        }

        $transaksi = Transaksi::find($id);


        $transaksi->transaksi_data->update([
            'payment_status' => $request->status_pembayaran,
            'payment_note' => $request->payment_note,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil di konfirmasi');
    }
}
