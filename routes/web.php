<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\WishlistController;
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

Route::get('/test-rajaongkir', function () {
    $apiKey = config('rajaongkir.api_key');
    $package = config('rajaongkir.package');
    $timeout = config('rajaongkir.timeout');
    
    dd($apiKey, $package, $timeout);
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
        Route::resource('/order', OrderController::class);
       
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
    Route::post('/checkout/pay-later', [CheckoutController::class, 'payLater'])->name('checkout.payLater');

    Route::get('/provinces', [CheckoutController::class, 'get_province'])->name('checkout.get_province');
    Route::get('/cities/{province_id}', [CheckoutController::class, 'get_city'])->name('checkout.get_city');
    Route::get('/subdistricts/{city_id}', [CheckoutController::class, 'get_subdistrict'])->name('checkout.get_subdistrict');
    Route::post('/checkout/shipping-cost', [CheckoutController::class, 'getShippingCost'])->name('checkout.shippingCost');
    


    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/remove/{itemId}', [WishlistController::class, 'remove'])->name('wishlist.remove');


});




// Route::get('/home', [HomeController::class, 'index'])->name('home');
