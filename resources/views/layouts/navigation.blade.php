{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

{{-- <nav x-data="{ open: false }" class="bg-pink-200 border-b border-pink-300">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="Tiệm Len Mèn Mén" class="w-auto h-10">
                        <h1 class="text-xl font-bold text-pink-800">Tiệm Len Mèn Mén</h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        Trang chủ
                    </x-nav-link>

                    <x-nav-link :href="url('/products')" :active="request()->is('products')">
                        Sản phẩm
                    </x-nav-link>

                    <x-nav-link :href="url('/cart')" :active="request()->is('cart')">
                        Giỏ hàng
                    </x-nav-link>

                    <x-nav-link :href="url('/contact')" :active="request()->is('contact')">
                        Liên hệ
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-pink-700 transition duration-150 ease-in-out bg-pink-100 border border-transparent rounded-md hover:text-pink-900 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Hồ sơ
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                Đăng xuất
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-pink-800 transition duration-150 ease-in-out rounded-md hover:text-pink-900 hover:bg-pink-300 focus:outline-none focus:bg-pink-300">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden bg-pink-100 sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                Trang chủ
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/products')" :active="request()->is('products')">
                Sản phẩm
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/cart')" :active="request()->is('cart')">
                Giỏ hàng
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/contact')" :active="request()->is('contact')">
                Liên hệ
            </x-responsive-nav-link>

        </div>

        <!-- Settings -->
        <div class="pt-4 pb-1 border-t border-pink-300">
            @auth
            <div class="px-4">
                <div class="text-base font-medium text-pink-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-pink-700">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Hồ sơ
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Đăng xuất
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav> --}}

<nav x-data="{ open: false }" class="bg-pink-200 border-b border-pink-300">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo + Tên shop -->
            <div class="flex items-center shrink-0">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Tiệm Len Mèn Mén" class="w-10 h-8">
                    <span class="ml-2 text-xl font-bold text-pink-800">Tiệm Len Mèn Mén</span>
                </a>
            </div>

            <!-- Search bar -->
            {{-- <div class="flex-1 hidden mx-6 sm:flex">
                <form action="{{ route('products.search') }}" method="GET" class="flex w-full">
                    <input type="text" name="q" placeholder="Tìm kiếm sản phẩm..."
                        class="flex-1 px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                    <button type="submit" class="px-4 py-2 text-white bg-pink-500 rounded-r-lg hover:bg-pink-600">
                        🔍
                    </button>
                </form>
            </div> --}}

            <div x-data="{ showBtn: false }" class="flex-1 hidden mx-6 sm:flex w-full max-w-xl">
                <form action="{{ route('products.search') }}" method="GET" class="flex w-full">

                    <!-- Ô nhập -->
                    <input type="text" name="q"
                        @focus="showBtn = true"
                        @blur="if(!$event.target.value) showBtn = false"
                        placeholder="Tìm kiếm sản phẩm..."
                        class="flex-1 px-4 py-2 border border-pink-300 rounded-lg
                            focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                            transition-all duration-200">

                    <!-- Nút tìm kiếm (ẩn/hiện bằng Alpine) -->
                    <button type="submit"
                        x-show="showBtn"
                        x-transition
                        class="px-4 py-2 ml-2 text-white bg-pink-500 rounded-lg hover:bg-pink-600">
                        🔍
                    </button>

                </form>
            </div>
            <!--sản phẩm -->
            <div class="items-center hidden gap-4 sm:flex">
                <a href="/products" class="px-3 py-2 text-sm font-medium text-pink-700 hover:underline">Sản phẩm </a>


            <!-- Đăng nhập / Đăng ký / Giỏ hàng/liên hệ -->
            <div class="items-center hidden gap-4 sm:flex">
                <a href="/cart" class="px-3 py-2 text-sm font-medium text-pink-700 hover:underline">Giỏ hàng</a>
                <a href="/contact" class="px-3 py-2 text-sm font-medium text-pink-700 hover:underline">Liên hệ</a>

                @guest
                    <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-pink-700 hover:underline">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="px-3 py-2 text-sm font-medium text-white bg-pink-500 rounded hover:bg-pink-600">Đăng ký</a>
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-pink-700 bg-pink-100 rounded hover:text-pink-900 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="w-4 h-4 ms-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Hồ sơ</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Đăng xuất
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endguest
            </div>

            <!-- Hamburger mobile -->
            <div class="flex sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-pink-800 rounded-md hover:text-pink-900 hover:bg-pink-300 focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden bg-pink-100 sm:hidden">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')">Trang chủ</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/products')">Sản phẩm</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/cart')">Giỏ hàng</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/contact')">Liên hệ</x-responsive-nav-link>

            <!-- Mobile search -->
            <form action="{{ route('products.search') }}" method="GET" class="mt-2">
                <input type="text" name="q" placeholder="Tìm kiếm sản phẩm..."
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
            </form>

            @guest
                <x-responsive-nav-link :href="route('login')">Đăng nhập</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">Đăng ký</x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('profile.edit')">Hồ sơ</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Đăng xuất</x-responsive-nav-link>
                </form>
            @endguest
        </div>
    </div>
</nav>
