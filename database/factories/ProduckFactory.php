<?php

namespace Database\Factories;

use App\Models\Produck;
use App\Models\SubKatagori;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduckFactory extends Factory
{
    protected $model = Produck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $subKategoriIds = SubKatagori::pluck('id')->toArray();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'sub_kategori_id' => $this->faker->randomElement($subKategoriIds),
        ];
    }

    public function withDataProduck()
    {
        return $this->state(function (array $attributes) {
            return [];
        })->afterCreating(function (Produck $produck) {
            $produck->data_produck()->create([
                'sepesifiksai' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt culpa qui officia deserunt mollit anim id est laborum',
                'stok' => 100,
                'lebar' => 10,
                'panjang' => 10,
                'tinggi' => 10,
                'berat' => 10,
                'bahan' => 'Art Paper',
                'warna' => 'Putih',
                'jenis_cetak' => 'DTG',
                'resolusi' => '1440',
                'finishing' => 'Cutting',
                'kertas' => 'Art Paper',
                'ketebalan_kertas' => 0.1,
                'tinta' => 'Art Paper',
                'harga_satuan' => 10000,
                'harga_grosir' => 9000,
                'minimal_grosir' => 10,
                'tanggal_masuk' => now(),
                'lokasi' => 'Gudang',
                'supplier' => 'PT. Supplier',
            ]);
        });
    }
}
