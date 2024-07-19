<?php

namespace App\Http\Controllers\Front;

use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Order;
use App\Models\OrderItem;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Dipantry\Rajaongkir\Models\ROCity;
use Dipantry\Rajaongkir\Models\ROProvince;
use Dipantry\Rajaongkir\Models\ROSubDistrict;
use Dipantry\Rajaongkir\Rajaongkir;
use Dipantry\Rajaongkir\Constants\RajaongkirCourier;

class CheckoutController extends Controller
{
    protected $rajaongkir;

    public function __construct(Rajaongkir $rajaongkir)
    {
        $this->rajaongkir = $rajaongkir;

        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function get_province()
    {
        $provinces = ROProvince::all();
        return response()->json($provinces);
    }

    public function get_city($province_id)
    {
        $cities = ROCity::where('province_id', $province_id)->get();
        return response()->json($cities);
    }

    public function get_subdistrict($city_id)
    {
        $subdistricts = ROSubDistrict::where('city_id', $city_id)->get();
        return response()->json($subdistricts);
    }

    public function showCheckoutForm()
    {
        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

        if (!$cart) {
            return redirect()->route('home.cart')->with('error', 'Your cart is empty.');
        }

        return view('home.checkout', compact('cart'));
    }

   
    public function getShippingCost(Request $request)
    {
        $origin = $request->input('origin');
    $destination = $request->input('destination');
    $weight = $request->input('weight');
    $courier = 'jne'; // Use courier code as a string

    try {
        $cost = $this->rajaongkir->getOngkirCost(
            $origin,
            $destination,
            $weight,
            $courier
        );

        return response()->json(['cost' => $cost]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
        ]);

        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

        if (!$cart) {
            return redirect()->route('home.cart')->with('error', 'Your cart is empty.');
        }

        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        // Create the order and save order items before payment
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->total = $totalPrice;
        $order->status = 'pending'; // Set initial status to pending
        $order->save();

        foreach ($cart->cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        // Prepare Midtrans transaction
        $transactionDetails = [
            'order_id' => $order->id, // Use order ID for tracking
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
            'name' => Auth::user()->name,
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
            return response()->json(['snap_token' => $snapToken, 'order_id' => $order->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function complete(Request $request)
    {
        $orderData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'snap_token' => 'required|string',
            'order_id' => 'required|integer',
        ]);

        // Verify payment with Midtrans (without webhook)
        $status = Transaction::status($orderData['snap_token']);

        // Ensure that $status is an object and transaction_status exists
        if (is_object($status) && isset($status->transaction_status) && ($status->transaction_status == 'capture' || $status->transaction_status == 'settlement')) {
            $order = Order::find($orderData['order_id']);
            if ($order) {
                $order->status = 'paid';
                $order->save();

                $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();
                $cart->cartItems()->delete();
                $cart->delete();

                return redirect()->route('home.index')->with('success', 'Your order has been placed successfully.');
            } else {
                return redirect()->route('home.cart')->with('error', 'Order not found.');
            }
        } else {
            return redirect()->route('home.cart')->with('error', 'Payment not completed.');
        }
    }

    public function payLater(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
        ]);

        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

        if (!$cart) {
            return response()->json(['error' => 'Your cart is empty.']);
        }

        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        // Create the order and save order items without processing payment
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->total = $totalPrice;
        $order->status = 'pending'; // Set initial status to pending
        $order->save();

        foreach ($cart->cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        // Clear the cart after creating the order
        $cart->cartItems()->delete();
        $cart->delete();

        return response()->json(['success' => true]);
    }
}
