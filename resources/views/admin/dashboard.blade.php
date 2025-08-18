<x-layouts.app-layout>

      <h2>Welcome, {{ Auth::guard('admin')->user()->first_name }}!</h2>
    <p>Role: {{ Auth::guard('admin')->user()->admin_type }}</p>
    <p>Status: {{ Auth::guard('admin')->user()->account_status }}</p>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
</x-layouts.app-layout>