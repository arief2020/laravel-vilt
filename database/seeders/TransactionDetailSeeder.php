<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction_details')->insert([
            // Transaction 1 details
            ['transaction_id' => 1, 'product_id' => 1, 'quantity' => 1, 'price' => 599.99],
            ['transaction_id' => 1, 'product_id' => 2, 'quantity' => 1, 'price' => 999.99],
            ['transaction_id' => 1, 'product_id' => 3, 'quantity' => 1, 'price' => 299.99],

            // Transaction 2 details
            ['transaction_id' => 2, 'product_id' => 4, 'quantity' => 2, 'price' => 149.99],
            ['transaction_id' => 2, 'product_id' => 5, 'quantity' => 1, 'price' => 499.99],
            ['transaction_id' => 2, 'product_id' => 6, 'quantity' => 1, 'price' => 79.99],

            // Transaction 3 details
            ['transaction_id' => 3, 'product_id' => 7, 'quantity' => 1, 'price' => 49.99],
            ['transaction_id' => 3, 'product_id' => 8, 'quantity' => 1, 'price' => 249.99],
            ['transaction_id' => 3, 'product_id' => 9, 'quantity' => 1, 'price' => 399.99],

            // Transaction 4 details
            ['transaction_id' => 4, 'product_id' => 10, 'quantity' => 1, 'price' => 99.99],
            ['transaction_id' => 4, 'product_id' => 11, 'quantity' => 1, 'price' => 199.99],
            ['transaction_id' => 4, 'product_id' => 12, 'quantity' => 1, 'price' => 59.99],

            // Transaction 5 details
            ['transaction_id' => 5, 'product_id' => 13, 'quantity' => 1, 'price' => 799.99],
            ['transaction_id' => 5, 'product_id' => 14, 'quantity' => 1, 'price' => 349.99],
            ['transaction_id' => 5, 'product_id' => 15, 'quantity' => 1, 'price' => 129.99],
        ]);
    }
}
