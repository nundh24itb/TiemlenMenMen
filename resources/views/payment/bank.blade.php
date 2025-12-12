<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Thanh toán chuyển khoản</h2>

    <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
    <p><strong>Số tiền:</strong> {{ number_format($order->total) }} VND</p>

    <div class="mt-4 p-4 border rounded bg-white">
        <p><strong>Ngân hàng:</strong> VIETCOMBANK</p>
        <p><strong>Chủ TK:</strong> NGUYEN VAN A</p>
        <p><strong>Số tài khoản:</strong> 0123456789</p>

        <img src="https://img.vietqr.io/image/970436-0123456789-print.png?amount={{ $order->total }}&addInfo=Thanh%20toan%20DH%20{{ $order->id }}"
             class="mt-4 w-64 border">
    </div>
</x-app-layout>
