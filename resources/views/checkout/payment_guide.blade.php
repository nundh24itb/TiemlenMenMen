<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Hướng dẫn thanh toán
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

            <h3 class="text-lg font-bold mb-4">Thông tin thanh toán</h3>

            <p><strong>Mã đơn hàng:</strong> #{{ $order->id }}</p>
            <p><strong>Số tiền cần thanh toán:</strong> {{ number_format($order->total, 0, ',', '.') }} VND</p>

            <div class="mt-4">
                <p><strong>Ngân hàng:</strong> DemoBank</p>
                <p><strong>Số tài khoản:</strong> 0123456789</p>
                <p><strong>Tên chủ tài khoản:</strong> DEMO USER</p>
                <p><strong>Nội dung chuyển khoản:</strong> DH{{ $order->id }}</p>
            </div>

            <div class="mt-6 text-center">
                <p class="font-semibold mb-2">Quét mã QR để thanh toán (demo)</p>
                <img src="/images/qr-demo.png" class="mx-auto w-48 h-48 border" alt="QR Demo">
            </div>

            <form method="POST" action="{{ route('checkout.confirmPayment', $order->id) }}" class="mt-6">
                @csrf
                <button class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Tôi đã thanh toán
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
