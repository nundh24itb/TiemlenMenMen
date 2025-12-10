<x-admin-layout title="Users">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">Create user</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-700">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow rounded">
        <table class="w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-t">
                    <td class="p-3">{{ $user->id }}</td>
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">{{ $user->role }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.users.edit', $user) }}" class="mr-2 text-blue-600">Edit</a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete user?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</x-admin-layout>
