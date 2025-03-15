<div>
    <h1>Welcome Admin</h1>
    <form method="POST" action="{{ route('logout')}}">
        @csrf
        <button>logout</button>
    </form>
</div>
