<link rel="stylesheet" href="../src/output.css">
<?php include __DIR__.'/../dashboard/sidebar.php'; ?>
<div class="ml-64 p-8 min-h-screen bg-gradient-to-b from-green-100 via-white to-green-50">
    <div class="max-w-5xl mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22c4.418 0 8-4.03 8-9 0-3.866-3.134-7-7-7S4 9.134 4 13c0 4.97 3.582 9 8 9z"/></svg>
                Data Kebun
            </h1>
            <a href="index.php?action=create_kebun" class="bg-gradient-to-r from-green-500 to-yellow-400 text-white px-5 py-2 rounded-xl shadow hover:from-green-600 hover:to-yellow-500 font-semibold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Kebun
            </a>
        </div>
        <!-- Ringkasan Daftar Kebun -->
        <div class="mb-8 bg-green-50 border-2 border-green-400 rounded-xl p-4">
            <div class="font-extrabold text-green-800 text-lg mb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21V7a2 2 0 00-2-2H6a2 2 0 00-2 2v14" /></svg>
                Daftar Kebun (<?= count($dataKebun) ?>)
            </div>
            <div class="overflow-x-auto">
                <?php if (empty($dataKebun)): ?>
                    <div class="text-center text-green-500 py-4">Belum ada data kebun.</div>
                <?php else: ?>
                <table class="min-w-full text-green-900 text-sm">
                    <thead>
                        <tr class="bg-green-100">
                            <th class="px-3 py-1 text-left">Nama</th>
                            <th class="px-3 py-1 text-left">Lokasi</th>
                            <th class="px-3 py-1 text-left">Luas (Ha)</th>
                            <th class="px-3 py-1 text-left">Jenis Bibit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataKebun as $kebun): ?>
                        <tr class="border-b">
                            <td class="px-3 py-1 font-semibold text-green-700"><?= htmlspecialchars($kebun['nama']) ?></td>
                            <td class="px-3 py-1"><?= htmlspecialchars($kebun['lokasi']) ?></td>
                            <td class="px-3 py-1"><?= htmlspecialchars($kebun['luas']) ?></td>
                            <td class="px-3 py-1"><?= htmlspecialchars($kebun['jenis_bibit']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <div class="overflow-x-auto rounded-xl mb-8">
            <table class="min-w-full bg-white rounded-xl shadow border border-green-100">
                <thead>
                    <tr class="bg-green-100 text-green-700">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Lokasi</th>
                        <th class="py-2 px-4">Luas (Ha)</th>
                        <th class="py-2 px-4">Jenis Bibit</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataKebun as $i => $kebun): ?>
                    <tr class="border-b hover:bg-green-50">
                        <td class="py-2 px-4 text-center"><?= $i+1 ?></td>
                        <td class="py-2 px-4 font-semibold text-green-700"><?= htmlspecialchars($kebun['nama']) ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($kebun['lokasi']) ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($kebun['luas']) ?></td>
                        <td class="py-2 px-4"><?= htmlspecialchars($kebun['jenis_bibit']) ?></td>
                        <td class="py-2 px-4 text-center">
                            <a href="index.php?action=edit_kebun&id=<?= $kebun['id'] ?>" class="inline-flex items-center text-blue-600 hover:underline mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2" /></svg>
                                Edit
                            </a>
                            <a href="index.php?action=delete_kebun&id=<?= $kebun['id'] ?>" class="inline-flex items-center text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 text-green-700 flex items-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2M9 7a4 4 0 018 0v2" /></svg>
            <div>
                <div class="font-bold mb-1">Integrasi Data Kebun</div>
                <ul class="list-disc ml-5 text-sm">
                    <li>Data pekerja dan panen per kebun akan segera tersedia.</li>
                    <li>Fitur detail pekerja & panen per kebun (coming soon).</li>
                </ul>
            </div>
        </div>
    </div>
</div>
