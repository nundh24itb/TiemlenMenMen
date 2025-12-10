<!DOCTYPE html>
<html>
<head>
    <title>Revenue Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Thống kê doanh thu theo ngày</h2>
    <canvas id="revenueChart" width="800" height="400"></canvas>

    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'bar', // 'line', 'pie', ...
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Doanh thu',
                    data: @json($totals),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
