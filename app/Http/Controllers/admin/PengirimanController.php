<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('status', 'Pengiriman')->get();;
        return view('admin.pengiriman.index', compact('transaksis'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'resi' => 'required|max:255'
        ]);
        $transaksi = Transaksi::find($id);
        $transaksi->transaksi_data()->update([
            'resi' => $request->resi,
            'shiping_time' => now()
        ]);
        return redirect()->back()->with('success', 'Transaksi berhasil diubah');
    }
}
