<?php

namespace App\Imports;

use App\Models\Produck;
use App\Models\SubKatagori;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProdukImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $row) {

            if ($index < 2) continue;

            //cek if category exist
            $category = SubKatagori::where('name', $row[2])->first();

            if (!$category) {
                continue;
            }

            // dd($row);

            $produck = Produck::create([
                'name' => $row[0],
                'description' => $row[1],
                'sub_kategori_id' => $category->id,
            ]);

            $produck->data_produck()->create([
                'stok' => $row[3],
                'satuan' => $row[4],
                'panjang' => $row[5],
                'lebar' => $row[6],
                'tinggi' => $row[7],
                'berat' => $row[8],
                'bahan' => $row[9],
                'warna' => $row[10],
                'jenis_cetak' => $row[11],
                'resolusi' => $row[12],
                'finishing' => $row[13],
                'kertas' => $row[14],
                'ketebalan_kertas' => $row[15],
                'tinta' => $row[16],
                'harga_satuan' => $row[17],
                'minimal_grosir' => $row[18],
            ]);
        }
    }
}
