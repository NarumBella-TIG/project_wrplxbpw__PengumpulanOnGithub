<link rel="stylesheet" href="../src/output.css">
<?php include __DIR__.'/../dashboard/sidebar.php'; ?>
<div class="ml-64 p-8">
    <div class="max-w-4xl mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                Data Gaji Pekerja
            </h1>
            <a href="index.php?action=create_gaji" class="bg-gradient-to-r from-green-500 to-yellow-400 text-white px-5 py-2 rounded-xl shadow hover:from-green-600 hover:to-yellow-500 font-semibold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Gaji
            </a>
        </div>
        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full bg-white rounded-xl shadow border border-green-100">
                <thead>
                    <tr class="bg-green-100 text-green-700">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Jabatan</th>
                        <th class="py-2 px-4">Jumlah</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataGaji as $i => $gaji): ?>
                    <tr class="border-b hover:bg-green-50">
                        <td class="py-2 px-4 text-center"><?= $i+1 ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($gaji['nama']) ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($gaji['jabatan']) ?></td>
                        <td class="py-2 px-4 font-semibold text-green-700">Rp <?= number_format($gaji['jumlah'],0,',','.') ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($gaji['tanggal']) ?></td>
                        <td class="py-2 px-4 text-center">
                            <a href="index.php?action=edit_gaji&id=<?= $gaji['id'] ?>" class="inline-flex items-center text-blue-600 hover:underline mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2" /></svg>
                                Edit
                            </a>
                            <a href="index.php?action=delete_gaji&id=<?= $gaji['id'] ?>" class="inline-flex items-center text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
