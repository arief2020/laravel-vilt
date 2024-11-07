<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('HomePage');
});

Route::get('/login', function () {
    return Inertia::render('LoginPage');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return Inertia::render('RegisterPage');
})->name('register');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/products', function () {
//     return Inertia::render('Products');
// })->middleware(['auth'])->name('products');

// Route::get('/transactions', function () {
//     return Inertia::render('Transactions/Index');
// })->middleware(['auth'])->name('transactions');

Route::resource('products', ProductController::class)->middleware(['auth']);
Route::resource('transactions', TransactionsController::class)->middleware(['auth']);

Route::get('/reports', [ReportController::class, 'index'])->middleware(['auth'])->name('report');

Route::get('/report-pdf', [ReportController::class, 'generatePDF'])->name('report-pdf');
