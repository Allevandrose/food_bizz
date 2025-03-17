{{-- Updated index blade with Update and Delete buttons --}}
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

                        <div class="flex justify-between mt-4">
                            <a href="{{ route('admin.foods.edit', $food->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md">
                                Update
                            </a>
                            <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $foods->links() }}
    </div>
</x-side>

{{-- SweetAlert for Delete Confirmation --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-form").forEach(form => {
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
