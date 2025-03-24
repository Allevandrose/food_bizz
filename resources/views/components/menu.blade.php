@props(['foods'])

<style>
    .add-to-cart-btn {
        background-color: #FF4500;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .add-to-cart-btn:hover {
        background-color: #E03E00;
        transform: scale(1.05);
    }

    .add-to-cart-btn:active {
        transform: scale(0.95);
    }
</style>

<div>
    <h2 class="text-3xl font-bold mb-8 text-center">Our <span class="text-[#FF4500]">Menu</span></h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" data-aos="fade-up">
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
                                <button type="submit" class="add-to-cart-btn">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
