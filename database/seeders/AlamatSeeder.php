<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::where('role', 'user')->first();

        $user->alamat()->create([
            'nama_penerima' => 'Test User',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Test No. 1',
            'kelurahan' => 'Alam Jaya',
            'kecamatan' => 'Kotabumi Selatan',
            'kabupaten' => 'Kabupaten Lampung Utara',
            'provinsi' => 'Lampung',
            'kode_pos' => '34567',
            'label' => 'rumah',
            'is_default' => true,
        ]);
    }
}
