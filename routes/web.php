<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Livewire\ProductsTable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/customers', [CustomersController::class, 'index'])->name('customers');
require_once __DIR__ . '/jetstream.php';

require_once __DIR__ . '/fortify.php';
