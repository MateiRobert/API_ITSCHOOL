<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        $cartItem = new CartItem;
        $cartItem->product_id = $request->product_id;
        $cartItem->quantity = $request->quantity;
    
        $cart = Cart::where('user_id', $request->user_id)->first();
    
        if (!$cart) {
            $cart = new Cart;
            $cart->user_id = $request->user_id;
            $cart->save();
        }
    
        $cart->items()->save($cartItem);
    
        return response()->json(['message' => 'Product added to cart successfully']);
    }
    

    public function remove(Request $request)
    {
        $cartItem = CartItem::find($request->item_id);
        $cartItem->delete();

        return response()->json(['message' => 'Product removed from cart successfully']);
    }
}
    
    

