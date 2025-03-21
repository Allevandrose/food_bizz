<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class UserFoodController extends Controller
{
    public function __construct()
    {
        // Apply 'auth' middleware only to the addToCart method
        $this->middleware('auth')->only('addToCart');
    }

    /**
     * Display a listing of all food items for users.
     */
    public function index()
    {
        $foods = Food::paginate(10);
        return view('user.foods.index', compact('foods'));
    }

    /**
     * Display a specific food item in detail.
     */
    public function show(Food $food)
    {
        return view('user.foods.show', compact('food'));
    }

    /**
     * Add a food item to the user's cart.
     */
    public function addToCart(Request $request, Food $food)
    {
        $cart = session()->get('cart', []);
        $requestedQuantity = max(1, (int) $request->input('quantity', 1)); // Ensure minimum is 1

        // Get current quantity in the cart
        $currentCartQuantity = $cart[$food->id]['quantity'] ?? 0;
        $newTotalQuantity = $currentCartQuantity + $requestedQuantity;

        // Ensure total quantity does not exceed available stock
        if ($newTotalQuantity > $food->unit) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        // Add or update cart item
        if (isset($cart[$food->id])) {
            $cart[$food->id]['quantity'] = $newTotalQuantity;
        } else {
            $cart[$food->id] = [
                'name' => $food->name,
                'price' => $food->price,
                'quantity' => $requestedQuantity,
                'image' => $food->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food added to cart successfully.');
    }
}
