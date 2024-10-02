<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
