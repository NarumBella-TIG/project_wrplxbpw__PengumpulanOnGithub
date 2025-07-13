<?php include __DIR__.'/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
<div class="ml-64">
    <div class="max-w-5xl mx-auto mt-16 bg-white/90 rounded-xl shadow-2xl p-8 border border-green-300">
        <h1 class="text-2xl font-bold text-green-800 mb-6 flex items-center">
            <svg class="w-7 h-7 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2"></path></svg>
            Dashboard Keuangan
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-green-700 mb-2">Alur Kas (Cash Flow)</h2>
                <ul class="list-disc pl-6 text-green-900 space-y-1">
                    <li>Pemasukan: Rp 120.000.000</li>
                    <li>Pengeluaran: Rp 80.000.000</li>
                    <li>Saldo Akhir: <span class="font-bold">Rp 40.000.000</span></li>
                </ul>
            </div>
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-green-700 mb-2">Grafik Keuangan</h2>
                <canvas id="chartKeuangan" height="120"></canvas>
            </div>
        </div>
        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
            <h2 class="text-lg font-semibold text-green-700 mb-4">Neraca Sederhana</h2>
            <table class="min-w-full text-green-900">
                <thead>
                    <tr class="bg-green-100">
                        <th class="px-4 py-2 text-left">Aset</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Kewajiban</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Kas</td>
                        <td class="px-4 py-2">Rp 40.000.000</td>
                        <td class="px-4 py-2">Hutang</td>
                        <td class="px-4 py-2">Rp 10.000.000</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Aset Tetap</td>
                        <td class="px-4 py-2">Rp 100.000.000</td>
                        <td class="px-4 py-2">Modal</td>
                        <td class="px-4 py-2">Rp 130.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
const ctx = document.getElementById('chartKeuangan').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [
            {
                label: 'Pemasukan',
                data: [20000000, 25000000, 18000000, 22000000, 20000000, 15000000],
                backgroundColor: 'rgba(34,197,94,0.7)'
            },
            {
                label: 'Pengeluaran',
                data: [12000000, 14000000, 10000000, 16000000, 12000000, 9000000],
                backgroundColor: 'rgba(253,224,71,0.7)'
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: { display: false }
        }
    }
});
</script>
</body>
</html>
