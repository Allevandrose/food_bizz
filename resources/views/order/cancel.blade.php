<!-- resources/views/order/cancel.blade.php -->
<x-usernav>
    <div class="content">
        <h1>Payment Cancelled</h1>
        <p>Your payment was cancelled, {{ $order->delivery_name }}.</p>
        <p>Your order number is <strong>{{ $order->order_number }}</strong>.</p>
        <p>You can try again or contact support.</p>
        <a href="{{ route('cart.index') }}" class="btn">Back to Cart</a>
    </div>

    <style>
        .content { padding: 20px; text-align: center; }
        h1 { color: orangered; margin-bottom: 20px; }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: orangered;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover { background: darkred; }
    </style>
</x-usernav>