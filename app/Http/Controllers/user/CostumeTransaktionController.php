<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostumeTransaktionController extends Controller
{
    public function index()
    {
        $katagoris = Katagori::with('sub_katagori')->get();

        return view('user.costume.create', compact('katagoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'      => 'required|string|max:255',
            'category_id'       => 'required',
            'sub_kategori_id'   => 'nullable',
            'theme'             => 'required|string|max:255',
            'length_cm'         => 'required|numeric|min:0',
            'width_cm'          => 'required|numeric|min:0',
            'height_gram'       => 'required|numeric|min:0',
            'thickness_cm'      => 'nullable|numeric|min:0',
            'sheet_count'       => 'nullable|integer|min:1',
            'material'          => 'required|string|max:255',
            'color'             => 'required|string|max:255',
            'print_type'        => 'required|string|max:255',
            'print_resolution'  => 'nullable|string|max:255',
            'finishing'         => 'required|string|max:255',
            'ink_type'          => 'required|string|max:255',
            'order_quantity'    => 'required|integer|min:1',
            'unit'              => 'required|string|max:50',
            'usage_deadline'    => 'nullable|date|after_or_equal:today',
        ]);


        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'tansaktion_type' => 'costume',
        ]);

        $transaksi->costume_transaksi()->create($request->all());
        $transaksi->produk_transaksi()->create([
            'jumlah' => $request->order_quantity,
        ]);

        return redirect()->route('user.transaksi.index')->with('success', 'Pesanan Kostume berhasil dibuat');
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);

        return view('user.costume.show', compact('transaksi'));
    }
}
