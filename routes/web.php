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
Route::controller(AdminProductController::class)->prefix('admin/products')->group(function () {
  Route::get('/', 'index')->name('admin.products');
  Route::get('create', 'create')->name('admin.products.create');
  Route::post('create', 'store')->name('admin.products.store');
  Route::put('{product}', 'update')->name('admin.products.update');
  Route::get('{product}/edit', 'edit')->name('admin.products.edit');
  Route::get('{product}/destroy', 'destroy')->name('admin.products.destroy');
  Route::get('{product}/destroyImage', 'destroyImage')->name('admin.products.destroyImage');
});
