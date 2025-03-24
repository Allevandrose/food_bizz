<div class="mb-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Our Special Selection</h2>
        <div class="bg-white rounded-lg neu-shadow-inner p-1">
            <div class="flex space-x-1">
                <button @click="activeTab = 'featured'"
                    :class="activeTab === 'featured' ? 'bg-[#FF4500] text-white' : 'bg-transparent text-gray-700'"
                    class="px-4 py-2 rounded-lg transition-colors">
                    Featured
                </button>
                <button @click="activeTab = 'recent'"
                    :class="activeTab === 'recent' ? 'bg-[#FF4500] text-white' : 'bg-transparent text-gray-700'"
                    class="px-4 py-2 rounded-lg transition-colors">
                    Recent
                </button>
                <button @click="activeTab = 'popular'"
                    :class="activeTab === 'popular' ? 'bg-[#FF4500] text-white' : 'bg-transparent text-gray-700'"
                    class="px-4 py-2 rounded-lg transition-colors">
                    Popular
                </button>
            </div>
        </div>
    </div>

    <div class="splide featured-carousel">
        <div class="splide__track">
            <ul class="splide__list">
                <template
                    x-for="food in foods.filter(f => {
      if (activeTab === 'featured') return f.featured;
      if (activeTab === 'recent') return f.recent;
      if (activeTab === 'popular') return f.popular;
      return false;
    })"
                    :key="food.name">
                    <li class="splide__slide">
                        <div class="food-card bg-white rounded-xl neu-shadow overflow-hidden mx-2">
                            <img :src="food.image" :alt="food.name" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold" x-text="food.name"></h3>
                                    <span class="text-[#FF4500] font-bold" x-text="food.price"></span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mt-2">
                                    <span x-text="food.category"></span>
                                    <div class="flex items-center ml-auto">
                                        <span class="text-yellow-400 mr-1">4.5</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81 .588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>
                                <button
                                    class="w-full mt-4 bg-[#fff5f0] text-[#FF4500] py-2 rounded-lg hover:bg-[#FF4500] hover:text-white transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>