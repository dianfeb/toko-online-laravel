<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function showCheckoutForm()
    {
        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();
        
        if (!$cart) {
            return redirect()->route('home.cart')->with('error', 'Your cart is empty.');
        }

        return view('home.checkout', compact('cart'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

        if (!$cart) {
            return redirect()->route('home.cart')->with('error', 'Your cart is empty.');
        }

        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $totalPrice,
        ];

        $itemDetails = $cart->cartItems->map(function ($cartItem) {
            return [
                'id' => $cartItem->product_id,
                'price' => $cartItem->product->price,
                'quantity' => $cartItem->quantity,
                'name' => $cartItem->product->name,
            ];
        })->toArray();

        $customerDetails = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function complete(Request $request)
    {
        $orderData = $request->validate([
            'address' => 'required|string|max:255',
            'snap_token' => 'required|string',
        ]);

        // Verifikasi pembayaran dengan Midtrans (tanpa webhook)
        $status = Transaction::status($orderData['snap_token']);

        // Pastikan bahwa $status adalah objek dan transaction_status ada
        if (is_object($status) && isset($status->transaction_status)) {
            $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

            // Buat order baru
            $order = new Order();
            $order->user_id = Auth::id();
            $order->address = $orderData['address'];
            $order->total = $cart->cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->product->price;
            });

            // Set status based on transaction status
            if ($status->transaction_status == 'capture' || $status->transaction_status == 'settlement') {
                $order->status = 'dibayar';  // Payment completed
            } else {
                $order->status = 'belum dibayar';  // Payment not completed
            }

            $order->save();

            // Pindahkan item dari cart ke order items
            foreach ($cart->cartItems as $cartItem) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $cartItem->product_id;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->price = $cartItem->product->price;
                $orderItem->save();
            }

            // Hapus cart setelah checkout
            $cart->cartItems()->delete();
            $cart->delete();

            return redirect()->route('home.index')->with('success', 'Your order has been placed successfully.');
        } else {
            return redirect()->route('home.cart')->with('error', 'Payment not completed.');
        }
    }
}
