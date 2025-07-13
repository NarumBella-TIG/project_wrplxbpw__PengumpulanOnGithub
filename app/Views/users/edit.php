<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <?php include __DIR__.'/../dashboard/sidebar.php'; ?>

    <div class="ml-64 px-6 py-10">
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-xl p-8">
            <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">Edit Data Pengguna</h1>
            
            <form action="?action=update_user" method="post" class="space-y-5">
                <input type="hidden" name="id" value="<?= $user['id_users'] ?>">

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="<?= $user['username'] ?>" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Role</label>
                    <select name="role" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
                        <option value="manajer" <?= $user['role']=='manajer'?'selected':'' ?>>Manajer</option>
                        <option value="staff_kebun" <?= $user['role']=='staff_kebun'?'selected':'' ?>>Staff Kebun</option>
                        <option value="staff_keuangan" <?= $user['role']=='staff_keuangan'?'selected':'' ?>>Staff Keuangan</option>
                    </select>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg transition-all duration-300 shadow-sm">
                        Simpan Perubahan
                    </button>

                    <a href="index.php?action=users"
                        class="inline-flex items-center text-red-500 hover:text-red-600 hover:underline transition duration-200">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                             d="M6 18L18 6M6 6l12 12" /></svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
