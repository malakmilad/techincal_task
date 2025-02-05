<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','log.requests'])->group(function () {
    //*category
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    //*product
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    Route::post('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('product/show/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('product/filter/{amount}', [ProductController::class, 'filter'])->name('product.filter');

});
require __DIR__ . '/auth.php';
