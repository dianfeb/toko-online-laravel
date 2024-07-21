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
use Dipantry\Rajaongkir\Rajaongkir;
use Illuminate\Support\Facades\Log;
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
        $courier = $request->input('courier');

        try {
            $cost = $this->rajaongkir->getOngkirCost($origin, $destination, $weight, $courier);
            return response()->json(['cost' => $cost]);
        } catch (\Exception $e) {
            Log::error('Error getting shipping cost: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve shipping cost.'], 500);
        }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'province_id' => 'required',
            'city_id' => 'required',
            'subdistrict' => 'required|string|max:255',
            'weight' => 'required',
            'courier' => 'required|string',
        ]);

        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

        if (!$cart) {
            Log::error('Cart is empty.');
            return response()->json(['error' => 'Your cart is empty.'], 400);
        }

        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        try {
            $cost = $this->rajaongkir->getOngkirCost(
                $request->province_id,
                $request->city_id,
                $request->weight,
                $request->courier
            );

        $shippingCost = $cost[0]['costs'][0]['cost'][0]['value'];
        } catch (\Exception $e) {
            Log::error('Error getting shipping cost: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve shipping cost.'], 500);
        }

        $totalPriceWithShipping = $totalPrice + $shippingCost;

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->province_id = $request->province_id;
        $order->city_id = $request->city_id;
        $order->subdistrict = $request->subdistrict;
        $order->courier = $request->courier;
        $order->weight = $request->weight;
        $order->shipping_cost = $shippingCost;
        $order->total = $totalPriceWithShipping;
        $order->status = 'pending';
        $order->save();

        foreach ($cart->cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        $transactionDetails = [
            'order_id' => $order->id,
            'gross_amount' => $totalPriceWithShipping,
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
            return response()->json(['snap_token' => $snapToken, 'order_id' => $order->id,]);
        } catch (\Exception $e) {
            Log::error('Error getting Snap token: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to get payment token.'], 500);
        }
    }


    

    public function complete(Request $request)
    {
        $orderData = $request->validate([
            'snap_token' => 'required|string',
            'order_id' => 'required|integer',
        ]);

        try {
            $status = Transaction::status($orderData['snap_token']);

            if (is_object($status) && isset($status->transaction_status)) {
                if ($status->transaction_status == 'capture' || $status->transaction_status == 'settlement') {
                    $order = Order::find($orderData['order_id']);
                    if ($order) {
                        $order->status = 'paid';
                        $order->save();

                        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();
                        if ($cart) {
                            $cart->cartItems()->delete();
                            $cart->delete();
                        }

                        return redirect()->route('home.index')->with('success', 'Your order has been placed successfully.');
                    } else {
                        return redirect()->route('home.cart')->with('error', 'Order not found.');
                    }
                } else {
                    return redirect()->route('home.cart')->with('error', 'Payment not completed.');
                }
            } else {
                return redirect()->route('home.cart')->with('error', 'Payment status could not be determined.');
            }
        } catch (\Exception $e) {
            Log::error('Error verifying payment status: ' . $e->getMessage());
            return redirect()->route('home.cart')->with('error', 'Failed to verify payment status.');
        }
    }

    public function payLater(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'province_id' => 'required',
            'city_id' => 'required',
            'subdistrict' => 'required|string|max:255',
            'weight' => 'required',
            'courier' => 'required|string',
        ]);

        $cart = Cart::with('cartItems.product')->where('user_id', Auth::id())->first();

        if (!$cart) {
            return response()->json(['error' => 'Your cart is empty.'], 400);
        }

        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        try {
            $cost = $this->rajaongkir->getOngkirCost(
                $request->province_id,
                $request->city_id,
                $request->weight,
                $request->courier
            );

            $shippingCost = $cost[0]['costs'][0]['cost'][0]['value'];
        } catch (\Exception $e) {
            Log::error('Error getting shipping cost: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve shipping cost.'], 500);
        }

        $totalPriceWithShipping = $totalPrice + $shippingCost;

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->province_id = $request->province_id;
        $order->city_id = $request->city_id;
        $order->subdistrict = $request->subdistrict;
        $order->courier = $request->courier;
        $order->weight = $request->weight;
        $order->shipping_cost = $shippingCost;
        $order->total = $totalPriceWithShipping;
        $order->status = 'pending';
        $order->save();

        foreach ($cart->cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        return response()->json(['success' => 'Order placed successfully.']);
    }
}
