<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransactions = Transaction::count();
        $cashIn = Transaction::where('transaction_type', 'cash_in')->count();
        $cashOut = Transaction::where('transaction_type', 'cash_out')->count();

        $products = Product::all();

        return Inertia::render('DashboardPage', ['totalTransactions' => $totalTransactions, 'cashIn' => $cashIn, 'cashOut' => $cashOut, 'products' => $products]);
    }
}
