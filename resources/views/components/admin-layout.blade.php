<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin - {{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-sm">
            <div class="p-4 border-b">
                <a href="{{ route('admin.dashboard') }}" class="text-lg font-bold">{{ config('app.name') }} Admin</a>
            </div>

            <div class="p-4">
                <x-admin-sidebar />
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b">
                <div class="container mx-auto px-4 py-3">
                    <x-admin-navbar />
                </div>
            </header>

            <main class="container mx-auto px-4 py-6">
                {{ $slot }}
            </main>

            <footer class="text-center text-sm text-gray-500 py-6">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </footer>
        </div>
    </div>

</body>
</html>
