<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Smartphone',
                'category_id' => 1,
                'stock' => 100,
                'price' => 599.99,
                'image' => 'smartphone.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop',
                'category_id' => 1,
                'stock' => 50,
                'price' => 999.99,
                'image' => 'laptop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
