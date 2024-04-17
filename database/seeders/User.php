<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'phong',
                'email' => 'phong@gmail.com',
                'phone_number' => 0321565465,
                'address' => 'TanLap2',
                'password' => bcrypt('123123'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'OWNER',
                'email' => 'owner@gmail.com',
                'phone_number' => 0321565465,
                'address' => 'TanLap2',
                'password' => bcrypt('123456'),
                'role_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
