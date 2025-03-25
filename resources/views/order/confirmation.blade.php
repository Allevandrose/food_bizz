<!-- resources/views/order/confirmation.blade.php -->
<x-usernav>
    <div class="content">
        <h1>Order Confirmation</h1>
        <p>Thank you for your order, {{ $order->delivery_name }}.</p>
        <p>Your order number is <strong>{{ $order->order_number }}</strong>.</p>
        <p>Total amount: Kes. {{ number_format($order->total_amount, 2) }}</p>
        <p>Please prepare cash for payment on delivery to {{ $order->delivery_location }}.</p>
        <a href="{{ route('orders.index') }}" class="btn">View Orders</a>
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