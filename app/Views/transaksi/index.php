


<link rel="stylesheet" href="../src/output.css">
<?php include __DIR__.'/../dashboard/sidebar.php'; ?>
<div class="ml-64 p-8 min-h-screen bg-gradient-to-b from-green-100 via-white to-green-50">
    <div class="max-w-6xl mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"/></svg>
                Data Transaksi
            </h1>
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] !== 'manajer'): ?>
                <a href="index.php?action=create_transaksi" class="bg-green-500 text-white px-5 py-2 rounded-xl shadow hover:from-green-600 hover:to-yellow-500 font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" ...></svg>
                    Tambah Transaksi
                </a>
            <?php endif; ?>

        </div>
        <!-- Grafik Keuangan Bulanan -->
        <div class="max-w-4xl mx-auto mb-10">
            <div class="bg-white rounded-2xl shadow p-6 border border-green-200">
                <h2 class="text-lg font-bold text-green-700 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                    Grafik Keuangan Bulanan
                </h2>
                <canvas id="chartKeuangan" height="80"></canvas>
            </div>
        </div>
        <?php
        
        $transaksiPerBulan = [];
        if (!empty($dataTransaksi) && is_array($dataTransaksi)) {
            foreach ($dataTransaksi as $tr) {
                $bulan = date('Y-m', strtotime($tr['tanggal']));
                $transaksiPerBulan[$bulan][] = $tr;
            }
        }
        ?>
        <div class="overflow-x-auto rounded-xl">
        <?php foreach ($transaksiPerBulan as $bulan => $transaksi): ?>
            <div class="mb-10">
                <div class="font-bold text-green-700 text-lg mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M12 12h.01M9 12h.01" /></svg>
                    <?= date('F Y', strtotime($bulan.'-01')) ?>
                </div>
                <table class="min-w-full bg-white rounded-xl shadow border border-green-100 mb-4">
                    <thead>
                        <tr class="bg-green-100 text-green-700">
                            <th class="py-2 px-4">No</th>
                            <th class="py-2 px-4">Tanggal</th>
                            <th class="py-2 px-4">Keterangan</th>
                            <th class="py-2 px-4">Unit</th>
                            <th class="py-2 px-4">Satuan</th>
                            <th class="py-2 px-4">Tipe</th>
                            <th class="py-2 px-4">Jumlah</th>
                            <th class="py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $i => $tr): ?>
                        <tr class="border-b hover:bg-green-50">
                            <td class="py-2 px-4 text-center"><?= $i+1 ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($tr['tanggal']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($tr['keterangan']) ?></td>
                            <td class="py-2 px-4 text-center"><?= htmlspecialchars($tr['unit']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($tr['satuan']) ?></td>
                            <td class="py-2 px-4">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    <?= $tr['tipe']==='pemasukan' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' ?>">
                                    <?= ucfirst($tr['tipe']) ?>
                                </span>
                            </td>


                            <td class="py-2 px-4 font-semibold text-green-700">Rp <?= number_format($tr['jumlah'],0,',','.') ?></td>
                            <td class="py-2 px-4 text-center">
                                
                                    <?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] !== 'manajer'): ?>
                                        <a href="index.php?action=edit_transaksi&id=<?= $tr['id'] ?>" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium hover:bg-blue-200 transition mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2" />
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="index.php?action=delete_transaksi&id=<?= $tr['id'] ?>" onclick="return confirm('Hapus?')" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm font-medium hover:bg-red-200 transition mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Hapus
                                        </a>
                                    <?php endif; ?>
                                <a href="#" 
                                    onclick="showDetailTransaksi(<?= htmlspecialchars(json_encode($tr), ENT_QUOTES, 'UTF-8') ?>); return false;" 
                                    class="inline-flex items-center gap-1 text-sm text-white bg-green-600 hover:bg-green-700 px-3 py-1 rounded-full shadow-sm transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Modal Detail Transaksi -->
<div id="modalDetailTransaksi" class="fixed inset-0 z-50 items-center justify-center bg-black/40 hidden">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full border-2 border-green-300 relative">
        <button onclick="closeDetailTransaksi()" class="absolute top-2 right-2 text-green-700 hover:text-red-500 text-xl font-bold">&times;</button>
        <h2 class="text-xl font-bold text-green-700 mb-4 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"/></svg>
            Detail Transaksi
        </h2>
        <div class="space-y-2 text-green-800">
            <div><span class="font-semibold">ID:</span> <span id="detailId"></span></div>
            <div><span class="font-semibold">Tanggal:</span> <span id="detailTanggal"></span></div>
            <div><span class="font-semibold">Keterangan:</span> <span id="detailKeterangan"></span></div>
            <div><span class="font-semibold">Tipe:</span> <span id="detailTipe"></span></div>
            <div><span class="font-semibold">Jumlah:</span> <span id="detailJumlah"></span></div>
        </div>
    </div>
</div>
<!-- Chart.js CDN agar grafik langsung muncul -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Chart.js Loader (jika tetap ingin pakai loader custom) -->
<script src="/chartjs-loader.js"></script>
<script>
function showDetailTransaksi(tr) {
    const modal = document.getElementById('modalDetailTransaksi');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.getElementById('detailId').textContent = tr.id;
    document.getElementById('detailTanggal').textContent = tr.tanggal;
    document.getElementById('detailKeterangan').textContent = tr.keterangan;
    document.getElementById('detailTipe').textContent = tr.tipe.charAt(0).toUpperCase() + tr.tipe.slice(1);
    document.getElementById('detailJumlah').textContent = 'Rp ' + Number(tr.jumlah).toLocaleString('id-ID');
}
function closeDetailTransaksi() {
    const modal = document.getElementById('modalDetailTransaksi');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
// Data untuk grafik
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
function renderChart() {
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
}
if(window.Chart) renderChart();
else window.addEventListener('chartjs:loaded', renderChart);
</script>
