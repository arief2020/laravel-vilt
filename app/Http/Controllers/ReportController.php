<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $users = User::all();
        return Inertia::render('Report/Index', ['transactions' => $transactions, 'users' => $users]);
    }

    public function generatePDF()
{

    // // Ambil data transaksi
    $transactions = Transaction::with('user')->get();


    // // Generate view sebagai PDF
    $pdf = Pdf::loadView('transactions.report', compact('transactions'))->setOptions(['defaultFont' => 'sans-serif']); ;
    // return response()->json([
    //     'message' => 'PDF generated successfully',
    //     'data' => $transactions,
    // ]);


    // // Tampilkan PDF di browser untuk diunduh
    return $pdf->download('transactions_report.pdf');
}
}
