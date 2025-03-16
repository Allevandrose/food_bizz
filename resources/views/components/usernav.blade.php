<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FoodBizz</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <!-- Second Navbar (Main Navigation) -->
    <nav
    x-data="{ isOpen: false }"
    class="bg-[#FFF] text-[#ff4500] shadow-md w-full"
  >
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <div class="logo font-bold text-2xl">
            FoodBizz
        </div>
        <div class="hidden md:flex space-x-8">
          <a href="#home" class="hover:text-orange-500">Home</a>
          <a href="#about" class="hover:text-orange-500">About</a>
          <a href="#practice" class="hover:text-orange-500"
            >Practice Areas</a
          >
          <a href="#values" class="hover:text-orange-500">Values</a>
          <a href="#contact" class="hover:text-orange-500">Contact</a>
        </div>
        <button @click="isOpen = !isOpen" class="md:hidden">
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"
            />
          </svg>
        </button>
      </div>
      <div x-show="isOpen" class="md:hidden pb-4 space-y-4 text-center bg-orange-600">
        <a href="#home" class="block py-2 text-white hover:bg-orange-700">Home</a>
        <a href="#about" class="block py-2 text-white hover:bg-orange-700">About</a>
        <a href="#practice" class="block py-2 text-white hover:bg-orange-700"
          >Practice Areas</a
        >
        <a href="#values" class="block py-2 text-white hover:bg-orange-700"
          >Values</a
        >
        <a href="#contact" class="block py-2 text-white hover:bg-orange-700"
          >Contact</a
        >
      </div>
    </div>
  </nav>
  <div class="main">
    {{$slot}}
  </div>
</body>
</html>