<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();
        return view('home.cart', compact('cart'));
    }
    public function addToCart($productId, Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = $cart->cartItems()->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
        } else {
            $cartItem = new CartItem();
            $cartItem->product_id = $productId;
            $cartItem->quantity = $request->quantity;
            $cart->cartItems()->save($cartItem);
        }
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->route('cart.index');
    }

    public function updateCart(Request $request)
    {
        foreach ($request->cartItems as $cartItemId => $quantity) {
            $cartItem = CartItem::findOrFail($cartItemId);
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.index');
    }
}
