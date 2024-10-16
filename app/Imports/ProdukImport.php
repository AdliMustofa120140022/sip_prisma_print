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
                'lebar' => $row[4],
                'panjang' => $row[5],
                'tinggi' => $row[6],
                'berat' => $row[7],
                'bahan' => $row[8],
                'warna' => $row[9],
                'jenis_cetak' => $row[10],
                'resolusi' => $row[11],
                'finishing' => $row[12],
                'kertas' => $row[13],
                'ketebalan_kertas' => $row[14],
                'tinta' => $row[15],
                'harga_satuan' => $row[16],
            ]);
        }
    }
}
