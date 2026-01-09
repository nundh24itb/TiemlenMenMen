<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover w-16 h-16 rounded">

                <p class="mb-2"><strong>Danh mục:</strong> {{ $product->category ?? 'Không có' }}</p>
                <p class="mb-2"><strong>Giá:</strong> {{ $product->price }} VND</p>
                <p class="mb-4"><strong>Mô tả:</strong> {{ $product->description }}</p>

                {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    {{-- <button type="submit" class="px-6 py-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                        Thêm vào giỏ hàng
                    </button> --}}
                    {{-- <button @click="addToCart({{ $product->id }})"
                                class="flex-1 py-2 text-pink-700 transition border border-pink-300 rounded-lg hover:bg-pink-50">
                            🛒 Thêm vào giỏ hàng
                        </button>
                </form> --}}
                <button @click="addToCart({{ $product->id }})"
                                class="flex-1 py-2 text-pink-700 transition border border-pink-300 rounded-lg hover:bg-pink-50">
                            🛒 Thêm vào giỏ hàng
                        </button>

                <a href="{{ route('products.index') }}" class="mt-4 text-pink-600 hover:underline">
                    ← Quay về danh sách sản phẩm
                </a>
            </div>
        </div>
    </div>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('cartToast', () => ({
        addToCart(productId) {
            alert('Đã thêm sản phẩm ID: ' + productId);
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
</x-app-layout>
