<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index() {
        $products = Product::with('Category')->latest()->get();
        return view('home.index', compact('products'));
    }

    public function detailProduct($slug) {
        $categories = Category::latest()->get();
        $products = Product::whereSlug($slug)->firstOrFail();
        return view('home.detailProduct', compact('products', 'categories'));

    }
   
}

