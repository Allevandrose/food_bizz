<!-- resources/views/user/orders/show.blade.php -->
<x-usernav>
    <div class="content">
        <h1>Order {{ $order->order_number }}</h1>
        <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Delivery to:</strong> {{ $order->delivery_name }}, {{ $order->delivery_location }}</p>
        <p><strong>Email:</strong> {{ $order->delivery_email }}</p>
        <p><strong>Phone:</strong> {{ $order->delivery_phone }}</p>

        <h2>Order Items</h2>
        <table>
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->food->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Kes. {{ number_format($item->price, 2) }}</td>
                        <td>Kes. {{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p><strong>Total Amount:</strong> Kes. {{ number_format($order->total_amount, 2) }}</p>
        <a href="{{ route('orders.index') }}" class="btn">Back to Orders</a>
    </div>

    <style>
        .content { padding: 20px; }
        h1, h2 { color: orangered; margin-bottom: 20px; }
        p { margin-bottom: 10px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th { background: #f9f9f9; }
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