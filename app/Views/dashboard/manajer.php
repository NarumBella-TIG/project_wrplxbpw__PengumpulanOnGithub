<?php
require_once __DIR__.'/../../Models/Transaksi.php';
if (session_status() == PHP_SESSION_NONE) session_start();

$model = new Transaksi();
$dataTransaksi = $model->getAll();

$totalMasuk = 0;
$totalKeluar = 0;
$pemasukanList = [];
$pengeluaranList = [];
$pemasukanByCategory = [];
$pengeluaranByCategory = [];

foreach ($dataTransaksi as $tr) {
    if ($tr['tipe'] === 'pemasukan') {
        $totalMasuk += $tr['jumlah'];
        $pemasukanList[] = $tr;
        $category = $tr['keterangan'] ?: 'Lainnya';
        $pemasukanByCategory[$category] = ($pemasukanByCategory[$category] ?? 0) + $tr['jumlah'];
    } elseif ($tr['tipe'] === 'pengeluaran') {
        $totalKeluar += $tr['jumlah'];
        $pengeluaranList[] = $tr;
        $category = $tr['keterangan'] ?: 'Lainnya';
        $pengeluaranByCategory[$category] = ($pengeluaranByCategory[$category] ?? 0) + $tr['jumlah'];
    }
}

$totalSaldo = $totalMasuk - $totalKeluar;
$jumlahTransaksi = count($dataTransaksi);

$piePemasukanLabels = array_keys($pemasukanByCategory);
$piePemasukanData = array_values($pemasukanByCategory);
$piePengeluaranLabels = array_keys($pengeluaranByCategory);
$piePengeluaranData = array_values($pengeluaranByCategory);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
<?php include __DIR__.'/sidebar.php'; ?>

<div class="max-w-7xl mx-auto ml-64 p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-blue-500 text-white px-6 py-4 rounded-xl shadow flex justify-between items-center hover:shadow-lg transition">
            <div>
                <div class="text-base font-bold leading-tight">Rp <?= number_format($totalSaldo, 0, ',', '.') ?></div>
                <div class="text-xs text-white mt-1">Total Saldo</div>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <i class="fas fa-wallet fa-lg"></i>
            </div>
        </div>


        <div class="bg-green-500 text-white p-6 rounded-xl shadow flex justify-between items-center hover:shadow-lg transition">
            <div>
                <div class="text-base font-bold leading-tight"">Rp <?= number_format($totalMasuk, 0, ',', '.') ?></div>
                <div class="text-sm text-white mt-1">Total Pemasukan</div>
            </div>
            <div class="bg-green-100 p-3 rounded-full text-green-600">
                <i class="fas fa-arrow-down fa-lg"></i>
            </div>
        </div>

        <div class="bg-red-600 text-gray-800 p-6 rounded-xl shadow flex justify-between items-center hover:shadow-lg transition">
            <div>
                <div class="text-base text-white font-bold leading-tight"">Rp <?= number_format($totalKeluar, 0, ',', '.') ?></div>
                <div class="text-sm text-white mt-1">Total Pengeluaran</div>
            </div>
            <div class="bg-red-100 p-3 rounded-full text-red-600">
                <i class="fas fa-arrow-up fa-lg"></i>
            </div>
        </div>

        <div class="bg-white text-gray-800 p-6 rounded-xl shadow flex justify-between items-center hover:shadow-lg transition">
            <div>
                <div class="text-2xl font-bold"><?= $jumlahTransaksi ?></div>
                <div class="text-sm text-gray-500 mt-1">Jumlah Transaksi</div>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                <i class="fas fa-exchange-alt fa-lg"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="flex flex-col gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="font-bold text-lg mb-4">Rincian Pemasukan Terakhir</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="py-3 px-6">Keterangan</th>
                                <th class="py-3 px-6">Jumlah</th>
                                <th class="py-3 px-6">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_slice($pemasukanList, 0, 5) as $item): ?>
                            <tr class="bg-white border-b">
                                <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($item['keterangan']) ?></td>
                                <td class="py-4 px-6 text-green-600">+ Rp <?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                                <td class="py-4 px-6"><?= date('d M Y', strtotime($item['tanggal'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="font-bold text-lg mb-4">Grafik Pemasukan per Kategori</h3>
                <canvas id="pemasukanPieChart"></canvas>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="font-bold text-lg mb-4">Rincian Pengeluaran Terakhir</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="py-3 px-6">Keterangan</th>
                                <th class="py-3 px-6">Jumlah</th>
                                <th class="py-3 px-6">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_slice($pengeluaranList, 0, 5) as $item): ?>
                            <tr class="bg-white border-b">
                                <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($item['keterangan']) ?></td>
                                <td class="py-4 px-6 text-red-600">- Rp <?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                                <td class="py-4 px-6"><?= date('d M Y', strtotime($item['tanggal'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="font-bold text-lg mb-4">Grafik Pengeluaran per Kategori</h3>
                <canvas id="pengeluaranPieChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
const piePemasukanLabels = <?= json_encode($piePemasukanLabels) ?>;
const piePemasukanData = <?= json_encode($piePemasukanData) ?>;
const piePengeluaranLabels = <?= json_encode($piePengeluaranLabels) ?>;
const piePengeluaranData = <?= json_encode($piePengeluaranData) ?>;

new Chart(document.getElementById('pemasukanPieChart'), {
    type: 'doughnut',
    data: {
        labels: piePemasukanLabels,
        datasets: [{
            label: 'Pemasukan',
            data: piePemasukanData,
            backgroundColor: ['#22c55e', '#84cc16', '#4ade80', '#16a34a', '#15803d'],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
    }
});

new Chart(document.getElementById('pengeluaranPieChart'), {
    type: 'doughnut',
    data: {
        labels: piePengeluaranLabels,
        datasets: [{
            label: 'Pengeluaran',
            data: piePengeluaranData,
            backgroundColor: ['#ef4444', '#f97316', '#f87171', '#dc2626', '#b91c1c'],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
    }
});
</script>
</body>
</html>
