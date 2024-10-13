<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Mail\MailNotif;
use App\Models\ProdukTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DesainController extends Controller
{
    //

    public function index()
    {
        $transaksis = Transaksi::where('status', 'desain')->get();;
        return view('admin.desain.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('admin.desain.desain', compact('transaksi'));
    }

    public function add(Request $request, $id)
    {
        $request->validate([
            'desain_produk' => 'required|max:300000'
        ]);

        $produk_transaksi = ProdukTransaksi::find($id);

        $produk_transaksi->transaksi->transaksi_data()->update([
            'desain_time' => now()
        ]);

        $desain_produk = FileHelper::uploadFile($request->file('desain_produk'), 'desain_produk');

        if ($produk_transaksi->desain_produk_transaksi) {
            FileHelper::deleteFile($produk_transaksi->desain_produk_transaksi->desain);
            $produk_transaksi->desain_produk_transaksi->update([
                'desain' => $desain_produk,
                'status' => 'pending',
            ]);
        } else {
            $produk_transaksi->desain_produk_transaksi()->create([
                'desain' => $desain_produk,
                'status' => 'pending',
            ]);
        }

        Mail::to($produk_transaksi->transaksi->user->email)->send(new MailNotif($produk_transaksi->transaksi, $produk_transaksi->transaksi->user, 'Desain Produk'));

        return redirect()->back()->with('success', 'Desain berhasil diupload');
    }
}
