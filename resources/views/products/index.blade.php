<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Danh sách sản phẩm
        </h2>
    </x-slot>

    <div class="py-6" x-data="cartToast()">
        {{-- Toast container --}}
        <div class="fixed top-5 right-5 space-y-2 z-50">
            <template x-for="toast in toasts" :key="toast.id">
                <div x-text="toast.message"
                     x-transition
                     class="px-4 py-2 text-white bg-green-500 rounded shadow-lg">
                </div>
            </template>
        </div>

        {{-- Sản phẩm --}}
        <div class="grid grid-cols-1 gap-6 mx-auto max-w-7xl sm:px-6 lg:px-8 md:grid-cols-3">
            @foreach ($products as $p)
                {{-- <div class="flex flex-col p-4 bg-white rounded-lg shadow-xl"> --}}
                    <div class="relative flex flex-col p-4 bg-white rounded-lg shadow-xl">
                    <img src="{{ asset('images/' . $p->image) }}" class="w-full h-40 object-cover
            group-hover:scale-105 transition duration-500" alt="{{ $p->name }}">
                    {{-- <h3 class="text-lg font-bold">{{ $p->name }}</h3> --}}
                    <div class="flex items-center justify-between mt-2">
                        {{-- Tên sản phẩm (bên trái) --}}
                        <h3 class="text-base font-semibold">
                            {{ $p->name }}
                        </h3>

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
                    <p class="font-semibold text-pink-600">{{ number_format($p->price, 0, ',', '.') }} VND</p>

                    <div class="mt-auto">
                        <a href="{{ route('products.show', $p->id) }}"
                           class="inline-block px-4 py-2 mr-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                            Xem chi tiết
                        </a>

                        <button @click="addToCart({{ $p->id }})" class="px-4 py-2 text-white bg-green-400 rounded hover:bg-green-500">
                            Thêm giỏ hàng
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
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
    </script>
</x-app-layout>
