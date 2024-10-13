<?php

namespace App\Http\Controllers\user;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index($transaksi_code)
    {

        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();
        return view('user.payment.index', compact('transaksi'));
    }

    public function store(Request $request, $transaksi_code)
    {
        // dd($request->all());
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();
        $request->validate([
            'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png|max:10048'

        ]);


        $bukti_pembayaran = FileHelper::uploadFile($request->file('bukti_pembayaran'), 'bukti_pembayaran');
        // $bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran');

        $transaksi->status = 'payment';
        $transaksi->save();

        $transaksi->transaksi_data->update([
            'bukti_pembayaran' => $bukti_pembayaran,
            'payment_status' => 'pending',
            'payment_time' => now(),
        ]);

        return redirect()->route('user.transaksi.index')->with('success', 'Bukti pembayaran berhasil diupload');
    }
}
