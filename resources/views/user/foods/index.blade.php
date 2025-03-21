<x-usernav>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-[#2a2a2a] font-merriweather">Our Menu</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($foods as $food)
                <a href="{{ route('foods.show', $food->id) }}" class="block">
                    <div class="group bg-white font-poppins text-[#828181] w-[350px] min-h-[500px] rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <div class="w-full h-[280px] bg-gradient-to-r from-[#989797] to-[#b5b4b4] rounded-t-xl">
                                @if ($food->image)
                                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}"
                                        class="w-full h-full object-cover rounded-t-xl transform group-hover:scale-105 transition duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-white text-lg">
                                        No Image Available
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="p-5 relative">
                            <div class="space-y-3 mb-4">
                                <div class="flex items-center">
                                    <span class="font-semibold mr-2 text-[#ff4500]">Name:</span>
                                    <span class="text-[#2a2a2a] font-medium">{{ $food->name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="font-semibold mr-2 text-[#ff4500]">Price:</span>
                                    <span class="text-[#2a2a2a] font-medium">KES {{ number_format($food->price, 2) }}</span>
                                </div>
                                <div class="relative">
                                    <span class="font-semibold mr-2 text-[#ff4500]">Description:</span>
                                    <div class="relative">
                                        <div class="text-[#2a2a2a] line-clamp-2 group-hover:line-clamp-none transition-all duration-300">
                                            {{ $food->description }}
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-white via-white/50 group-hover:opacity-0 transition-opacity duration-300"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <form action="{{ route('cart.add', $food->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1" class="w-16 px-2 py-1 border rounded mr-2">
                                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $foods->links() }}
    </div>
</x-usernav>
