<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function index() {
        // Mengambil semua keranjang belanja dengan detail produk
    $carts = Cart::with('cartItems.product')->latest()->get();

    // Mengirim data ke view admin.cart.index
    return view('admin.cart', compact('carts'));;
    }
}
