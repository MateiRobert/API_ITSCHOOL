<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function show(Request $request)
{
    $cart = Cart::where('user_id', $request->user_id)->with('items.product')->first();

    if (!$cart) {
        return response()->json(['message' => 'Cart not found for the given user'], 404);
    }

    return response()->json($cart);
}

}
