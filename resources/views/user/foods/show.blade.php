<x-usernav>
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex flex-col md:flex-row gap-8 bg-white rounded-xl shadow-lg p-6">
            <div class="md:w-1/2">
                @if ($food->image)
                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}"
                        class="w-full h-auto rounded-lg shadow-md object-cover max-h-[400px]">
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500 rounded-lg">
                        No Image Available
                    </div>
                @endif
            </div>
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-4xl font-bold mb-4 text-[#2a2a2a] font-merriweather">{{ $food->name }}</h1>
                    <p class="text-xl text-[#ff4500] mb-4">KES {{ number_format($food->price, 2) }}</p>
                    <p class="text-lg text-[#828181] mb-6">{{ $food->description }}</p>
                </div>
                <div>
                    <form action="{{ route('cart.add', $food->id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1" class="w-16 px-2 py-1 border rounded mr-2">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-md text-lg">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-usernav>