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
    
    <!-- Alpine.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.min.js" defer></script>

    <!-- Splide.js & AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/userdb.css') }}">
</head>

<body class="font-sans" x-data="{ sidebarOpen: false }">

    <!-- 📌 Mobile Sidebar Toggle -->
    <button @click="sidebarOpen = !sidebarOpen" 
        class="md:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- 📌 Sidebar -->
    <x-sidebar />

    <!-- 📌 Main Content -->
    <div class="md:ml-64 p-6 z-20">
        <!-- Hero Section -->
        <x-hero />

        <!-- About Section -->
        <x-about />

        <!-- Featured Foods -->
        <x-feature />

        <!-- Menu -->
        <x-menu :foods="$foods" />

        <!-- Footer -->
        <x-footer />
    </div>

    <!-- 📌 Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 🌟 Hero Carousel
            new Splide('.hero-carousel', {
                type: 'fade',
                rewind: true,
                perPage: 1,
                autoplay: true,
                interval: 5000,
                pagination: true,
                arrows: true,
            }).mount();

            // 🍽️ Featured Foods Carousel
            new Splide('.featured-carousel', {
                type: 'loop',
                perPage: 4,
                perMove: 1,
                gap: '1rem',
                pagination: false,
                arrows: true,
                breakpoints: {
                    1200: { perPage: 3 },
                    768: { perPage: 2 },
                    640: { perPage: 1 }
                }
            }).mount();

            // 🎭 Initialize AOS
            AOS.init();
        });
    </script>
</body>

</html>
