<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Users</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 via-white to-green-50 min-h-screen font-sans">
    <?php include __DIR__.'/../dashboard/sidebar.php'; ?>
    <div class="ml-64 p-8">
        <div class="max-w-4xl mx-auto bg-white/80 rounded-2xl shadow-2xl p-8 border border-green-200">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-extrabold text-green-700 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    Manajemen Users
                </h1>
                <a href="?action=create" class="bg-gradient-to-r from-green-500 to-yellow-400 text-white px-5 py-2 rounded-xl shadow hover:from-green-600 hover:to-yellow-500 font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah User
                </a>
            </div>
            <div class="overflow-x-auto rounded-xl">
                <table class="min-w-full bg-white rounded-xl shadow border border-green-100">
                    <thead>
                        <tr class="bg-green-100 text-green-700">
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Username</th>
                            <th class="py-2 px-4">Nama Lengkap</th>
                            <th class="py-2 px-4">Role</th>
                            <th class="py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr class="border-b hover:bg-green-50">
                            <td class="py-2 px-4 text-center"><?= $user['id_users'] ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($user['username']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($user['nama_lengkap']) ?></td>
                            <td class="py-2 px-4">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    <?php
                                        switch($user['role']) {
                                            case 'admin': echo 'bg-green-500 text-white'; break;
                                            case 'manajer': echo 'bg-yellow-400 text-green-900'; break;
                                            case 'staff_keuangan': echo 'bg-blue-200 text-blue-800'; break;
                                            case 'staff_kebun': echo 'bg-green-200 text-green-800'; break;
                                            default: echo 'bg-gray-200 text-gray-700';
                                        }
                                    ?>">
                                    <?= htmlspecialchars($user['role']) ?>
                                </span>
                            </td>
                            <td class="py-2 px-4 text-center">
                                <a href="?action=edit&id=<?= $user['id_users'] ?>" class="inline-flex items-center text-blue-600 hover:underline mr-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2" />
                                    </svg>
                                    Edit
                                </a>
                                <a href="?action=delete&id=<?= $user['id_users'] ?>" class="inline-flex items-center text-red-500 hover:underline" onclick="return confirm('Yakin hapus?')">
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
</body>
</html>
