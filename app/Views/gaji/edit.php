<div class="p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4 text-green-700">Edit Data Gaji</h2>
    <form method="post" action="index.php?action=update_gaji" class="space-y-4 bg-white p-6 rounded shadow">
        <input type="hidden" name="id" value="<?= $gaji['id'] ?>">
        <div>
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="<?= htmlspecialchars($gaji['nama']) ?>" required>
        </div>
        <div>
            <label class="block mb-1 font-medium">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border rounded px-3 py-2" value="<?= htmlspecialchars($gaji['jabatan']) ?>" required>
        </div>
        <div>
            <label class="block mb-1 font-medium">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="w-full border rounded px-3 py-2" value="<?= $gaji['jumlah'] ?>" required>
        </div>
        <div>
            <label class="block mb-1 font-medium">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" value="<?= $gaji['tanggal'] ?>" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
            <a href="index.php?action=data_gaji" class="ml-2 px-4 py-2 rounded border border-green-400 text-green-700 hover:bg-green-50">Batal</a>
        </div>
    </form>
</div>
