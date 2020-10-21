<?php

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

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

// Main pages
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/shop/products/search', [ShopController::class, 'index'])->name('shop');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/reset', [CartController::class, 'reset'])->name('cart.reset');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/{product}/save', [CartController::class, 'save'])->name('cart.save');

// Save
Route::delete('/save/{product}', [SaveController::class, 'destroy'])->name('save.destroy');
Route::post('/save/{product}/cart', [SaveController::class, 'store'])->name('save.store');


// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// Coupons
Route::post('/coupon', [CouponsController::class, 'store'])->name('coupon.store');
Route::delete('/coupon', [CouponsController::class, 'destroy'])->name('coupon.destroy');

// Orders
Route::get('/orders', [HomeController::class, 'orders'])->name('orders')->middleware('auth');

// Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Auth
Auth::routes();

Route::get('/logout', function() {
    Auth::logout();
    Session::flush();

    return Redirect::to('/');
})->name('logout');

