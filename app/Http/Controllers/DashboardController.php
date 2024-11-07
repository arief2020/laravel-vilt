<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Transaction;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransactions = Transaction::count();
        $cashIn = Transaction::where('transaction_type', 'cash_in')->count();
        $cashOut = Transaction::where('transaction_type', 'cash_out')->count();

        $products = Product::all();

        return Inertia::render('Dashboard', ['totalTransactions' => $totalTransactions, 'cashIn' => $cashIn, 'cashOut' => $cashOut, 'products' => $products]);
    }
}
