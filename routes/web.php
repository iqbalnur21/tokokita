<?php

use App\Http\Controllers\Product;
use App\Http\Controllers\ProfileController;
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
    return redirect('product');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/product', [Product::class, 'index'])->name('product');
    Route::get('/product/create', [Product::class, 'create'])->name('product.create');
    Route::post('/product', [Product::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [Product::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/update', [Product::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [Product::class, 'destroy'])->name('product.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
