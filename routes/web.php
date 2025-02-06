<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','log.requests'])->name('dashboard');

Route::middleware(['auth','log.requests'])->group(function () {
    //*product
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
});
require __DIR__ . '/auth.php';
