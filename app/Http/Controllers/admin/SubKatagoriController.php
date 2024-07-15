<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\SubKatagori;
use Illuminate\Http\Request;

class SubKatagoriController extends Controller
{

    protected function fileUpload($request, $name, $path)
    {
        $file = $request->file($name);
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path, $fileName);
        return $fileName;
    }
    //
    public function index()
    {
        $katagoris = Katagori::all();

        $sub_katagoris = SubKatagori::paginate(10);
        return view('admin.subKatagori.index', compact('sub_katagoris', 'katagoris'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'katagori_id' => 'required',
            'description' => 'required',
            'image' => 'required | image | max:10048',
        ], [
            'name.required' => 'Nama harus diisi',
            'katagori_id.required' => 'Katagori harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar maksimal 10MB',
        ]);


        SubKatagori::create([
            'name' => $request->name,
            'category_id' => $request->katagori_id,
            'description' => $request->description,
            'image' => $this->fileUpload($request, 'image', 'public/img/sub-katagori'),
        ]);

        return redirect()->route('admin.sub-kategori.index')->with('success', 'Sub Katagori berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'katagori_id' => 'required',
            'description' => 'required',
            'image' => ' image | max:2048',
        ], [
            'name.required' => 'Nama harus diisi',
            'katagori_id.required' => 'Katagori harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'image.image' => 'File harus berupa gambar',
        ]);

        SubKatagori::find($id)->update([
            'name' => $request->name,
            'category_id' => $request->katagori_id,
            'description' => $request->description,
            'image' => $request->image ? $this->fileUpload($request, 'image', 'public/img/sub-katagori') : SubKatagori::find($id)->image
        ]);

        return redirect()->route('admin.sub-kategori.index')->with('success', 'Sub Katagori berhasil diubah');
    }

    public function destroy($id)
    {
        SubKatagori::destroy($id);
        return redirect()->route('admin.sub-kategori.index')->with('success', 'Sub Katagori berhasil dihapus');
    }
}
