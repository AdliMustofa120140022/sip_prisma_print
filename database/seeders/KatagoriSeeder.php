<?php

namespace Database\Seeders;

use App\Models\Katagori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatagoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $katagoris = [
            ['nama' => 'kantor'],
            ['nama' => 'acara'],
            ['nama' => 'pendidikan'],
            ['nama' => 'retail'],
            ['nama' => 'personal'],
        ];

        Katagori::insert($katagoris);
    }
}
