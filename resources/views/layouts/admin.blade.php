<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    {{-- <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between">
        <h1 class="font-bold text-xl">ADMIN PANEL</h1>
        <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
            Đăng xuất
        </a>
    </nav> --}}

    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between">
        <h1 class="font-bold text-xl">ADMIN PANEL</h1>

        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
            Đăng xuất
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg p-6">
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-black font-medium">🏠 Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="block text-gray-700 hover:text-black font-medium">🧶 Sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="block text-gray-700 hover:text-black font-medium">📦 Danh mục</a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}" class="block text-gray-700 hover:text-black font-medium">🛒 Đơn hàng</a>
                </li>
            </ul>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
