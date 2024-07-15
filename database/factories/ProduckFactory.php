<?php

namespace Database\Factories;

use App\Models\Produck;
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
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'sub_kategori_id' => 1, // Adjust as necessary
        ];
    }

    public function withDataProduck()
    {
        return $this->state(function (array $attributes) {
            return [];
        })->afterCreating(function (Produck $produck) {
            $produck->data_produck()->create([
                'stok' => 100,
                'harga' => 10000,
                'lebar' => 10,
                'panjang' => 10,
                'tinggi' => 10,
                'berat' => 10,
                'warna' => 'Putih',
                'jensi_cetak' => 'DTG',
                'resolusi' => '1440',
                'finishing' => 'Cutting',
                'kertas' => 'Art Paper',
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
