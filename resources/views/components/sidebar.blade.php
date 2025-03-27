<!-- Sidebar Component -->
<div x-data="{ sidebarOpen: false }" class="relative z-50">
    <!-- 📌 Mobile Sidebar Toggle -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="md:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- 📌 Sidebar -->
    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="w-64 h-screen bg-white neu-shadow fixed top-0 left-0 overflow-y-auto md:block transition-transform duration-300 z-50">
        <div class="p-6 relative">
            <h2 class="text-2xl font-bold tracking-wide text-gray-800 mb-8">
                <span class="text-[#FF4500]">Food</span>Bizz
            </h2>

            <!-- 📌 Close Button (Mobile) -->
            <button @click="sidebarOpen = false"
                class="md:hidden absolute top-4 right-4 text-gray-500 hover:text-[#FF4500]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- 📌 Sidebar Categories -->
            <div class="space-y-2 z-50" x-data="{
                categories: [
                    { name: 'Fast Food', items: ['Burgers', 'Fries', 'Pizza'] },
                    { name: 'Drinks', items: ['Soda', 'Juice', 'Coffee'] },
                    { name: 'Desserts', items: ['Cake', 'Ice Cream', 'Cookies'] }
                ]
            }">

                <template x-for="category in categories" :key="category.name">
                    <div class="relative group">
                        <div
                            class="p-3 rounded-lg neu-button flex justify-between items-center bg-white cursor-pointer">
                            <span x-text="category.name" class="text-gray-700"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        <!-- 📌 Dropdown -->
                        <div
                            class="absolute left-full top-0 ml-2 bg-white neu-shadow rounded-lg w-48  opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none group-hover:pointer-events-auto">
                            <ul class="py-2">
                                <template x-for="item in category.items" :key="item">
                                    <li class="px-4 py-2 z-50 hover:bg-gray-100 cursor-pointer" x-text="item"></li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </template>
            </div>

            <!-- 📌 Sidebar Extra Options -->
            <div class="mt-10 space-y-2">
                <a href="{{ route('foods.index') }}">
                    <div class="p-3 rounded-lg neu-button bg-white cursor-pointer">
                        <span class="text-gray-700">Menu</span>
                    </div>
                </a>
                <a href="{{ route('orders.index') }}">
                    <div class="p-3 rounded-lg neu-button bg-white cursor-pointer">
                        <span class="text-gray-700">My Orders</span>
                    </div>
                </a>
                <a href="{{ route('cart.index') }}">
                    <div class="p-3 rounded-lg neu-button bg-white cursor-pointer">
                        <span class="text-gray-700">Cart</span>
                    </div>
                </a>
                <a href="{{ route('profile.edit') }}">
                    <div class="p-3 rounded-lg neu-button bg-white cursor-pointer">
                        <span class="text-gray-700">Profile</span>
                    </div>
                </a>
                <!-- 📌 Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="p-3 rounded-lg neu-button bg-white cursor-pointer w-full flex items-center space-x-2">
                        <i class="ri-logout-box-r-line text-gray-700"></i>
                        <span class="text-gray-700">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
