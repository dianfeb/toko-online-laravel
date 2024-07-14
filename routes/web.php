<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
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

Auth::routes();

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
   
    Route::middleware('auth.admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'edit'])->name('admin.profile.edit');
        Route::post('/profile', [AdminController::class, 'update'])->name('admin.profile.update');
        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
    });
    
   
});

Route::middleware('auth')->group(function() {
    Route::get('/account', [AccountController::class, 'index']);
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');
});




// Route::get('/home', [HomeController::class, 'index'])->name('home');
