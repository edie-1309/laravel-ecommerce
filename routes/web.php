<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminStockController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPlatformController;
use App\Http\Controllers\ForgotPasswordController;
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
    $playsation4 = Product::platformFilter('playstation-4')->limit(3)->get();
    $playsation5 = Product::platformFilter('playstation-5')->limit(3)->get();
    return view('home', [
        'title' => 'Eazy Play! - Home',
        'productsPlaysation4' => $playsation4,
        'productsPlaysation5' => $playsation5
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

Route::get('/user-profile/{user:username}', [UserController::class, 'index'])->middleware('auth');
Route::get('/edit-profile/{user:username}', [UserController::class, 'edit_profile'])->middleware('auth');
Route::put('/update-profile/{user:id}', [UserController::class, 'update_profile'])->middleware('auth');
Route::get('/change-password', [UserController::class, 'change_password'])->middleware('auth');
Route::put('/update-password/{user:id}', [UserController::class, 'update_password'])->middleware('auth');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'send_email'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset_password'])->middleware('guest')->name('password.reset');
ROute::post('/reset-password', [ForgotPasswordController::class, 'update_password'])->middleware('guest')->name('password.update');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart')->middleware('auth');
    Route::post('/cart', 'store')->name('insert.cart')->middleware('auth');
    Route::patch('/cart/update/{cart}', 'update')->middleware('auth');
    Route::delete('/cart/delete/{cart}', 'destroy')->name('delete.cart')->middleware('auth');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('auth');

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');
Route::get('/order-detail/{order:slug}', [OrderController::class, 'detail'])->middleware('auth');
Route::put('/orders/confirm-status/{order:id}', [OrderController::class, 'confirm_status'])->middleware('auth');
Route::delete('/orders/{order:id}', [OrderController::class, 'destroy'])->middleware('auth');

Route::get('/history', [OrderController::class, 'history'])->middleware('auth');
Route::get('/history-detail/{order:slug}', [OrderController::class, 'history_detail'])->middleware('auth');

Route::get('/dashboard', function() {
    return view('admin/dashboard', [
        'title' => 'Eazy Play! - Administrator'
    ]);
})->middleware('admin'); 

// Check Slug Product
Route::get('/dashboard/products/checkSlug', [AdminProductController::class, 'checkSlug'])->middleware('auth');

// Get Platform Product
Route::get('/dashboard/products/platform/{product:slug}', [AdminProductController::class, 'getPlatform'])->middleware('auth');

Route::resource('/dashboard/products', AdminProductController::class)->middleware('auth');

// Get Stock Product
Route::get('/product/checkStock/{product:id}/{platform:id}', [ProductController::class, 'checkStock'])->withoutScopedBindings();

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

Route::get('/dashboard/orders', [AdminOrderController::class, 'index'])->middleware('auth');
Route::get('/dashboard/orders/detail/{order:slug}', [AdminOrderController::class, 'show'])->middleware('auth');
Route::put('/dashboard/orders/update-status/{order:id}', [AdminOrderController::class, 'update_status'])->middleware('auth');