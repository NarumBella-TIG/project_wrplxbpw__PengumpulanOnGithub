
<link rel="stylesheet" href="/project_wrplxbpw/src/output.css">
<?php include __DIR__.'/sidebar.php'; ?>

<div class="ml-64 p-8 min-h-screen bg-gradient-to-b from-green-100 via-white to-green-50">
    <div class="max-w-8xl mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"/></svg>
                Laporan Keuangan
            </h1>
            <div class="flex gap-2">
                <a href="/project_wrplxbpw/public/index.php?<?= http_build_query(array_merge($_GET, ['action' => 'laporan_keuangan', 'export' => 'pdf'])) ?>"
   class="bg-green-500 text-white px-4 py-2 rounded-xl shadow font-semibold flex items-center gap-2 hover:bg-green-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    Export PDF
</a>


            </div>
        </div>
        <form method="get" class="flex flex-wrap gap-4 mb-6 items-end">
            <input type="hidden" name="action" value="laporan_keuangan">
            <div>
                <label class="block text-green-700 font-semibold mb-1">Tanggal Mulai</label>
                <input type="date" name="start" value="<?= htmlspecialchars($_GET['start'] ?? '') ?>" class="border border-green-200 rounded-xl px-3 py-2 bg-white/80">
            </div>
            <div>
                <label class="block text-green-700 font-semibold mb-1">Tanggal Akhir</label>
                <input type="date" name="end" value="<?= htmlspecialchars($_GET['end'] ?? '') ?>" class="border border-green-200 rounded-xl px-3 py-2 bg-white/80">
            </div>
            <div>
                <label class="block text-green-700 font-semibold mb-1">Jenis</label>
                <select name="jenis" class="border border-green-200 rounded-xl px-3 py-2 bg-white/80">
                    <option value="">Semua</option>
                    <option value="pemasukan" <?= (($_GET['jenis'] ?? '')==='pemasukan')?'selected':'' ?>>Pemasukan</option>
                    <option value="pengeluaran" <?= (($_GET['jenis'] ?? '')==='pengeluaran')?'selected':'' ?>>Pengeluaran</option>
                </select>
            </div>
            <div>
                <label class="block text-green-700 font-semibold mb-1">Pembuat</label>
                <input type="text" name="pembuat" value="<?= htmlspecialchars($_GET['pembuat'] ?? '') ?>" placeholder="Nama user" class="border border-green-200 rounded-xl px-3 py-2 bg-white/80">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-xl shadow hover:bg-green-600 font-semibold">Filter</button>
        </form>
        <div class="overflow-x-auto rounded-xl mb-8">
            <table class="min-w-full bg-white rounded-xl shadow border border-green-100">
                <thead>
                    <tr class="bg-green-100 text-green-700">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Keterangan</th>
                        <th class="py-2 px-4">Unit</th>
                        <th class="py-2 px-4">Satuan</th>
                        <th class="py-2 px-4">Jenis</th>
                        <th class="py-2 px-4">Jumlah</th>
                        <th class="py-2 px-4">Pembuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dataLaporan)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-gray-400">Tidak ada data</td></tr>
                    <?php else: foreach ($dataLaporan as $i => $lap): ?>
                    <tr class="border-b hover:bg-green-50">
                        <td class="py-2 px-4 text-center"><?= $i+1 ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($lap['tanggal']) ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($lap['keterangan']) ?></td>
                            <td class="py-2 px-4 text-center"><?= htmlspecialchars($lap['unit']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($lap['satuan']) ?></td>
                            <td class="py-2 px-4">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    <?= ($lap['jenis'] ?? '') === 'masuk' ? 'bg-green-200 text-green-800' : 'bg-white' ?>">
                                    <?= ucfirst($lap['jenis'] ?? '-') ?>
                                </span>
                            </td>
                        <td class="py-2 px-4 font-semibold text-green-700">Rp <?= number_format($lap['jumlah'],0,',','.') ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($lap['pembuat'] ?? '-') ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
