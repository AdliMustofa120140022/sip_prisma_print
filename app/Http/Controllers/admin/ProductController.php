<?php

namespace App\Http\Controllers\admin;

use App\DataTables\ProdukDataTable;
use App\Http\Controllers\Controller;
use App\Models\Produck;
use App\Models\SubKatagori;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected function fileUpload($file, $path)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path, $fileName);
        return $fileName;
    }

    public function index(ProdukDataTable $dataTable)

    {
        $producks = Produck::all();

        // dd($producks);
        return view('admin.porduct.index', compact('producks'));
    }

    public function create()
    {
        $sub_katagoris = SubKatagori::all();
        return view('admin.porduct.create', compact('sub_katagoris'));
    }

    public function store(Request $request)
    {


        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sub_kategori_id' => 'required',

            'stok' => 'required | numeric',
            'lebar' => 'required | numeric',
            'panjang' => 'required | numeric',
            'tinggi' => 'required | numeric',
            'berat' => 'required | numeric',
            'bahan' => 'required',
            'warna' => 'required',
            'jenis_cetak' => 'required',
            'resolusi' => 'required',
            'finishing' => 'required',
            'kertas' => 'required',
            'ketebalan_kertas' => 'required',
            'tinta' => 'required',
            'harga_satuan' => 'required | numeric',
            'harga_grosir' => 'nullable|numeric',
            'minimal_grosir' =>  'nullable|numeric',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'nullable| date',
            'lokasi' => 'required',
            'supplier' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:10048'
        ], [
            'name.required' => 'Nama produk wajib diisi',
            'description.required' => 'Deskripsi produk wajib diisi',
            'sub_kategori_id.required' => 'Sub Kategori wajib diisi',

            'stok.required' => 'Stok wajib diisi',
            'lebar.required' => 'Lebar wajib diisi',
            'panjang.required' => 'Panjang wajib diisi',
            'tinggi.required' => 'Tinggi wajib diisi',
            'berat.required' => 'Berat wajib diisi',
            'bahan.required' => 'Bahan wajib diisi',
            'warna.required' => 'Warna wajib diisi',
            'jenis_cetak.required' => 'Jenis Cetak wajib diisi',
            'resolusi.required' => 'Resolusi wajib diisi',
            'finishing.required' => 'Finishing wajib diisi',
            'kertas.required' => 'Kertas wajib diisi',
            'ketebalan_kertas.required' => 'Ketebalan Kertas wajib diisi',
            'tinta.required' => 'Tinta wajib diisi',
            'harga_satuan.required' => 'Harga Satuan wajib diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'supplier.required' => 'Supplier wajib diisi',
            'image.*.image' => 'File harus berupa gambar',
            'image.*.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.*.max' => 'Ukuran gambar maksimal 10MB',
        ]);





        $Produck = Produck::create([
            'name' => $request->name,
            'description' => $request->description,
            'sub_kategori_id' => $request->sub_kategori_id,
        ]);

        $Produck->data_produck()->create([
            'stok' => $request->stok,
            'lebar' => $request->lebar,
            'panjang' => $request->panjang,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'bahan' => $request->bahan,
            'warna' => $request->warna,
            'jenis_cetak' => $request->jenis_cetak,
            'resolusi' => $request->resolusi,
            'finishing' => $request->finishing,
            'kertas' => $request->kertas,
            'ketebalan_kertas' => $request->ketebalan_kertas,
            'tinta' => $request->tinta,
            'harga_satuan' => $request->harga_satuan,
            'harga_grosir' => $request->harga_grosir,
            'minimal_grosir' => $request->minimal_grosir,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'lokasi' => $request->lokasi,
            'supplier' => $request->supplier,
        ]);

        foreach ($request->image as $image) {
            $Produck->img_produck()->create([
                'img' => $this->fileUpload($image, 'public/img/produck'),
            ]);
        }

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
    }


    public function show($id)
    {
        $produck = Produck::find($id);
        $sub_katagoris = SubKatagori::all();
        return view('admin.porduct.show', compact('produck', 'sub_katagoris'));
    }

    public function edit($id)
    {
        $produck = Produck::find($id);
        $sub_katagoris = SubKatagori::all();
        return view('admin.porduct.edit', compact('produck', 'sub_katagoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sub_kategori_id' => 'required',

            'stok' => 'required | numeric',
            'lebar' => 'required | numeric',
            'panjang' => 'required | numeric',
            'tinggi' => 'required | numeric',
            'berat' => 'required | numeric',
            'bahan' => 'required',
            'warna' => 'required',
            'jenis_cetak' => 'required',
            'resolusi' => 'required',
            'finishing' => 'required',
            'kertas' => 'required',
            'ketebalan_kertas' => 'required',
            'tinta' => 'required',
            'harga_satuan' => 'required | numeric',
            'harga_grosir' => 'nullable|numeric',
            'minimal_grosir' =>  'nullable|numeric',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'nullable| date',
            'lokasi' => 'required',
            'supplier' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:10048'
        ], [
            'name.required' => 'Nama produk wajib diisi',
            'description.required' => 'Deskripsi produk wajib diisi',
            'sub_kategori_id.required' => 'Sub Kategori wajib diisi',

            'stok.required' => 'Stok wajib diisi',
            'lebar.required' => 'Lebar wajib diisi',
            'panjang.required' => 'Panjang wajib diisi',
            'tinggi.required' => 'Tinggi wajib diisi',
            'berat.required' => 'Berat wajib diisi',
            'bahan.required' => 'Bahan wajib diisi',
            'warna.required' => 'Warna wajib diisi',
            'jenis_cetak.required' => 'Jenis Cetak wajib diisi',
            'resolusi.required' => 'Resolusi wajib diisi',
            'finishing.required' => 'Finishing wajib di isi',
            'kertas.required' => 'Kertas wajib diisi',
            'ketebalan_kertas.required' => 'Ketebalan Kertas wajib diisi',
            'tinta.required' => 'Tinta wajib diisi',
            'harga_satuan.required' => 'Harga Satuan wajib diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'supplier.required' => 'Supplier wajib diisi',
            'image.*.image' => 'File harus berupa gambar',
            'image.*.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.*.max' => 'Ukuran gambar maksimal 10MB',
        ]);

        $Produck = Produck::find($id);
        $Produck->update([
            'name' => $request->name,
            'description' => $request->description,
            'sub_kategori_id' => $request->sub_kategori_id,
        ]);

        $Produck->data_produck()->update([
            'stok' => $request->stok,
            'lebar' => $request->lebar,
            'panjang' => $request->panjang,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'bahan' => $request->bahan,
            'warna' => $request->warna,
            'jenis_cetak' => $request->jenis_cetak,
            'resolusi' => $request->resolusi,
            'finishing' => $request->finishing,
            'kertas' => $request->kertas,
            'ketebalan_kertas' => $request->ketebalan_kertas,
            'tinta' => $request->tinta,
            'harga_satuan' => $request->harga_satuan,
            'harga_grosir' => $request->harga_grosir,
            'minimal_grosir' => $request->minimal_grosir,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'lokasi' => $request->lokasi,
            'supplier' => $request->supplier,
        ]);

        if ($request->hasFile('image')) {
            foreach ($Produck->img_produck as $img) {
                unlink(storage_path('app/public/img/produck/' . $img->img));
                $img->delete();
            }

            foreach ($request->image as $image) {
                $Produck->img_produck()->create([
                    'img' => $this->fileUpload($image, 'public/img/produck'),
                ]);
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diubah');
    }
}
