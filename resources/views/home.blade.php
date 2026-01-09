
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
        <h1 class="text-4xl font-extrabold text-pink-800 md:text-5xl drop-shadow-lg">
            Len đẹp – Mềm mịn – Thủ công tinh tế
        </h1>
        <p class="mt-3 text-pink-600">
            Chuyên cung cấp len Acrylic, Wool, Cotton… với màu sắc đa dạng và mềm mại.
        </p>

        <div class="flex gap-4 mt-5">
            <a href="/products"
   class="py-3 font-extrabold text-pink-700 transition bg-white rounded-full shadow-xl px-7 ring-2 ring-pink-500 hover:bg-pink-50 hover:scale-105">
    🧶 XEM SẢN PHẨM
</a>
            <a href="/contact" class="px-5 py-2 text-pink-700 border border-pink-300 rounded-lg hover:bg-pink-100">
                Liên hệ
            </a>
        </div>
    </div>
</section>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- DANH MỤC -->
    <section class="mt-10">
    <h3 class="mb-4 text-xl font-bold">Danh mục</h3>

    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-6">

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
            class="p-4 text-center transition bg-white shadow group rounded-xl hover:shadow-xl hover:-translate-y-1">

                <div class="flex items-center justify-center w-16 h-16 mx-auto text-2xl font-bold text-pink-600 transition bg-pink-100 rounded-full group-hover:bg-pink-500 group-hover:text-white">
                    {{ $cat['short'] }}
                </div>

                <p class="mt-3 text-sm font-semibold">
                    {{ $cat['name'] }}
                </p>
            </a>
        @endforeach

    </div>
</section>


    <!-- SẢN PHẨM NỔI BẬT -->
    <section class="mt-12" x-data="cartToast()">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold">Sản phẩm nổi bật</h3>
            <a href="/products" class="text-pink-600 hover:underline">Xem tất cả</a>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">

            {{-- @php
                $products = [
                ['name' => 'Len Acrylic Pastel', 'price' => '85.000đ', 'image' => 'acrylic_color.jpg'],
                ['name' => 'Len Wool Mềm', 'price' => '95.000đ', 'image' => 'wool_large.jpg'],
                ['name' => 'Len Cotton Tự Nhiên', 'price' => '75.000đ', 'image' => 'milk_cotton.jpg'],
                ['name' => 'Bộ kit bắt đầu', 'price' => '150.000đ', 'image' => 'kit.jpg'],
            ];
            @endphp --}}

            @foreach($products as $p)
            <div class="transition bg-white shadow rounded-2xl hover:shadow-xl">

                <img src="{{ asset('images/' . $p->image) }}"
                    class="object-cover w-full h-40 transition duration-500 group-hover:scale-105">


                <div class="p-4">
                    {{-- <h4 class="font-semibold">{{ $p->name }}</h4> --}}
                    <div class="flex items-center justify-between mt-2">
                        {{-- Tên sản phẩm (bên trái) --}}
                        <h4 class="text-base font-semibold">
                            {{ $p->name }}
                        </h4>

                        {{-- Sao đánh giá (bên phải) --}}
                        <div class="flex items-center gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= ($p->rating ?? 4) ? 'text-yellow-400' : 'text-gray-300' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1
                                    1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8
                                    2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755
                                    1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8
                                    2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1
                                    1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81h3.461a1
                                    1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            <span class="text-xs text-gray-500">(4.8)</span>
                        </div>
                    </div>
                    <p class="mt-1 font-bold text-pink-700">
                        {{ number_format($p->price) }}đ
                    </p>

                    <div class="flex gap-3 mt-4">
                        <a href="{{ route('products.show', $p->id) }}"
                        class="flex-1 py-2 text-center text-white transition bg-pink-500 rounded-lg hover:bg-pink-600">
                            👀 Xem
                        </a>

                        <button @click="addToCart({{ $p->id }})"
                                class="flex-1 py-2 text-pink-700 transition border border-pink-300 rounded-lg hover:bg-pink-50">
                            🛒 Thêm
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

{{-- <script>
        function cartToast() {
            return {
                toasts: [],
                add(message) {
                    const id = Date.now();
                    this.toasts.push({id, message});
                    setTimeout(() => {
                        this.toasts = this.toasts.filter(t => t.id !== id);
                    }, 2000);
                },
                addToCart(productId) {
                    fetch(`/cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin'
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success){
                            this.add('Đã thêm vào giỏ hàng!');
                        } else {
                            this.add('Lỗi khi thêm giỏ hàng');
                        }
                    })
                    .catch(()=>this.add('Lỗi server'));
                }
            }
        }
    </script> --}}

    <script>
document.addEventListener('alpine:init', () => {
    Alpine.data('cartToast', () => ({
        addToCart(productId) {
            alert('Đã thêm sản phẩm ID: ' + productId);

            // Sau khi test OK, mới mở lại fetch

            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Đã thêm vào giỏ!');
                } else {
                    alert('Thêm thất bại');
                }
            });

        }
    }))
})
</script>

    </section>

    <!-- ƯU ĐÃI -->
    <section class="p-8 text-white shadow-xl mt-14 bg-gradient-to-r from-pink-400 to-pink-500 rounded-2xl">
        <h3 class="text-2xl font-extrabold text-pink-700">
    🎉 Ưu đãi đặc biệt
</h3>
<p class="mt-2 font-semibold text-gray-800">
    Giảm 10% cho đơn đầu tiên – Miễn phí ship đơn từ 200k
</p>
        <a href="/products"
        class="inline-block px-6 py-3 mt-4 font-semibold text-pink-600 transition rounded-full bg-pink-40 hover:scale-105">
            Mua ngay
        </a>
    </section>


    <!-- FEEDBACK -->
    <section class="mt-12">
        <h3 class="mb-4 text-xl font-bold">Feedback khách hàng</h3>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">

            @foreach([1,2,3] as $f)
                <div class="overflow-hidden transition bg-white shadow rounded-2xl hover:shadow-xl">
                    <img src="{{ asset('images/khach' . $f . '.jpg') }}"
                        class="object-cover w-full h-40 transition duration-500 group-hover:scale-105">

                    <div class="p-4 text-sm">
                        <p class="italic">“Len đẹp, mềm và màu giống hình!”</p>
                        <p class="mt-2 text-xs font-semibold text-pink-600">
                            ⭐⭐⭐⭐⭐ — Khách {{ $f }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    </div>

</x-app-layout>
