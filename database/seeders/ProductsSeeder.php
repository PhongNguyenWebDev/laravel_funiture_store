<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 0; $i <= 10; $i++) {
        //     DB::table('products')->insert([
        //         'product_name' => Str::random(20),
        //         'description' => Str::random(20),
        //         'price' => rand(100, 1000),
        //         'quantity' => rand(1, 10),
        //         'image' => $faker->imageUrl(),
        //     ]);
        // }

        // for ($i=1; $i<=20 ; $i++) { 
        //     DB::table('products')->insert([
        //         'name' => Str::random(20),
        //         'description' => Str::random(20),
        //         'price' => rand(100, 1000),
        //         'quantity' => rand(1, 10),
        //         'image' => Str::random(20),
        //     ]);
        }
    }

