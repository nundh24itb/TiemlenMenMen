{{-- <x-admin-layout>
    <h1>Welcome, Admin!</h1>

    <div class="dashboard-widgets">
        <div>Total Products: {{ $productCount }}</div>
        <div>Total Orders: {{ $orderCount }}</div>
        <div>Total Users: {{ $userCount }}</div>
    </div>

    <canvas id="salesChart"></canvas>

    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const data = @json($salesData);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(d => d.date),
                datasets: [{
                    label: 'Doanh thu',
                    data: data.map(d => d.total),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            }
        });
    </script>
</x-admin-layout> --}}

@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-600 text-xl">Sản phẩm</h3>
        <p class="text-3xl font-bold">{{ $productCount }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-600 text-xl">Danh mục</h3>
        <p class="text-3xl font-bold">{{ $categoryCount }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-600 text-xl">Đơn hàng</h3>
        <p class="text-3xl font-bold">{{ $orderCount }}</p>
    </div>

</div>
@endsection

