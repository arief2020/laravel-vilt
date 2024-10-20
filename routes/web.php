<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionsController;


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
    return Inertia::render('Home');
});

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return Inertia::render('Register');
})->name('register');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/register', [RegisterController::class, 'register']);


// Route::get('/products', function () {
//     return Inertia::render('Products');
// })->middleware(['auth'])->name('products'); 

// Route::get('/transactions', function () {
//     return Inertia::render('Transactions/Index');
// })->middleware(['auth'])->name('transactions');

Route::resource('products', ProductController::class)->middleware(['auth']);
Route::resource('transactions', TransactionsController::class)->middleware(['auth']);