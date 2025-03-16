<x-side>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Add New Food</h2>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                <strong>Whoops! Something went wrong.</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Food Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded-lg" value="{{ old('name') }}" required>
            </div>

            {{-- Category (Text Input Instead of Dropdown) --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Category</label>
                <input type="text" name="category" class="w-full p-2 border rounded-lg" value="{{ old('category') }}" required placeholder="Enter category name">
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" class="w-full p-2 border rounded-lg" rows="3">{{ old('description') }}</textarea>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Price (KES)</label>
                <input type="number" name="price" class="w-full p-2 border rounded-lg" value="{{ old('price') }}" required min="0" step="0.01">
            </div>

            {{-- Unit --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Unit (e.g., 1 piece, 500g)</label>
                <input type="number" name="unit" class="w-full p-2 border rounded-lg" value="{{ old('unit') }}" required min="1">
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Food Image</label>
                <input type="file" name="image" class="w-full p-2 border rounded-lg">
            </div>

            {{-- Submit Button --}}
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Add Food
                </button>
            </div>
        </form>
    </div>
</x-side>
