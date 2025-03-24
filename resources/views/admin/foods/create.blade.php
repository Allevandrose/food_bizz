<x-side>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Add New Food</h2>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                <strong>Whoops!</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Food Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded-lg" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Category</label>
                <div class="flex justify-between items-center mb-2">
                    <a href="{{ route('admin.categories.create') }}" class="text-blue-500 text-sm hover:underline">
                        + Create New Category
                    </a>
                </div>
                <select name="category_id" class="w-full p-2 border rounded-lg" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" class="w-full p-2 border rounded-lg" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Price (KES)</label>
                <input type="number" name="price" class="w-full p-2 border rounded-lg" value="{{ old('price') }}" required min="0" step="0.01">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Units Available</label>
                <input type="number" name="unit" class="w-full p-2 border rounded-lg" value="{{ old('unit') }}" required min="1">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Food Image</label>
                <input type="file" name="image" class="w-full p-2 border rounded-lg">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Add Food
            </button>
        </form>
    </div>
</x-side>