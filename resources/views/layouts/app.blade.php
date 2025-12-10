<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

       {{-- Hiển thị thông báo flash --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        <!-- Footer -->
    <footer class="bg-pink-100 text-pink-700 mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 py-10">

            <!-- Cột 1: Logo + Mô tả -->
            <div>
                <h2 class="text-xl font-bold mb-2">Tiệm Len Mèn Mén</h2>
                <p class="text-sm">Chuyên cung cấp len Acrylic, Wool, Cotton… với màu sắc đa dạng và mềm mại.</p>
            </div>

            <!-- Cột 2: Link nhanh -->
            <div>
                <h3 class="font-semibold mb-2">Liên kết</h3>
                <ul class="text-sm space-y-1">
                    <li><a href="/" class="hover:underline">Trang chủ</a></li>
                    <li><a href="/products" class="hover:underline">Sản phẩm</a></li>
                    <li><a href="/category/len-acrylic" class="hover:underline">Len Acrylic</a></li>
                    <li><a href="/contact" class="hover:underline">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Cột 3: Thông tin liên hệ -->
            <div>
                <h3 class="font-semibold mb-2">Liên hệ</h3>
                <ul class="text-sm space-y-1">
                    <li>Email: info@lenmenmen.com</li>
                    <li>Hotline: 0909 123 456</li>
                    <li>Địa chỉ: 123 Đường Len, Quận Mềm, TP.HCM</li>
                </ul>
            </div>

            <!-- Cột 4: Social Media -->
            <div>
                <h3 class="font-semibold mb-2">Kết nối</h3>
                <div class="flex gap-3">
                    <a href="#" class="hover:text-pink-900">Facebook</a>
                    <a href="#" class="hover:text-pink-900">Instagram</a>
                    <a href="#" class="hover:text-pink-900">TikTok</a>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-6 text-center text-sm text-pink-600 pb-4">
            © {{ date('Y') }} Tiệm Len Mèn Mén. All rights reserved.
        </div>
    </footer>
        </div>
    </body>
</html>
