<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'delivery_name' => 'required|string|max:255',
            'delivery_email' => 'required|email|max:255',
            'delivery_phone' => 'required|string|max:20',
            'delivery_location' => 'required|string|max:255',
            'payment_method' => 'required|in:cash,stripe',
        ]);

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('food')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->food->price;
        });

        $order = Order::create([
            'user_id' => $user->id,
            'delivery_name' => $validated['delivery_name'],
            'delivery_email' => $validated['delivery_email'],
            'delivery_phone' => $validated['delivery_phone'],
            'delivery_location' => $validated['delivery_location'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'total_amount' => $total,
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $cartItem->food_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->food->price,
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        if ($validated['payment_method'] === 'stripe') {
            return redirect()->route('order.pay', $order->id);
        }

        return redirect()->route('order.confirmation', $order->id);
    }

    public function payWithStripe(Order $order)
    {
        if ($order->user_id !== Auth::id() || $order->status !== 'pending') {
            abort(403);
        }

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'kes',
                    'product_data' => [
                        'name' => 'Order ' . $order->order_number,
                    ],
                    'unit_amount' => $order->total_amount * 100, // In cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('order.success', $order->id),
            'cancel_url' => route('order.cancel', $order->id),
        ]);

        return redirect()->to($session->url);
    }

    public function paymentSuccess(Order $order)
    {
        if ($order->user_id !== Auth::id() || $order->status !== 'pending') {
            abort(403);
        }

        $order->status = 'paid';
        $order->save();

        Mail::to($order->delivery_email)->send(new OrderConfirmationMail($order));

        return view('order.success', compact('order'));
    }

    public function paymentCancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->status = 'failed';
        $order->save();

        return view('order.cancel', compact('order'));
    }

    public function confirmation(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('order.confirmation', compact('order'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.food')->latest()->get();
        return view('user.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.orders.show', compact('order'));
    }
}