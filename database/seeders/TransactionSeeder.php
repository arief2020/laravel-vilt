<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'user_id' => 1,
                'transaction_date' => Carbon::now()->subDays(5), // 5 days ago,
                'transaction_type' => 'cash_in',
                'total' => 1599.98,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'transaction_date' => Carbon::now()->subDays(3), // 3 days ago,
                'transaction_type' => 'cash_out',
                'total' => 999.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
