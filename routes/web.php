<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'index'])->name('product');

// Admin
Route::prefix('admin')->group(function () {
  Route::get('products', [AdminProductController::class, 'index'])->name('admin.products');
  Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
  Route::post('products/create', [AdminProductController::class, 'store'])->name('admin.products.store');
  Route::put('products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
  Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
  Route::get('products/{product}/destroy', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
  Route::get('products/{product}/destroyImage', [AdminProductController::class, 'destroyImage'])->name('admin.products.destroyImage');

});
