<x-usernav>
    <div class="content">
        <div class="cart">
            <div class="heading">
                <h4>Shopping Cart</h4>
            </div>
            @if (session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif
            @forelse ($cartItems as $item)
                <div class="cart-item">
                    <div class="cart-image">
                        @if ($item->food->image)
                            <img src="{{ asset('storage/' . $item->food->image) }}" alt="{{ $item->food->name }}" />
                        @else
                            <div class="no-image">No Image</div>
                        @endif
                    </div>
                    <div class="details">
                        <div class="title">{{ $item->food->name }}</div>
                        <div class="desc">{{ $item->food->description }}</div>
                    </div>
                    <div class="control">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="action" value="decrease">-</button>
                            <span>{{ $item->quantity }}</span>
                            <button type="submit" name="action" value="increase">+</button>
                        </form>
                    </div>
                    <div class="price">Kes. {{ number_format($item->food->price * $item->quantity, 2) }}</div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cancel">X</button>
                    </form>
                </div>
            @empty
                <p>Your cart is empty.</p>
            @endforelse
        </div>
        <div class="checkout">
            <div class="summary">
                <h4>Order Summary</h4>
                @foreach ($cartItems as $item)
                    <div class="summary-item">
                        <span>{{ $item->food->name }} x {{ $item->quantity }}</span>
                        <span>Kes. {{ number_format($item->food->price * $item->quantity, 2) }}</span>
                    </div>
                @endforeach
                <div class="total">
                    <span>Total</span>
                    <span>Kes. {{ number_format($total, 2) }}</span>
                </div>
            </div>
            <div class="form">
                <h4>Checkout</h4>
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <label for="delivery_name">Full Name</label>
                    <input type="text" id="delivery_name" name="delivery_name" value="{{ Auth::user()->name }}" required />
                    
                    <label for="delivery_email">Email</label>
                    <input type="email" id="delivery_email" name="delivery_email" value="{{ Auth::user()->email }}" required />
                    
                    <label for="delivery_phone">Phone Number</label>
                    <input type="tel" id="delivery_phone" name="delivery_phone" required />
                    
                    <label for="delivery_location">Delivery Location</label>
                    <input type="text" id="delivery_location" name="delivery_location" required />
                    
                    <label for="payment_method">Payment Method</label>
                    <select id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="stripe">Stripe</option>
                    </select>
                    
                    <button type="submit">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .content {
            display: flex;
            justify-content: space-between;
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 auto;
        }

        .cart {
            width: 65%;
        }

        .checkout {
            width: 30%;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }

        .heading h4 {
            font-size: 24px;
            margin-bottom: 20px;
            color: orangered;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-image img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .details {
            flex: 1;
            margin-left: 20px;
        }

        .control button {
            background: #fff;
            border: 1px solid #ccc;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .control span {
            margin: 0 10px;
            font-size: 16px;
        }

        .price {
            font-size: 16px;
            font-weight: 600;
            margin-left: 20px;
        }

        .cancel {
            color: red;
            font-size: 20px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .summary h4,
        .form h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: orangered;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: 600;
            margin-top: 20px;
        }

        .form input, .form select, .form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form button {
            background: orangered;
            color: white;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
            .cart, .checkout {
                width: 100%;
            }
        }
    </style>
</x-usernav>
