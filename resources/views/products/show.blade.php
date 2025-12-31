<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">

                <p class="mb-2"><strong>Danh mục:</strong> {{ $product->category ?? 'Không có' }}</p>
                <p class="mb-2"><strong>Giá:</strong> {{ $product->price }} VND</p>
                <p class="mb-4"><strong>Mô tả:</strong> {{ $product->description }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-6 py-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                        Thêm vào giỏ hàng
                    </button>
                </form>

                <a href="{{ route('products.index') }}" class="mt-4 text-pink-600 hover:underline">
                    ← Quay về danh sách sản phẩm
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
