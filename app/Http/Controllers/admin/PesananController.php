<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {

        $transaksis = Transaksi::where('status', '!=', 'make')->get();;
        return view('admin.pesanan.index', compact('transaksis'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $status_update = $request->update_status;

        if ($status_update == 'payment' and $transaksi->transaksi_data->payment_status != 'aproved') {
            return redirect()->route('admin.pembayaran.confirm', $id);
        } else {
            return redirect()->route('admin.pesanan.index')->with('error', 'transaksi sedang dalam proses');
        }
    }
}
