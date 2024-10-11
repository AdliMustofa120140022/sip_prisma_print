<?php

namespace App\Http\Controllers\user;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function create($id)
    {
        $transaksi = Transaksi::find($id);

        return view('user.return.index', compact('transaksi', 'katagori'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required',
            'bukti' => 'required||mimes:jpg,jpeg,png|max:20048',
        ]);

        $buktiRetun = FileHelper::uploadFile($request->file('bukti'), 'bukti_return');

        $transaksi = Transaksi::find($id);

        $transaksi->status = 'return';
        $transaksi->save();

        $transaksi->return_transaksi()->create([
            'alasan' => $request->alasan,
            'bukti' => $buktiRetun,
        ]);

        return redirect()->route('user.transaksi.index');
    }
}
