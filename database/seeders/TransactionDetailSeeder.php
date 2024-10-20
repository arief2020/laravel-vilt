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
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 599.99,
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 999.99,
            ],
            [
                'transaction_id' => 2,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 999.99,
            ]
        ]);
    }
}
