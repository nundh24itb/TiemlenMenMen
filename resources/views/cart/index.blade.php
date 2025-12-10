{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Giỏ hàng của bạn
        </h2>
    </x-slot>

    <div class="p-6">
        @php
            $cart = session('cart', []);
        @endphp

        @if(count($cart) > 0)
            <h3 class="text-lg font-bold mb-4">Các sản phẩm trong giỏ:</h3>
            <ul class="list-disc pl-6">
                @foreach($cart as $item)
                    <li>{{ $item['name'] }} - {{ $item['quantity'] }} x {{ number_format($item['price']) }} VND</li>
                @endforeach
            </ul>

            @php
                $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
            @endphp
            <p class="mt-4 font-bold">Tổng tiền: {{ number_format($total) }} VND</p>
        @else
            <p>Giỏ hàng trống!</p>
        @endif
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-pink-700">
            Giỏ hàng của bạn
        </h2>
    </x-slot>

    <div class="p-6" x-data="cartPage()">

        {{-- Toast container --}}
        <div class="fixed top-5 right-5 space-y-2 z-50">
            <template x-for="toast in toasts" :key="toast.id">
                <div x-text="toast.message"
                     x-transition
                     class="px-4 py-2 text-white bg-green-500 rounded shadow-lg">
                </div>
            </template>
        </div>

        @if(count($cart) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead class="bg-pink-200">
                    <tr>
                        <th class="px-4 py-2">Sản phẩm</th>
                        <th class="px-4 py-2">Ảnh</th>
                        <th class="px-4 py-2">Giá</th>
                        <th class="px-4 py-2">Số lượng</th>
                        <th class="px-4 py-2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item['name'] }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('images/' . $item['image']) }}" class="w-16 h-16 object-cover rounded" alt="{{ $item['name'] }}">
                        </td>
                        <td class="px-4 py-2">{{ number_format($item['price'],0,',','.') }} VND</td>
                        <td class="px-4 py-2 flex items-center justify-center">
                            <button @click="updateQty({{ $id }}, -1)" class="px-2 py-1 bg-pink-300 rounded hover:bg-pink-400">-</button>
                            <span class="mx-2" x-text="cart[{{ $id }}].quantity">{{ $item['quantity'] }}</span>
                            <button @click="updateQty({{ $id }}, 1)" class="px-2 py-1 bg-pink-300 rounded hover:bg-pink-400">+</button>
                        </td>
                        <td class="px-4 py-2">
                            <button @click="removeItem({{ $id }})" class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">
                                Xóa
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="mt-6 text-right">
            <p class="text-lg font-bold mb-2">Tổng tiền: <span x-text="totalPrice.toLocaleString('vi-VN') + ' VND'">{{ number_format($total,0,',','.') }}</span></p>
            <a href="{{ route('checkout.index') }}" class="px-6 py-3 text-white bg-pink-600 rounded hover:bg-pink-700">
                Thanh toán
            </a>
        </div> --}}

      <div class="mt-6 text-right">
    <p class="text-lg font-bold mb-2">
        Tổng tiền: <span x-text="totalPrice.toLocaleString('vi-VN') + ' VND'">
            {{ number_format($total,0,',','.') }}
        </span>
    </p>

    @if(auth()->check())
        <a href="{{ route('checkout.index') }}"
           class="px-6 py-3 text-white bg-pink-600 rounded hover:bg-pink-700">
            Thanh toán
        </a>
    @else
        <a href="{{ route('login') }}?redirect=checkout"
           class="px-6 py-3 text-white bg-pink-600 rounded hover:bg-pink-700">
            Đăng nhập để thanh toán
        </a>
    @endif
</div>

        @else
        <p class="text-gray-700 text-lg">Giỏ hàng trống!</p>
        @endif
    </div>

    <script>
        function cartPage() {
            return {
                cart: @json($cart),
                totalPrice: {{ $total }},
                toasts: [],
                addToast(message){
                    const id = Date.now();
                    this.toasts.push({id, message});
                    setTimeout(() => this.toasts = this.toasts.filter(t => t.id !== id), 2000);
                },
                updateQty(id, change){
                    fetch(`/cart/update/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({change})
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success){
                            if(data.newQuantity === 0){
                                delete this.cart[id];
                            } else {
                                this.cart[id].quantity = data.newQuantity;
                            }
                            this.totalPrice = data.totalPrice;
                            this.addToast('Cập nhật giỏ hàng thành công!');
                        } else {
                            this.addToast(data.message || 'Lỗi khi cập nhật giỏ hàng');
                        }
                    })
                    .catch(()=> this.addToast('Lỗi server'));
                },
                removeItem(id){
                    fetch(`/cart/remove/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success){
                            delete this.cart[id];
                            this.totalPrice = Object.values(this.cart).reduce((sum,i)=>sum+i.price*i.quantity,0);
                            this.addToast('Đã xóa sản phẩm!');
                        } else {
                            this.addToast('Lỗi khi xóa sản phẩm');
                        }
                    })
                    .catch(()=> this.addToast('Lỗi server'));
                }
            }
        }
    </script>
</x-app-layout>
