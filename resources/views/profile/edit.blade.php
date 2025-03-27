<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Include Tailwind CSS via CDN for simplicity -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="w-[70%] bg-white rounded-lg shadow-xl flex flex-col items-center p-8">
            <!-- Title -->
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h1>

            <!-- Profile Edit Section -->
            <div class="flex justify-center items-center w-full">
                <!-- Left Section: Profile Image -->
                <div class="w-[30%] flex flex-col items-center">
                    <div class="w-48 h-48 rounded-full overflow-hidden shadow-md">
                        <img src="{{ $user->image ?? 'https://picsum.photos/200' }}" alt="Profile Image" class="w-full h-full object-cover">
                    </div>
                    <!-- Update Image Button -->
                    <button type="button" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition duration-200">
                        Update Image
                    </button>
                    <!-- Note: In a real application, this button would trigger a file input -->
                </div>

                <!-- Right Section: Profile Form -->
                <div class="w-[60%] flex flex-col items-center">
                    <form id="profile-form" method="POST" action="{{ route('profile.update') }}" class="w-full max-w-md flex flex-col space-y-4">
                        @csrf
                        @method('PATCH')

                        <!-- Name Field -->
                        <div class="flex flex-col">
                            <label for="name" class="text-gray-700 font-medium">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                   class="mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @error('name')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="flex flex-col">
                            <label for="email" class="text-gray-700 font-medium">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @error('email')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="flex flex-col">
                            <label for="password" class="text-gray-700 font-medium">New Password (optional)</label>
                            <input type="password" id="password" name="password"
                                   class="mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @error('password')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-between w-full max-w-md">
                <!-- Update and Cancel Buttons -->
                <div class="flex space-x-4">
                    <button type="submit" form="profile-form"
                            class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 transition duration-200">
                        Update Profile
                    </button>
                    <a href="{{ route('dashboard') }}"
                       class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400 transition duration-200">
                        Cancel
                    </a>
                </div>

                <!-- Delete Account Button -->
                <form method="POST" action="{{ route('profile.destroy') }}"
                      onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition duration-200">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>