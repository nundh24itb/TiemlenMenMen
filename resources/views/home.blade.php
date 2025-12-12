
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Chào mừng đến Tiệm Len Mèn Mén
        </h2>
    </x-slot>



    <section class="relative z-0 h-[400px]">

    <img src="{{ asset('images/bgg.png') }}"
         class="absolute inset-0 w-full h-full object-cover z-0" alt="Banner">

    <div class="absolute inset-0 bg-pink-50/30 z-0"></div>

    <div class="relative z-10 flex flex-col justify-center h-full p-6 md:p-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-pink-700">
            Len đẹp – Mềm mịn
        </h1>
        <p class="mt-3 text-pink-600">
            Chuyên cung cấp len Acrylic, Wool, Cotton… với màu sắc đa dạng và mềm mại.
        </p>

        <div class="mt-5 flex gap-4">
            <a href="/products" class="px-5 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
                Xem sản phẩm
            </a>
            <a href="/contact" class="px-5 py-2 border border-pink-300 rounded-lg text-pink-700 hover:bg-pink-100">
                Liên hệ
            </a>
        </div>
    </div>

</section>



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
               class="block bg-white rounded-lg p-4 text-center shadow hover:shadow-md hover:bg-pink-50 transition">

                <div class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-pink-100 text-pink-600 font-bold text-xl">
                    {{ $cat['short'] }}
                </div>

                <p class="mt-2 font-semibold text-sm">
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
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="{{ asset('images/' . $p['image']) }}"
     class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h4 class="font-semibold">{{ $p['name'] }}</h4>
                        <p class="text-pink-700 font-bold mt-2">{{ $p['price'] }}</p>

                        <div class="mt-3 flex gap-3">
                            <button class="px-3 py-1 bg-pink-500 text-white rounded text-sm hover:bg-pink-700">Xem</button>
                            <button class="px-3 py-1 border border-pink-300 text-pink-700 rounded text-sm hover:border-pink-400">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>


    <!-- ƯU ĐÃI -->
    <section class="mt-12 bg-pink-100 p-6 rounded-lg">
        <h3 class="text-lg font-bold">Ưu đãi đặc biệt</h3>
        <p class="text-pink-700 mt-1">
            Giảm 10% cho đơn đầu tiên – Miễn phí ship đơn từ 200k.
        </p>
        <a href="/products" class="mt-3 inline-block px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
            Mua ngay
        </a>
    </section>


    <!-- FEEDBACK -->
    <section class="mt-12">
        <h3 class="text-xl font-bold mb-4">Feedback khách hàng</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach([1,2,3] as $f)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                     <img src="{{ asset('images/khach' . $f . '.jpg') }}"
                         class="w-full h-48 object-cover">
                    <div class="p-3 text-sm">
                        <p>“Len đẹp, mềm và màu giống hình!”</p>
                        <p class="mt-2 text-xs text-pink-600">— Khách {{ $f }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

</x-app-layout>
