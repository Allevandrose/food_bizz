<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('food')->get();
        return view('user.cart.index', compact('cartItems'));
    }

    public function remove(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
