<x-side>
    <x-side>
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Edit Food</h2>
    
            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif
    
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
    
            <form id="updateForm" action="{{ route('admin.foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                {{-- Name --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Food Name</label>
                    <input type="text" name="name" class="w-full p-2 border rounded-lg" value="{{ old('name', $food->name) }}" required>
                </div>
    
                {{-- Category --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Category</label>
                    <input type="text" name="category" class="w-full p-2 border rounded-lg" value="{{ old('category', $food->category->name) }}" required>
                </div>
    
                {{-- Description --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" class="w-full p-2 border rounded-lg" rows="3">{{ old('description', $food->description) }}</textarea>
                </div>
    
                {{-- Price --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Price (KES)</label>
                    <input type="number" name="price" class="w-full p-2 border rounded-lg" value="{{ old('price', $food->price) }}" required min="0" step="0.01">
                </div>
    
                {{-- Unit --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Unit (e.g., 1 piece, 500g)</label>
                    <input type="text" name="unit" class="w-full p-2 border rounded-lg" value="{{ old('unit', $food->unit) }}" required>
                </div>
    
                {{-- Current Image Preview --}}
                @if ($food->image)
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Current Image</label>
                        <img src="{{ asset('storage/' . $food->image) }}" alt="Food Image" class="w-40 h-40 object-cover rounded-lg">
                    </div>
                @endif
    
                {{-- Image --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Update Image (Optional)</label>
                    <input type="file" name="image" class="w-full p-2 border rounded-lg">
                </div>
    
                {{-- Submit Button --}}
                <div class="mt-4">
                    <button type="button" id="confirmUpdate" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Update Food
                    </button>
                </div>
            </form>
        </div>
    </x-side>
    
    {{-- SweetAlert Script --}}
    <script>
        document.getElementById('confirmUpdate').addEventListener('click', function() {
            Swal.fire({
                title: 'Confirm Update',
                text: 'Are you sure you want to update this food item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm').submit();
                }
            });
        });
    </script>
</x-side>