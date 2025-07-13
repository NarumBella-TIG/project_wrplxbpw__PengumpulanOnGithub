<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staff Kebun</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-green-200 via-yellow-100 to-yellow-300 min-h-screen">
    <?php include __DIR__.'/sidebar.php'; ?>
    <div class="ml-64">
        <div class="max-w-3xl mx-auto mt-16 bg-white/90 rounded-xl shadow-2xl p-8 border border-yellow-400">
            <h1 class="text-2xl font-bold text-green-800 mb-2">Dashboard Staff Kebun</h1>
            <p class="mb-6 text-yellow-700">Selamat datang, <span class="font-semibold text-green-700"><?= $_SESSION['user']['nama_lengkap'] ?></span>!</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="#" class="block bg-green-400 hover:bg-green-500 text-white rounded-lg p-6 text-center font-semibold shadow">Data Kebun</a>
                <a href="#" class="block bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg p-6 text-center font-semibold shadow">Laporan Panen</a>
                <a href="index.php?action=logout" class="block bg-red-400 hover:bg-red-500 text-white rounded-lg p-6 text-center font-semibold shadow">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
