<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('products')->insert([
        //     [
        //         'name' => 'Smartphone',
        //         'category_id' => 1,
        //         'stock' => 100,
        //         'price' => 599.99,
        //         'image' => 'smartphone.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Laptop',
        //         'category_id' => 1,
        //         'stock' => 50,
        //         'price' => 999.99,
        //         'image' => 'laptop.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);

        DB::table('products')->insert([
            // Electronics category (category_id = 1)
            [
                'name' => 'Smartphone',
                'category_id' => 1,
                'stock' => 100,
                'price' => 599.99,
                'image' => 'smartphone.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Laptop',
                'category_id' => 1,
                'stock' => 50,
                'price' => 999.99,
                'image' => 'laptop.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tablet',
                'category_id' => 1,
                'stock' => 70,
                'price' => 299.99,
                'image' => 'tablet.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Smartwatch',
                'category_id' => 1,
                'stock' => 150,
                'price' => 199.99,
                'image' => 'smartwatch.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Headphones',
                'category_id' => 1,
                'stock' => 120,
                'price' => 89.99,
                'image' => 'headphones.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Books category (category_id = 2)
            [
                'name' => 'Science Fiction Novel',
                'category_id' => 2,
                'stock' => 200,
                'price' => 14.99,
                'image' => 'sci-fi-novel.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mystery Thriller',
                'category_id' => 2,
                'stock' => 150,
                'price' => 12.99,
                'image' => 'mystery-thriller.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Self-Help Guide',
                'category_id' => 2,
                'stock' => 180,
                'price' => 9.99,
                'image' => 'self-help-guide.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cookbook',
                'category_id' => 2,
                'stock' => 100,
                'price' => 19.99,
                'image' => 'cookbook.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Biography',
                'category_id' => 2,
                'stock' => 130,
                'price' => 16.99,
                'image' => 'biography.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Furniture category (category_id = 3)
            [
                'name' => 'Dining Table',
                'category_id' => 3,
                'stock' => 20,
                'price' => 499.99,
                'image' => 'dining-table.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Office Chair',
                'category_id' => 3,
                'stock' => 80,
                'price' => 149.99,
                'image' => 'office-chair.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sofa',
                'category_id' => 3,
                'stock' => 25,
                'price' => 799.99,
                'image' => 'sofa.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bed Frame',
                'category_id' => 3,
                'stock' => 30,
                'price' => 599.99,
                'image' => 'bed-frame.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bookshelf',
                'category_id' => 3,
                'stock' => 40,
                'price' => 199.99,
                'image' => 'bookshelf.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
