<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('addToCart');
    }

    public function index()
    {
        $foods = Food::paginate(10);
        return view('user.foods.index', compact('foods'));
    }

    public function show(Food $food)
    {
        return view('user.foods.show', compact('food'));
    }

    public function addToCart(Request $request, Food $food)
    {
        $user = Auth::user();
        $quantity = max(1, (int) $request->input('quantity', 1)); // Ensure minimum quantity is 1

        // Check if the item is already in the cart
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('food_id', $food->id)
                        ->first();

        if ($cartItem) {
            // Update quantity if item exists
            $newQuantity = $cartItem->quantity + $quantity;
            if ($newQuantity > $food->unit) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            // Add new item to cart
            if ($quantity > $food->unit) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
            Cart::create([
                'user_id' => $user->id,
                'food_id' => $food->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Food added to cart successfully.');
    }
}