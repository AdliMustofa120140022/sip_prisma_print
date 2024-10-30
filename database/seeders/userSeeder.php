<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::truncate();
        $users = [
            [
                'name' => 'test user',
                'email' => 'test.user@sip.com'
            ],
            [
                'name' => 'test admin',
                'email' => 'test.admin@sip.com',
                'role' => 'admin'
            ],
            [
                'name' => 'admin',
                'email' => 'perc.primaprinting@gmail.com',
                'role' => 'admin'
            ],
            [
                'name' => 'test super admin',
                'email' => 'test.super.admin@sip.com',
                'role' => 'super_admin'
            ],
            [
                'name' => 'super admin',
                'email' => 'nurwiyadi77@gmail.com',
                'role' => 'super_admin'
            ],
            [
                'name' => 'Super Adli',
                'email' => 'adlimustofa056@gmail.com',
                'role' => 'super_admin'
            ]
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
