<x-layouts.app-layout>
    <h1 class="text-2xl font-bold mb-4">Admins</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.admins.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Admin</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Username</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Role</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
                <tr>
                    <td class="border p-2">{{ $admin->id }}</td>
                    <td class="border p-2">{{ $admin->username }}</td>
                    <td class="border p-2">{{ $admin->first_name }} {{ $admin->last_name }}</td>
                    <td class="border p-2">{{ $admin->admin_type }}</td>
                    <td class="border p-2">{{ $admin->account_status }}</td>
                    <td class="border p-2 space-x-2">
                        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                        <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border p-2 text-center">No admins found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $admins->links() }}
    </div>
</x-layouts.app-layout>
