{{-- {{-- @extends('layouts.app')

@section('content')
<h1>Danh mục sản phẩm</h1>
<div class="grid grid-cols-3 gap-4">
@foreach($products as $product)
    <div class="p-2 border">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-40">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->price }} VND</p>
        <a href="{{ route('products.show', $product->id) }}">Xem chi tiết</a>
    </div>
@endforeach
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<h2 class="mb-4 text-2xl font-bold">Danh mục sản phẩm</h2>

<div class="grid grid-cols-3 gap-5">
@foreach ($products as $p)
    <div class="p-4 bg-white rounded shadow">
        <img src="{{ $p->image }}" class="object-cover w-full h-40 mb-2 rounded">
        <h3 class="font-bold">{{ $p->name }}</h3>
        <p class="font-semibold text-pink-600">{{ number_format($p->price) }}đ</p>

        <a href="/product/{{ $p->id }}" class="text-blue-500">Xem chi tiết</a>
    </div>
@endforeach
</div>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection --}}


{{-- @extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <h1>Danh sách sản phẩm</h1>

    @foreach ($products as $p)
        <p>{{ $p->name }} - {{ $p->price }}</p>
    @endforeach
@endsection --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Danh sách sản phẩm
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @foreach ($products as $p)
                    <p>{{ $p->name }} - {{ $p->price }}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Danh sách sản phẩm
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="grid grid-cols-1 gap-6 mx-auto max-w-7xl sm:px-6 lg:px-8 md:grid-cols-3">
            @foreach ($products as $p)
                <div class="flex flex-col p-4 bg-white rounded-lg shadow-xl">
                    {{-- <img src="{{ asset($p->image) }}" class="object-cover w-full h-48 mb-2 rounded" alt="{{ $p->name }}"> --}}
{{--
                    <img src="{{ asset('images/' . $p->image) }}" class="object-cover w-full h-48 mb-2 rounded" alt="{{ $p->name }}">
                    <h3 class="text-lg font-bold">{{ $p->name }}</h3>
                    {{-- <p class="mb-2 font-semibold text-pink-600">{{ $p->price, 0, ',', '.' }} VND</p> --}}
                    {{-- <p class="font-semibold text-pink-600">{{ number_format($p->price, 0, ',', '.') }} VND</p>

                    <div class="mt-auto">
                        <a href="{{ route('products.show', $p->id) }}"
                           class="inline-block px-4 py-2 mr-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                            Xem chi tiết
                        </a>
                        <form action="{{ route('cart.add', $p->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-white bg-green-400 rounded hover:bg-green-500">
                                Thêm giỏ hàng
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>  --}}

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
                <div class="flex flex-col p-4 bg-white rounded-lg shadow-xl">
                    <img src="{{ asset('images/' . $p->image) }}" class="object-cover w-full h-48 mb-2 rounded" alt="{{ $p->name }}">
                    <h3 class="text-lg font-bold">{{ $p->name }}</h3>
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
