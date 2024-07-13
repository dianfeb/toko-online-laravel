<?php

namespace App\Providers;

use App\Models\Category;
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

    }
}
