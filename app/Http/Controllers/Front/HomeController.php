<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index() {
        $products = Product::with('Category')->latest()->get();
        return view('home.index', compact('products'));
    }
   
}

