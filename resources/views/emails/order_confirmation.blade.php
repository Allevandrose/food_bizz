<!-- resources/views/emails/order_confirmation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h1 style="color: orangered;">Order Confirmation</h1>
    <p>Dear {{ $order->delivery_name }},</p>
    <p>Thank you for your order! Your order number is <strong>{{ $order->order_number }}</strong>.</p>
    <p><strong>Total Amount:</strong> Kes. {{ number_format($order->total_amount, 2) }}</p>
    <p>Your order will be delivered to: {{ $order->delivery_location }}</p>
    <p>We appreciate your business!</p>
    <p>Best regards,<br>{{config('app.name')}}</p>
</body>
</html>