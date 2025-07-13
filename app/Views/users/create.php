<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 via-white to-green-50 min-h-screen font-sans">
    <?php include __DIR__.'/../dashboard/sidebar.php'; ?>
    <div class="ml-64 p-8">
        <div class="max-w-lg mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
            <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                Tambah User
            </h1>
            <form action="?action=store" method="post" class="space-y-5">
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Username</label>
                    <input type="text" name="username" placeholder="Username" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Password</label>
                    <input type="password" name="password" placeholder="Password" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-green-700">Role</label>
                    <select name="role" class="w-full border border-green-200 focus:border-green-500 px-4 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800" required>
                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="manajer">Manajer</option>
                        <!-- <option value="staff_kebun">Staff Kebun</option> -->
                        <option value="staff_keuangan">Staff Keuangan</option>
                    </select>
                </div>
                <div class="h-4"></div>
                <div class="flex justify-end gap-2">
                    <button type="submit" class="bg-gradient-to-r from-green-500 to-yellow-400 text-white font-semibold px-6 py-2 rounded-xl shadow hover:from-green-600 hover:to-yellow-500 transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Simpan
                    </button>
                    <a href="index.php?action=users" class="px-6 py-2 rounded-xl bg-gray-200 text-green-700 font-semibold hover:bg-gray-300 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
