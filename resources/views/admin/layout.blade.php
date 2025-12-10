<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Mèn Mén</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-pink-700 text-white p-5 space-y-4">
        <h2 class="text-2xl font-bold">Admin Panel</h2>

        <nav class="mt-6 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-pink-600">
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}" class="block p-2 rounded hover:bg-pink-600">
                Quản lý Users
            </a>

            {{-- <a href="{{ route('admin.products.index') }}" class="block p-2 rounded hover:bg-pink-600">Sản phẩm</a>
            <a href="{{ route('admin.orders.index') }}" class="block p-2 rounded hover:bg-pink-600">Đơn hàng</a> --}}

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="mt-4 bg-red-500 px-3 py-2 rounded w-full text-left">
                    Đăng xuất
                </button>
            </form>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
