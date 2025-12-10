<nav>
    <ul class="space-y-2 text-sm">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-50">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-50">
                Users
            </a>
        </li>
        <li>
            <a href="{{ route('admin.posts') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-50">
                Posts
            </a>
        </li>
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left p-2 rounded hover:bg-gray-50">Logout</button>
            </form>
        </li>
    </ul>
</nav>
