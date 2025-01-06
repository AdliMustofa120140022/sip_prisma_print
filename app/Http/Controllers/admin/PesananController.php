<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {

        $transaksis = Transaksi::where('status', '!=', 'make')
            ->orderBy('created_at', 'desc')
            ->get();;
        return view('admin.pesanan.index', compact('transaksis'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $status_update = $request->update_status;

        $transaksi->update([
            'status' => $status_update
        ]);

        if ($status_update == 'payment' and $transaksi->transaksi_data->payment_status != 'approved') {
            return redirect()->route('admin.pembayaran.confirm', $id);
        } elseif ($status_update == 'desain') {
            return redirect()->route('admin.desain.add', $id);
        } elseif ($status_update == 'kirim') {
            return redirect()->route('admin.pengiriman.show', $id);
        } else {
            return redirect()->route('admin.pesanan.index')->with('success', 'transaksi sedang dalam proses');
        }
    }
}
