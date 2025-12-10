<x-admin-layout title="Create User">
    <h1 class="text-2xl font-semibold mb-4">Create User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-4 rounded shadow space-y-4">
        @csrf
        <div>
            <label class="block text-sm">Name</label>
            <input name="name" value="{{ old('name') }}" class="w-full border p-2 rounded"/>
        </div>

        <div>
            <label class="block text-sm">Email</label>
            <input name="email" value="{{ old('email') }}" class="w-full border p-2 rounded"/>
        </div>

        <div>
            <label class="block text-sm">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded"/>
        </div>

        <div>
            <label class="block text-sm">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded"/>
        </div>

        <div>
            <label class="block text-sm">Role</label>
            <input name="role" value="{{ old('role') }}" class="w-full border p-2 rounded" placeholder="admin or user"/>
        </div>

        <div>
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
        </div>
    </form>
</x-admin-layout>
