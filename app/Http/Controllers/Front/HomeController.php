<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index() {
        $products   = Product::with('Category')->latest()->get();
        $sliders     = Slider::get();
        return view('home.index', compact('products', 'sliders'));
    }

    public function detailProduct($slug) {
        $categories = Category::latest()->get();
        $products = Product::whereSlug($slug)->firstOrFail();
        return view('home.detailProduct', compact('products', 'categories'));

    }

    public function category($slugCategory) {
        $categories = Category::get();
        $category = Category::where('slug', $slugCategory)->firstOrFail();
        $products = Product::whereHas('category', function($q) use ($category) {
            $q->where('id', $category->id);
        })->get();
        return view('home.category', compact('category', 'products'));
    }

   
}

