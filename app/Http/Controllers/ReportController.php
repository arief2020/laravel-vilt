<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $users = User::all();

        return Inertia::render('Report/IndexReport', ['transactions' => $transactions, 'users' => $users]);
    }

    public function generatePDF()
    {

        // // Ambil data transaksi
        $transactions = Transaction::with('user')->get();

        // // // Generate view sebagai PDF
        $pdf = PDF::loadView('transactions.report', ['transactions' => $transactions]);
        // // return response()->json([
        // //     'message' => 'PDF generated successfully',
        // //     'data' => $transactions,
        // // ]);

        // // // Tampilkan PDF di browser untuk diunduh
        // return $pdf->download('transactions_report.pdf');

        // $data = ['title' => 'domPDF in Laravel 10'];
        // $pdf = PDF::loadView('pdf.document', $data);
        return $pdf->download('document.pdf');
    }
}
