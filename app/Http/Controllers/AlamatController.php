<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function index()
    {

        $alamat = Alamat::where('user_id', auth()->id())->get();
        dd($alamat);
        return view('user.alamat.index', compact('alamat'));
    }

    public function create()
    {
        return view('user.alamat.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_penerima' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'label' => 'required',
            'catatan' => 'nullable',
        ]);


        Alamat::create([
            'user_id' => auth()->id(),
            'nama_penerima' => $request->nama_penerima,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'catatan' => $request->catatan,
            'label' => $request->label,
            'is_default' => $request->is_default ? true : false,
        ]);

        return redirect()->route('user.alamat.index')->with('success', 'Alamat berhasil ditambahkan');
    }
}
