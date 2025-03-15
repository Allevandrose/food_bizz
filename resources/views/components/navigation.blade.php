<nav class="bg-white shadow-lg w-full" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-orange-600">FoodBiz</a>
            </div>

            <!-- Menu Toggle for Mobile (Always Visible on Small Screens) -->
            <div class="sm:hidden flex items-center w-full justify-end">
                <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
            </div>

            <!-- Desktop Menu (Always Visible) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-orange-600 rounded-md hover:bg-orange-700 transition duration-300">Register</a>
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-orange-600 border border-orange-600 rounded-md hover:bg-orange-600 hover:text-white transition duration-300">Login</a>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by Default, Appears on Click) -->
        <div x-show="open" x-transition class="sm:hidden w-full">
            <div class="pt-2 pb-3 space-y-1 text-center">
                <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-white bg-orange-600 rounded-md w-full">Register</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-orange-600 border border-orange-600 rounded-md w-full">Login</a>
            </div>
        </div>
    </div>
</nav>
