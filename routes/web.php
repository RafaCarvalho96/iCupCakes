<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(CatalogController::class)->group(function () {
    Route::get('/', 'index')->name('catalog.index');
    Route::get('/catalog/{id}/show', 'show')->name('catalog.show');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::get('/cart/add/{id}', 'add')->name('cart.add');
    Route::get('/cart/subtract/{id}', 'subtract')->name('cart.subtract');
    Route::get('/cart/remove/{id}', 'remove')->name('cart.remove');
});

Route::middleware('auth')->controller(CheckoutController::class)->group(function () {
    Route::get('/checkout','index')->name('checkout.index');
    Route::post('/checkout/store','store')->name('checkout.store');
});

Route::middleware(['auth','verified'])->controller(AdminController::class)->group(function () {
    Route::get('/admin','index')->name('admin.index');
});

Route::middleware(['auth','verified'])->controller(ProductController::class)->group(function () {
    Route::get('/admin/product/index','index')->name('admin.product.index');
    Route::get('/admin/product/create','create')->name('admin.product.create');
    Route::post('/admin/product/store','store')->name('admin.product.store');
    Route::get('/admin/product/{id}/edit','edit')->name('admin.product.edit');
    Route::post('/admin/product/{id}/update','update')->name('admin.product.update');
    Route::get('/admin/product/{id}/delete','delete')->name('admin.product.delete');
});

Route::middleware(['auth','verified'])->controller(OrderController::class)->group(function () {
    Route::get('/admin/order/index','index')->name('admin.order.index');
    Route::get('/admin/order/{id}/show','show')->name('admin.order.show');
    Route::get('/admin/order/{id}/delete','delete')->name('admin.order.delete');
});

require __DIR__.'/auth.php';
