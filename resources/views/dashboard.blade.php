<h1>Welcome user</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">
        Logout
    </button>
</form>
