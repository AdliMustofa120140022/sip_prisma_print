<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        return view('user.transaksi.index');
    }

    public function show()
    {
        return view('user.transaksi.show');
    }
}
