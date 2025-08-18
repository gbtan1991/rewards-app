<x-layouts.guest-layout>

     <h2>Admin Login</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div>
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required autofocus>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif
</x-layouts.guest-layout>