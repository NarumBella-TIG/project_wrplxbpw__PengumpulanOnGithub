<link rel="stylesheet" href="../src/output.css">
<?php include __DIR__.'/../dashboard/sidebar.php'; ?>
<div class="ml-64 p-8 max-w-xl">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Edit Data Kebun</h1>
    <form method="post" action="index.php?action=update_kebun" class="space-y-4 bg-white p-6 rounded shadow">
        <input type="hidden" name="id" value="<?= htmlspecialchars($kebun['id']) ?>">
        <div>
            <label class="block mb-1 font-semibold">Nama Kebun</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($kebun['nama']) ?>" required class="w-full border border-green-300 rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Lokasi</label>
            <input type="text" name="lokasi" value="<?= htmlspecialchars($kebun['lokasi']) ?>" required class="w-full border border-green-300 rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Luas (Ha)</label>
            <input type="number" name="luas" step="0.01" value="<?= htmlspecialchars($kebun['luas']) ?>" required class="w-full border border-green-300 rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Jenis Bibit</label>
            <input type="text" name="jenis_bibit" value="<?= htmlspecialchars($kebun['jenis_bibit']) ?>" required class="w-full border border-green-300 rounded px-3 py-2">
        </div>
        <div class="flex justify-end gap-2">
            <a href="index.php?action=kebun" class="px-4 py-2 rounded bg-gray-200 text-green-700">Batal</a>
            <button type="submit" class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600">Update</button>
        </div>
    </form>
</div>
