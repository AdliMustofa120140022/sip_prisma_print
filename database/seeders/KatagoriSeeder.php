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
            ['nama' => 'Acara'],
            ['nama' => 'Kantor'],
            ['nama' => 'Pendidikan'],
            ['nama' => 'Promosi'],
            ['nama' => 'Retail'],
            ['nama' => 'personal'],
            ['nama' => 'Alat Tulis Kantor'],
        ];

        Katagori::insert($katagoris);
    }
}
