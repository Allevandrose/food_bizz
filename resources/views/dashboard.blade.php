<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodBizz Dashboard</title>

    <!-- Tailwind & Other Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.min.js" defer></script>

    <!-- Splide.js & AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/userdb.css') }}">

    <style>
        .sidebar-collapsed {
            width: 80px;
        }

        .sidebar-expanded {
            width: 280px;
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            background: linear-gradient(135deg, #FF4500 0%, #FF6B3D 100%);
        }

        .popular-order-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans" x-data="{
    sidebarCollapsed: false,
    activeTab: 'featured',
    showOrderDetails: false,
    currentOrder: null,
    stats: {
        totalOrders: 245,
        revenue: 1688,
        customers: 3421,
        reviews: 256
    },
    popularOrders: [
        { name: 'Grilled Lamp Chops', price: 25.50, rating: 4.8, image: '{{ asset('assets/images/banner.jpg') }}' },
        { name: 'Instant Noodles', price: 15.20, rating: 4.6, image: '{{ asset('assets/images/banner2.jpg') }}' },
        { name: 'Goose Liver Paste', price: 35.80, rating: 4.9, image: '{{ asset('assets/images/banner3.jpg') }}' }
    ],
    bestSellers: [
        { name: 'Chicken Rice', rating: 4.9, sales: 156 },
        { name: 'Shrim Soup Thai', rating: 4.8, sales: 89 }
    ]
}">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div :class="sidebarCollapsed ? 'sidebar-collapsed' : 'sidebar-expanded'"
            class="fixed left-0 top-0 h-full gradient-bg text-white transition-all duration-300 ease-in-out z-50 shadow-2xl">

            <!-- Header -->
            <div class="flex items-center justify-between p-6">
                <div x-show="!sidebarCollapsed" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <span class="text-purple-600 font-bold text-xl">FB</span>
                    </div>
                    <span class="text-xl font-bold">FoodBizz</span>
                </div>
                <button @click="sidebarCollapsed = !sidebarCollapsed"
                    class="p-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition-colors">
                    <i class="fas fa-bars text-white"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="mt-8 px-4">
                <div class="space-y-2">
                    <!-- Dashboard -->
                    <a href="#" class="flex items-center p-3 rounded-xl bg-white bg-opacity-20 text-white">
                        <i class="fas fa-chart-pie w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3 font-medium">Dashboard</span>
                    </a>

                    <!-- Product -->
                    <a href="{{ route('foods.index') }}"
                        class="flex items-center p-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-colors">
                        <i class="fas fa-utensils w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3">Menu</span>
                    </a>

                    <!-- Order -->
                    <a href="{{ route('orders.index') }}"
                        class="flex items-center p-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-colors">
                        <i class="fas fa-shopping-bag w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3">My Orders</span>
                    </a>

                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}"
                        class="flex items-center p-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-colors">
                        <i class="fas fa-shopping-cart w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3">Cart</span>
                    </a>

                    <!-- Analytics -->
                    <a href="#"
                        class="flex items-center p-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-colors">
                        <i class="fas fa-chart-bar w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3">Analytics</span>
                    </a>

                    <!-- Settings -->
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center p-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-colors">
                        <i class="fas fa-cog w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3">Profile</span>
                    </a>
                </div>
            </nav>

            <!-- Logout -->
            <div class="absolute bottom-6 w-full px-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-colors w-full text-left">
                        <i class="fas fa-sign-out-alt w-5 h-5"></i>
                        <span x-show="!sidebarCollapsed" class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div :class="sidebarCollapsed ? 'ml-20' : 'ml-72'" class="flex-1 transition-all duration-300 ease-in-out">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Welcome {{ Auth::user()->name }}</h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Search..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>

                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-800">
                            <i class="fas fa-bell text-xl"></i>
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>

                        <!-- Profile -->
                        <div class="flex items-center space-x-3">
                            <img src="https://picsum.photos/200/300" alt="Profile" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium text-gray-800">{{Auth::user()->name}}</p>
                                <p class="text-xs text-gray-600">{{Auth::user()->role}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Popular Orders -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-6">Popular Orders</h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <template x-for="(order, index) in popularOrders" :key="index">
                                    <div class="popular-order-card rounded-xl p-4 card-hover cursor-pointer">
                                        <img :src="order.image" :alt="order.name"
                                            class="w-full h-32 object-cover rounded-lg mb-3">
                                        <h4 class="font-semibold text-gray-800 mb-1" x-text="order.name"></h4>
                                        <div class="flex items-center justify-between">
                                            <span class="text-orange-500 font-bold">$<span
                                                    x-text="order.price.toFixed(2)"></span></span>
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <span class="text-sm text-gray-600" x-text="order.rating"></span>
                                            </div>
                                        </div>
                                        <button
                                            class="w-full mt-3 bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                            Order
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="space-y-6">
                        <!-- Best Seller -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Best Seller</h3>

                            <div class="space-y-4">
                                <template x-for="(item, index) in bestSellers" :key="index">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-utensils text-orange-500"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-800" x-text="item.name"></h4>
                                            <div class="flex items-center space-x-2">
                                                <div class="flex items-center">
                                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                                    <span class="text-xs text-gray-600 ml-1"
                                                        x-text="item.rating"></span>
                                                </div>
                                                <span class="text-xs text-gray-500">•</span>
                                                <span class="text-xs text-gray-600"
                                                    x-text="item.sales + ' sales'"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Statistics Chart -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Statistics</h3>

                            <div class="space-y-4">
                                <div class="stat-card rounded-xl p-4 text-white">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold" x-text="stats.totalOrders"></span>
                                        <span class="text-sm opacity-80">Total Orders</span>
                                    </div>
                                    <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                        <div class="bg-white h-2 rounded-full" style="width: 75%"></div>
                                    </div>
                                </div>

                                <div class="bg-purple-500 rounded-xl p-4 text-white">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold" x-text="stats.customers"></span>
                                        <span class="text-sm opacity-80">Customers</span>
                                    </div>
                                    <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                        <div class="bg-white h-2 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>

                                <div class="bg-blue-500 rounded-xl p-4 text-white">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold" x-text="stats.reviews"></span>
                                        <span class="text-sm opacity-80">Reviews</span>
                                    </div>
                                    <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                        <div class="bg-white h-2 rounded-full" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- My Order Summary -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-gray-800">My Order</h3>
                                <button class="text-orange-500 text-sm font-medium">Edit</button>
                            </div>

                            <div class="space-y-3 mb-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-drumstick-bite text-orange-500 text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-800">Chicken Rice</span>
                                    </div>
                                    <span class="text-sm font-medium">$7.50</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-fish text-orange-500 text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-800">Grilled Salmon</span>
                                    </div>
                                    <span class="text-sm font-medium">$12.30</span>
                                </div>
                            </div>

                            <div class="border-t pt-3">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="font-medium text-gray-800">Total</span>
                                    <span class="font-bold text-gray-800">$225.45</span>
                                </div>

                                <button
                                    class="w-full bg-orange-500 text-white py-3 rounded-xl hover:bg-orange-600 transition-colors font-medium">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                once: true
            });
        });
    </script>
</body>

</html>
