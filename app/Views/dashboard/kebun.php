<?php include __DIR__.'/../users/../dashboard/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kebun</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="ml-64">
    <div class="max-w-4xl mx-auto mt-16 bg-white/90 rounded-xl shadow-2xl p-8 border border-green-300">
        <h1 class="text-2xl font-bold text-green-800 mb-2 flex items-center">
            <svg class="w-7 h-7 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 22c4.418 0 8-4.03 8-9 0-3.866-3.134-7-7-7S4 9.134 4 13c0 4.97 3.582 9 8 9z"/></svg>
            Data Kebun
        </h1>
        <p class="mb-6 text-green-700">Informasi dan manajemen data kebun kelapa sawit.</p>
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
            <h2 class="text-lg font-semibold text-green-700 mb-2">Fitur Utama</h2>
            <ul class="list-disc pl-6 text-green-900 space-y-1">
                <li>Lihat daftar kebun beserta lokasi, luas, dan jenis bibit</li>
                <li>Tambah, edit, dan hapus data kebun</li>
                <li>Integrasi dengan data pekerja dan panen</li>
                <li>Statistik dan grafik perkembangan kebun (coming soon)</li>
            </ul>
        </div>
        <div class="flex justify-end">
            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Tambah Kebun
            </a>
        </div>
        <div class="mt-8">
            <div class="text-gray-500 italic">Tabel data kebun dan fitur CRUD akan tampil di sini (coming soon).</div>
        </div>
    </div>
</div>
</body>
</html>
