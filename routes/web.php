<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPlatformController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductTestController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminStockController;

use App\Models\Product;
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

Route::get('/dashboard', function() {
    return view('admin/dashboard', [
        'title' => 'Eazy Play! - Administrator'
    ]);
})->middleware('auth'); 

// Check Slug Product
Route::get('/dashboard/products/checkSlug', [AdminProductController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/products', AdminProductController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except(['show', 'edit', 'update'])->middleware('auth');

Route::resource('/dashboard/stock', AdminStockController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/platform', AdminPlatformController::class)->except('shoe')->middleware('auth');