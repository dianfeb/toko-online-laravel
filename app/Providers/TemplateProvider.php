<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('home.templates.header', function ($view) {
            // ..
            $category = Category::latest()->get();
            $view->with('categories', $category);
        });

        view::composer('home.templates.header', function($view) {
            $cartItemCount = CartItem::count(); // Menghitung jumlah item dalam keranjang
            $view->with('cartItemCount', $cartItemCount); // Mengirimkan variabel $cartItemCount ke view
        });

        view::composer('home.templates.header', function($view) {
            $wishlistItemCount = WishlistItem::count(); // Menghitung jumlah item dalam keranjang
            $view->with('wishlistItemCount', $wishlistItemCount); // Mengirimkan variabel $cartItemCount ke view
        });

    }
}
