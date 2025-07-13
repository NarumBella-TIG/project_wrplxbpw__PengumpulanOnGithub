<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kebun</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 via-white to-green-50 min-h-screen font-sans">
    <?php include __DIR__.'/../dashboard/sidebar.php'; ?>
    <div class="ml-64 p-8">
        <div class="max-w-lg mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
            <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22c4.418 0 8-4.03 8-9 0-3.866-3.134-7-7-7S4 9.134 4 13c0 4.97 3.582 9 8 9z"/></svg>
                Tambah Kebun
            </h1>
            <form method="post" action="index.php?action=store_kebun" class="space-y-5">
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Nama Kebun</label>
                    <input type="text" name="nama" placeholder="Nama Kebun" required class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Lokasi" required class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Luas (Ha)</label>
                    <input type="number" name="luas" step="0.01" placeholder="Luas (Ha)" required class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Jenis Bibit</label>
                    <input type="text" name="jenis_bibit" placeholder="Jenis Bibit" required class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400">
                </div>
                <div class="mt-6 flex justify-end gap-2">
                    <button type="submit" class="bg-gradient-to-r from-green-500 to-yellow-400 text-white font-semibold px-6 py-2 rounded-xl shadow hover:from-green-600 hover:to-yellow-500 transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Simpan
                    </button>
                    <a href="index.php?action=kebun" class="px-6 py-2 rounded-xl bg-gray-200 text-green-700 font-semibold hover:bg-gray-300 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
