<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Front\CartController as FrontCartController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;

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


Route::get('/', [FrontHomeController::class, 'index'])->name('home.index');
Route::get('/detail/{slug}', [FrontHomeController::class, 'detailProduct'])->name('detail.product');
Route::get('/cart', function () {
    return view('home.cart');
});
Route::get('/checkout', function () {
    return view('home.checkout');
});



Auth::routes();

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/profile', [AdminController::class, 'edit'])->name('admin.profile.edit');
        Route::post('/profile', [AdminController::class, 'update'])->name('admin.profile.update');

        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
       
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');
    
    Route::get('/cart', [FrontCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [FrontCartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{cartItemId}', [FrontCartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update', [FrontCartController::class, 'updateCart'])->name('cart.update');

    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout/complete', [CheckoutController::class, 'complete'])->name('checkout.complete');

//     Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
// Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
});




// Route::get('/home', [HomeController::class, 'index'])->name('home');
