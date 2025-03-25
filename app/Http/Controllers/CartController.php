<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('food')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->food->price * $item->quantity;
        });
        return view('user.cart.index', compact('cartItems', 'total'));
    }

    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $action = $request->input('action');
        $food = $cart->food;

        if ($action === 'increase') {
            if ($cart->quantity + 1 > $food->unit) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
            $cart->quantity += 1;
        } elseif ($action === 'decrease') {
            if ($cart->quantity - 1 < 1) {
                return redirect()->back()->with('error', 'Quantity cannot be less than 1.');
            }
            $cart->quantity -= 1;
        }

        $cart->save();
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
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