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

        $status_update = $request->update_status;

        dd($status_update);
    }
}
