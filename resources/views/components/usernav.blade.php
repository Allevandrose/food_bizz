<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FoodBizz</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav x-data="{ isOpen: false }" class="bg-white text-[#ff4500] shadow-md w-full fixed top-0 left-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <!-- Logo (Left) -->
                <div class="text-2xl font-bold">FoodBizz</div>

                <!-- Welcome Message (Center) -->
                <div class="hidden md:block text-lg font-medium text-gray-700">Welcome, {{Auth::user()->name}}</div>

                <!-- Navigation & Logout (Right) -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{route('dashboard')}}" class="hover:text-orange-500">Home</a>
                    <a href="{{route('foods.index')}}" class="hover:text-orange-500">Menu</a>
                    <a href="{{route('cart.index')}}" class="hover:text-orange-500">Cart</a>
                    <a href="{{route('orders.index')}}" class="hover:text-orange-500">Orders</a>

                    <!-- Minimized Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="border border-orange-500 text-orange-500 px-3 py-1 rounded-md text-sm transition duration-300 hover:bg-orange-500 hover:text-white">
                            Logout
                        </button>
                    </form>
                </div>

                <!-- Mobile Menu Toggle -->
                <button @click="isOpen = !isOpen" class="md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="isOpen" class="md:hidden pb-4 space-y-4 text-center bg-orange-600">
                <a href="#home" class="block py-2 text-white hover:bg-orange-700">Home</a>
                <a href="#about" class="block py-2 text-white hover:bg-orange-700">About</a>
                <a href="#practice" class="block py-2 text-white hover:bg-orange-700">Practice Areas</a>
                <a href="#values" class="block py-2 text-white hover:bg-orange-700">Values</a>

                <!-- Logout Button in Mobile -->
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                        class="w-full border border-white text-white px-4 py-2 rounded-md text-sm transition duration-300 hover:bg-white hover:text-orange-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content Starts Below the Navbar -->
    <div class="mt-[70px] container mx-auto px-4">
        {{ $slot }}
    </div>
</body>

</html>
