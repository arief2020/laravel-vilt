<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        $users = User::all();

        return Inertia::render('Transactions/IndexTransaction', ['transactions' => $transactions, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return Inertia::render('Transactions/CreateTransaction', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'transaction_date' => $request->transaction_date,
            'transaction_type' => $request->transaction_type,
            'total' => $request->total,
        ]);

        foreach ($request->products as $product) {
            $transaction->transactionDetail()->create([
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::with('transactionDetail.product')->find($id);

        if (! $transaction) {
            return redirect()->back()->withErrors('Transaction not found.');
        }

        return Inertia::render('Transactions/ShowTransaction', [
            'transaction' => $transaction,
            'transactionDetails' => $transaction->transactionDetail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
