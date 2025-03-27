<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food-Bizz</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
        }

        .neumorphic {
            box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
        }

        .neumorphic-inset {
            box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
        }

        .neumorphic-hover:hover {
            box-shadow: 5px 5px 10px #d1d9e6, -5px -5px 10px #ffffff;
            transform: translateY(-2px);
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div x-data="{ open: true, foodMenuOpen: false }">
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 h-screen bg-white neumorphic transition-all duration-300 ease-in-out z-50"
            :class="open ? 'w-64' : 'w-20'">
            <!-- Header with toggle -->
            <div class="flex items-center justify-between p-4 border-b border-gray-100">
                <h1 class="font-bold text-gray-700 transition-all" :class="open ? 'text-xl' : 'text-xs'">
                    <span x-show="open">Dashboard</span>
                    <span x-show="!open">DB</span>
                </h1>
                <button @click="open = !open" class="p-2 rounded-lg neumorphic-hover">
                    <i :class="open ? 'ri-menu-fold-line text-gray-600' : 'ri-menu-unfold-line text-gray-600'"></i>
                </button>
            </div>
            <!-- Navigation Links -->
            <nav class="p-3 space-y-3">
                <a href="{{route('admin.dashboard')}}" class="flex items-center p-3 rounded-lg neumorphic-hover transition-all">
                    <i class="ri-home-line text-xl text-blue-500"></i>
                    <span class="ml-3 font-medium" x-show="open" x-transition>Home</span>
                </a>
                <div class="relative">
                    <a href="#" @click="foodMenuOpen = !foodMenuOpen" class="flex items-center p-3 rounded-lg neumorphic-hover transition-all">
                        <i class="ri-restaurant-line text-xl text-green-500"></i>
                        <span class="ml-3 font-medium" x-show="open" x-transition>Food</span>
                        <i class="ri-arrow-down-s-line ml-auto text-gray-600" x-show="open"></i>
                    </a>
                    <!-- Dropdown Menu -->
                    <div x-show="foodMenuOpen && open" @click.away="foodMenuOpen = false" class="mt-2 space-y-2 pl-12">
                        <a href="{{route("admin.foods.create")}}" class="flex items-center p-2 rounded-lg neumorphic-hover transition-all">
                            <i class="ri-add-circle-line text-lg text-blue-500"></i>
                            <span class="ml-2 font-medium">Create Food</span>
                        </a>
                        <a href="{{route('admin.foods.index')}}" class="flex items-center p-2 rounded-lg neumorphic-hover transition-all">
                            <i class="ri-eye-line text-lg text-green-500"></i>
                            <span class="ml-2 font-medium">Show Food</span>
                        </a>
                        <a href="{{route('admin.categories.create')}}" class="flex items-center p-2 rounded-lg neumorphic-hover transition-all">
                            <i class="ri-list-check-2 text-lg text-green-500"></i>
                            <span class="ml-2 font-medium">Category</span>
                        </a>
                    </div>
                </div>
                <a href="#" class="flex items-center p-3 rounded-lg neumorphic-hover transition-all">
                    <i class="ri-dashboard-line text-xl text-purple-500"></i>
                    <span class="ml-3 font-medium" x-show="open" x-transition>Dashboard</span>
                </a>
                <a href="#" class="flex items-center p-3 rounded-lg neumorphic-hover transition-all">
                    <i class="ri-line-chart-line text-xl text-red-500"></i>
                    <span class="ml-3 font-medium" x-show="open" x-transition>Analytics</span>
                </a>
                <a href="{{route('profile.edit')}}" class="flex items-center p-3 rounded-lg neumorphic-hover transition-all">
                    <i class="ri-user-line text-xl text-yellow-500"></i>
                    <span class="ml-3 font-medium" x-show="open" x-transition>Profile</span>
                </a>
            </nav>
            {{-- footer --}}
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-100 flex items-center"
                :class="open ? 'justify-between' : 'justify-center'">
                <div x-show="open" class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <span class="text-blue-600 font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Str::afterLast(Auth::user()->name, ' '), 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="p-2 rounded-lg neumorphic-hover text-gray-600">
                        <i class="ri-logout-box-line"></i>
                    </button>
                </form>
            </div>

        </aside>
        <!-- Main Content -->
        <main class="transition-all duration-300 ease-in-out bg-gray-50 min-h-screen" :class="open ? 'ml-64' : 'ml-20'">
            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>