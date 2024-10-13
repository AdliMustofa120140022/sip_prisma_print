<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\MailNotif;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransaksiController extends Controller
{
    //
    public function index()
    {

        $transaksis = Transaksi::where('user_id', Auth::id())->get();
        return view('user.transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {

        $transaksi = Transaksi::findOrFail($id);
        return view('user.transaksi.show', compact('transaksi'));
    }

    public function done($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'selesai';
        $transaksi->transaksi_data->shiping_done_time = now();
        $transaksi->transaksi_data->save();
        $transaksi->save();

        Mail::to($transaksi->user->email)->send(new MailNotif($transaksi, $transaksi->user, 'Transaksi Selesai'));
        return redirect()->back()->with('success', 'Transaksi Selesai');
    }
}
