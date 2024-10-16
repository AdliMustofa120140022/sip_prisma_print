<?php

namespace Database\Seeders;

use App\Models\SubKatagori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKatagoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SubKatagori::create([
            'name' => 'Bener',
            'description' => 'Bener For acara',
            'category_id' => 1,
        ]);

        SubKatagori::factory()
            ->count(10)
            ->create();
    }
}
