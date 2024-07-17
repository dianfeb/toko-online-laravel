<?php

namespace App\Http\Controllers\Front;

use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $wishlistItemCount = WishlistItem::count();
        $wishlist = Wishlist::where('user_id', Auth::id())->with('items.product')->first();
        return view('home.wishlist', compact('wishlist', 'wishlistItemCount'));
    }

    public function add(Request $request, $productId)
    {
        $userId = Auth::id();
        $wishlist = Wishlist::firstOrCreate(['user_id' => $userId]);
        
        if (!$wishlist->items()->where('product_id', $productId)->exists()) {
            WishlistItem::create([
                'wishlist_id' => $wishlist->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->route('wishlist.index');
    }

    public function remove($itemId)
    {
        $wishlistItem = WishlistItem::find($itemId);
        
        if ($wishlistItem && $wishlistItem->wishlist->user_id == Auth::id()) {
            $wishlistItem->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist.');
        }

        return redirect()->back()->with('error', 'Failed to remove product from wishlist.');
    }
}
