<?php
require_once __DIR__.'/../../Models/Transaksi.php';
$model = new Transaksi();
$dataTransaksi = $model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Keuangan</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-br from-green-200 via-yellow-100 to-yellow-300 min-h-screen">
    <?php include __DIR__.'/sidebar.php'; ?>
    <div class="ml-64">
        <div class="max-w-4xl mx-auto mt-16 bg-white/90 rounded-xl shadow-2xl p-8 border border-green-300">
            <h1 class="text-2xl font-bold text-green-800 mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                Grafik Keuangan Bulanan
            </h1>
            <canvas id="chartKeuangan" height="100"></canvas>
        </div>
    </div>
<script>
const dataTransaksi = <?php echo json_encode($dataTransaksi); ?>;
const bulanMap = {};
dataTransaksi.forEach(tr => {
    const bulan = tr.tanggal.substr(0,7);
    if (!bulanMap[bulan]) bulanMap[bulan] = { pemasukan:0, pengeluaran:0 };
    if(tr.tipe==="pemasukan") bulanMap[bulan].pemasukan += parseFloat(tr.jumlah);
    else if(tr.tipe==="pengeluaran") bulanMap[bulan].pengeluaran += parseFloat(tr.jumlah);
});
const labels = Object.keys(bulanMap).sort();
const pemasukan = labels.map(b => bulanMap[b].pemasukan);
const pengeluaran = labels.map(b => bulanMap[b].pengeluaran);
new Chart(document.getElementById('chartKeuangan').getContext('2d'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            { label: 'Pemasukan', data: pemasukan, backgroundColor: 'rgba(34,197,94,0.7)' },
            { label: 'Pengeluaran', data: pengeluaran, backgroundColor: 'rgba(239,68,68,0.7)' }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { y: { beginAtZero: true, ticks: { callback: v => 'Rp ' + v.toLocaleString('id-ID') } } }
    }
});
</script>
</body>
</html>
