<link rel="stylesheet" href="../src/output.css">
<?php include __DIR__.'/../dashboard/sidebar.php'; ?>
<div class="ml-64 p-8">
    <div class="max-w-lg mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
        <h2 class="text-2xl font-extrabold text-green-700 flex items-center gap-2 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"/></svg>
            Tambah Transaksi
        </h2>
        <form method="post" action="index.php?action=store_transaksi" class="space-y-5">
            <div>
                <label class="block mb-1 font-semibold text-green-700">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-green-700">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-green-700">Unit</label>
                <input type="number" name="unit" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-green-700">Satuan</label>
                <select name="satuan" required class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800">
                    <option value="">Pilih Satuan</option>
                    <option value="Kg">Kg</option>
                    <option value="Pcs">Pcs</option>
                    <option value="L">L</option>
                    <option value="Unit">Unit</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-green-700">Tipe</label>
                <select name="tipe" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800" required>
                    <option value="">Pilih Tipe</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-green-700">Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
            </div>
            <div class="h-4"></div>
            <div class="flex justify-end gap-2">
                <button type="submit" 
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Simpan
                </button>

                <a href="index.php?action=transaksi" class="px-6 py-2 rounded-xl bg-gray-200 text-green-700 font-semibold hover:bg-gray-300 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
