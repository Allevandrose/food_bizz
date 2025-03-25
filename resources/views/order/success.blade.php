<!-- resources/views/order/success.blade.php -->
<x-usernav>
    <div class="content">
        <h1>Payment Successful</h1>
        <p>Thank you for your payment, {{ $order->delivery_name }}.</p>
        <p>Your order number is <strong>{{ $order->order_number }}</strong>.</p>
        <p>Total amount: Kes. {{ number_format($order->total_amount, 2) }}</p>
        <p>A confirmation email has been sent to {{ $order->delivery_email }}.</p>
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