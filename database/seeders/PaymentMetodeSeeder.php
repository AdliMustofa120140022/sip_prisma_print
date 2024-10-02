<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMetodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'name' => 'bayar di tempat',
                'type' => 'toko',
            ],
            [
                'name' => 'qris',
                'type' => 'qris',
            ],
            [
                'name' => 'BCA',
                'type' => 'bank',
                'rekening' => '1234567890',
            ],
            [
                'name' => 'BNI',
                'type' => 'bank',
                'rekening' => '1234567890',
            ],
            [
                'name' => 'BRI',
                'type' => 'bank',
                'rekening' => '1234567890',
            ],
            [
                'name' => 'Mandiri',
                'type' => 'bank',
                'rekening' => '1234567890',
            ],
            [
                'name' => 'GOPAY',
                'type' => 'wallet',
                'rekening' => '081234567890',
            ],
            [
                'name' => 'OVO',
                'type' => 'wallet',
                'rekening' => '081234567890',
            ],
            [
                'name' => 'DANA',
                'type' => 'wallet',
                'rekening' => '081234567890',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\PaymentMetode::create($item);
        }
    }
}
