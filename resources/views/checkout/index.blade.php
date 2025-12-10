<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Thanh toán
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Giỏ hàng --}}
            <div class="bg-white shadow rounded p-6 mb-6">
                <h3 class="text-lg font-bold mb-4">Giỏ hàng của bạn</h3>
                @if(empty($cart))
                    <p>Giỏ hàng trống.</p>
                @else
                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="py-2">Sản phẩm</th>
                                <th class="py-2">Số lượng</th>
                                <th class="py-2">Giá</th>
                                <th class="py-2">Tạm tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr class="border-t">
                                    <td class="py-2">{{ $item['name'] }}</td>
                                    <td class="py-2">{{ $item['quantity'] }}</td>
                                    <td class="py-2">{{ number_format($item['price'],0,',','.') }} VND</td>
                                    <td class="py-2">{{ number_format($item['price'] * $item['quantity'],0,',','.') }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 text-right font-bold">
                        Tổng: {{ number_format($total,0,',','.') }} VND
                    </div>
                @endif
            </div>

            {{-- Form thông tin khách hàng --}}
            <div class="bg-white shadow rounded p-6">
                <h3 class="text-lg font-bold mb-4">Thông tin nhận hàng</h3>
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Họ và tên</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" required
                               class="w-full border rounded px-3 py-2">
                        @error('customer_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Email (không bắt buộc)</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('customer_email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="mb-4">
                        <label class="block mb-1 font-semibold">Số điện thoại</label>
                        <input type="text" name="customer_phone" value="{{ old('customer_phone') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('customer_phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="mb-4">
    <label class="block mb-1 font-semibold">Số điện thoại</label>
    <input type="text" name="customer_phone" value="{{ old('customer_phone') }}"
           class="w-full border rounded px-3 py-2"
           required
           pattern="0[0-9]{9}"
           title="Số điện thoại phải đủ 10 số và bắt đầu bằng 0">
    @error('customer_phone')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Địa chỉ nhận hàng</label>
                        <textarea name="shipping_address" required class="w-full border rounded px-3 py-2">{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Đặt hàng
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
