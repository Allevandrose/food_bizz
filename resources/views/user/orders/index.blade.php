<!-- resources/views/user/orders/index.blade.php -->
<x-usernav>
    <div class="content">
        <h1>Your Orders</h1>
        @if ($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>Kes. {{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td><a href="{{ route('orders.show', $order->id) }}">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <style>
        .content { padding: 20px; }
        h1 { color: orangered; margin-bottom: 20px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th { background: #f9f9f9; }
        a { color: orangered; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</x-usernav>