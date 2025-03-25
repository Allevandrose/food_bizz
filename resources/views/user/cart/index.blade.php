<x-usernav>
    <div class="content">
        <div class="cart">
            <div class="heading">
                <h4>Shopping Cart</h4>
            </div>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @forelse ($cartItems as $item)
                <div class="cart-item">
                    <div class="cart-image">
                        @if ($item->food->image)
                            <img src="{{ asset('storage/' . $item->food->image) }}" alt="{{ $item->food->name }}" />
                        @else
                            <div class="w-20 h-20 bg-gray-200 flex items-center justify-center text-gray-500">
                                No Image
                            </div>
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
                <form action="/submit-order" method="post">
                    @csrf
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required />
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required />
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required />
                    <button type="submit">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include the existing CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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

        .cart .heading h4 {
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

        .details .title {
            font-size: 18px;
            font-weight: 600;
        }

        .details .desc {
            font-size: 14px;
            color: #666;
        }

        .control {
            display: flex;
            align-items: center;
        }

        .control button {
            background: #fff;
            border: 1px solid #ccc;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .control button:hover {
            background: #eee;
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
            margin-left: 20px;
            transition: color 0.3s;
            background: none;
            border: none;
        }

        .cancel:hover {
            color: darkred;
        }

        .summary h4,
        .form h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: orangered;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: 600;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .form label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form input:focus {
            border-color: orangered;
            outline: none;
        }

        .form button {
            width: 100%;
            background: orangered;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form button:hover {
            background: darkred;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                padding: 15px;
            }
            .cart,
            .checkout {
                width: 100%;
            }
            .cart-item {
                flex-wrap: wrap;
                padding: 10px 0;
            }
            .details {
                margin-left: 0;
                margin-top: 10px;
            }
            .control,
            .price,
            .cancel {
                margin-top: 10px;
            }
        }
    </style>
</x-usernav>