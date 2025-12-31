
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Chào mừng đến Tiệm Len Mèn Mén
        </h2>
    </x-slot>



    <section class="relative z-0 h-[400px]">

    <img src="{{ asset('images/bgg.png') }}"
        class="absolute inset-0 w-full h-full object-cover z-[-2]" />

    <div class="absolute inset-0 bg-pink-50/30 z-[-1]"></div>

    <div class="relative z-10 flex flex-col justify-center h-full p-6 md:p-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-pink-800 drop-shadow-lg">
            Len đẹp – Mềm mịn – Thủ công tinh tế
        </h1>
        <p class="mt-3 text-pink-600">
            Chuyên cung cấp len Acrylic, Wool, Cotton… với màu sắc đa dạng và mềm mại.
        </p>

        <div class="mt-5 flex gap-4">
            <a href="/products"
   class="px-7 py-3
          bg-white text-pink-700 font-extrabold
          rounded-full shadow-xl
          ring-2 ring-pink-500
          hover:bg-pink-50 hover:scale-105 transition">
    🧶 XEM SẢN PHẨM
</a>
            <a href="/contact" class="px-5 py-2 border border-pink-300 rounded-lg text-pink-700 hover:bg-pink-100">
                Liên hệ
            </a>
        </div>
    </div>
</section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- DANH MỤC -->
    <section class="mt-10">
    <h3 class="text-xl font-bold mb-4">Danh mục</h3>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">

        @php
            $categories = [
                ['name' => 'Len Acrylic', 'short' => 'A', 'slug' => 'len-acrylic'],
                ['name' => 'Len Wool', 'short' => 'W', 'slug' => 'len-wool'],
                ['name' => 'Len Cotton', 'short' => 'C', 'slug' => 'len-cotton'],
                ['name' => 'Kim móc & Dụng cụ', 'short' => 'K', 'slug' => 'kim-moc-dung-cu'],
                ['name' => 'Bộ kit', 'short' => 'B', 'slug' => 'bo-kit'],
                ['name' => 'Phụ kiện', 'short' => 'P', 'slug' => 'phu-kien'],
            ];
        @endphp

        @foreach($categories as $cat)
            <a href="{{ url('/category/' . $cat['slug']) }}"
            class="group bg-white rounded-xl p-4 text-center shadow
                    hover:shadow-xl hover:-translate-y-1 transition">

                <div class="w-16 h-16 mx-auto flex items-center justify-center
                            rounded-full bg-pink-100 text-pink-600
                            group-hover:bg-pink-500 group-hover:text-white
                            text-2xl font-bold transition">
                    {{ $cat['short'] }}
                </div>

                <p class="mt-3 font-semibold text-sm">
                    {{ $cat['name'] }}
                </p>
            </a>
        @endforeach

    </div>
</section>


    <!-- SẢN PHẨM NỔI BẬT -->
    <section class="mt-12">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold">Sản phẩm nổi bật</h3>
            <a href="/products" class="text-pink-600 hover:underline">Xem tất cả</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            @php
                $products = [
                ['name' => 'Len Acrylic Pastel', 'price' => '85.000đ', 'image' => 'acrylic_color.jpg'],
                ['name' => 'Len Wool Mềm', 'price' => '95.000đ', 'image' => 'wool_large.jpg'],
                ['name' => 'Len Cotton Tự Nhiên', 'price' => '75.000đ', 'image' => 'milk_cotton.jpg'],
                ['name' => 'Bộ kit bắt đầu', 'price' => '150.000đ', 'image' => 'kit.jpg'],
            ];
            @endphp

            @foreach($products as $p)
                <div class="bg-white rounded-2xl shadow hover:shadow-2xl
                            hover:-translate-y-1 transition overflow-hidden">

                    <div class="relative">
                        <img src="{{ asset('images/' . $p['image']) }}"
                            class="w-full h-52 object-cover">
                        <span class="absolute top-3 left-3 bg-pink-500 text-white
                                    text-xs px-3 py-1 rounded-full">
                            Hot
                        </span>
                    </div>

                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800">{{ $p['name'] }}</h4>
                        <p class="text-pink-700 font-bold mt-2 text-lg">{{ $p['price'] }}</p>

                        <div class="mt-4 flex gap-3">
                            <button class="flex-1 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
                                Xem
                            </button>
                            <button class="flex-1 py-2 border border-pink-300 text-pink-700 rounded-lg hover:bg-pink-50">
                                🛒 Thêm
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>


    <!-- ƯU ĐÃI -->
    <section class="mt-14 bg-gradient-to-r from-pink-400 to-pink-500
                    text-white p-8 rounded-2xl shadow-xl">
        <h3 class="text-2xl font-extrabold text-pink-700">
    🎉 Ưu đãi đặc biệt
</h3>
<p class="mt-2 text-gray-800 font-semibold">
    Giảm 10% cho đơn đầu tiên – Miễn phí ship đơn từ 200k
</p>
        <a href="/products"
        class="inline-block mt-4 px-6 py-3 bg-pink-40 text-pink-600
                font-semibold rounded-full hover:scale-105 transition">
            Mua ngay
        </a>
    </section>


    <!-- FEEDBACK -->
    <section class="mt-12">
        <h3 class="text-xl font-bold mb-4">Feedback khách hàng</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach([1,2,3] as $f)
                <div class="bg-white shadow rounded-2xl overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset('images/khach' . $f . '.jpg') }}"
                        class="w-full h-48 object-cover">

                    <div class="p-4 text-sm">
                        <p class="italic">“Len đẹp, mềm và màu giống hình!”</p>
                        <p class="mt-2 text-xs text-pink-600 font-semibold">
                            ⭐⭐⭐⭐⭐ — Khách {{ $f }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    </div>

</x-app-layout>
