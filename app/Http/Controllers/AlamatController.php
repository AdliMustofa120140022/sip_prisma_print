<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('origin')) {
            // clear previous_url session
            $request->session()->forget('previous_url');
            $request->session()->put('previous_url', $request->query('origin'));
        }
        $alamats = Alamat::where('user_id', Auth::id())->get();
        return view('user.alamat.index', compact('alamats'));
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

        if ($request->is_default) {
            Alamat::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        Alamat::create([
            'user_id' => Auth::id(),
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

    public function edit($id)
    {
        $alamat = Alamat::find($id);
        return view('user.alamat.edit', compact('alamat'));
    }

    public function update(Request $request, $id)
    {
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

        if ($request->is_default) {
            Alamat::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        Alamat::find($id)->update([
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

        return redirect()->route('user.alamat.index')->with('success', 'Alamat berhasil diubah');
    }

    public function destroy($id)
    {
        Alamat::find($id)->delete();
        return redirect()->back()->with('success', 'Alamat berhasil dihapus');
    }

    public function setDefault($id)
    {
        Alamat::where('user_id', Auth::id())->update(['is_default' => false]);
        Alamat::find($id)->update(['is_default' => true]);
        return redirect()->back()->with('success', 'Alamat berhasil dijadikan default');
    }
}
