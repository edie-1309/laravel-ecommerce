<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminStockController;
use App\Http\Controllers\ProductTestController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPlatformController;
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
    return view('home', [
        'title' => 'Eazy Play! - Home',
        'products' => Product::all()
    ]);
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index');
    Route::post('/register', 'store');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
});

Route::get('/dashboard', function() {
    return view('admin/dashboard', [
        'title' => 'Eazy Play! - Administrator'
    ]);
})->middleware('auth'); 

// Check Slug Product
Route::get('/dashboard/products/checkSlug', [AdminProductController::class, 'checkSlug'])->middleware('auth');

// Get Platform Product
Route::get('/dashboard/products/platform/{product:slug}', [AdminProductController::class, 'getPlatform'])->middleware('auth');

Route::resource('/dashboard/products', AdminProductController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except(['show', 'edit', 'update'])->middleware('auth');

Route::controller(AdminStockController::class)->group(function () {
    Route::get('/dashboard/stock', 'index');
    Route::post('/dashboard/stock', 'store');
    Route::get('/dashboard/stock/{product:slug}', 'show');
    Route::get('/dashboard/stock/{stock:id}/edit', 'edit');
    Route::put('/dashboard/stock', 'update');
    Route::delete('/dashboard/stock/{stock:id}', 'destroy');
})->middleware('auth');

Route::resource('/dashboard/platform', AdminPlatformController::class)->except('show')->middleware('auth');