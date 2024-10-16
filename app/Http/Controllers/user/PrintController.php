<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    public function print_invoice($transaksi_code)
    {
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();

        return view('user.print.inv', compact('transaksi'));
    }

    public function print_pesan($transaksi_code)
    {
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();

        return view('user.print.surat_pesanan', compact('transaksi'));
    }

    public function print_ba($transaksi_code)
    {
        $transaksi = Transaksi::where('transaksi_code', $transaksi_code)->where('user_id', Auth::id())->first();

        return view('user.print.ba', compact('transaksi'));
    }
}
