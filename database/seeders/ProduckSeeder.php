<?php

namespace Database\Seeders;

use App\Models\Produck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produck::factory()
            ->count(5)
            ->withDataProduck()
            ->create();
    }
}
