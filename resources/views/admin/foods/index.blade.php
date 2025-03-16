<x-side>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-[#2a2a2a] font-merriweather">Our Menu</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($foods as $food)
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

                        <button class="mt-4 mx-auto block w-2/3 bg-[#ff4500] hover:bg-[#e03d00] text-white px-4 py-2 rounded-lg 
                                font-medium text-sm tracking-wide transition-all duration-300 transform hover:scale-95 
                                shadow-md hover:shadow-lg">
                            Add to cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $foods->links() }}
    </div>
</x-side>