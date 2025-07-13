<!-- Sidebar Modern -->
<aside class="w-64 bg-gradient-to-b from-green-100 via-white to-green-50 min-h-screen flex flex-col shadow-xl font-sans">
    <div class="flex flex-col items-center py-8">
        <div class="backdrop-blur-md bg-white/60 rounded-full p-3 mb-2 shadow-lg border border-green-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-.896 2-2 2-2-.896-2-2zm0 0V7m0 4v4m0 0c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" /></svg>
        </div>
        <div class="text-2xl font-extrabold tracking-wide text-green-700">PalmSys <span class="text-yellow-400">Finance</span> </div>
        <div class="text-xs text-green-400 mt-1">Sistem Keuangan Perkebunan</div>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-4 text-base">
        <a href="../admin/index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-sm bg-white/70 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 text-green-700 font-medium <?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'ring-2 ring-green-400' : '' ?>">
            <span class="text-xl">
                <!-- Dashboard Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6" /></svg>
            </span> <span>Dashboard</span>
        </a>
        <a href="../admin/users/index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-sm bg-white/70 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 text-green-700 font-medium">
            <span class="text-xl">
                <!-- User Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            </span> <span>Manajemen User</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-sm bg-white/70 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 text-green-700 font-medium">
            <span class="text-xl">
                <!-- Panen Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3 0 1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3zm0 0V4m0 4v4m0 0c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" /></svg>
            </span> <span>Data Panen</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-sm bg-white/70 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 text-green-700 font-medium">
            <span class="text-xl">
                <!-- Transaksi Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a5 5 0 00-10 0v2a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 00-2-2z" /></svg>
            </span> <span>Transaksi</span>
        </a>
    </nav>
    <div class="px-6 py-8 mt-auto flex flex-col items-center">
        <div class="mb-3">
            <div class="w-14 h-14 rounded-full bg-white/70 flex items-center justify-center text-2xl font-bold border-2 border-green-300 shadow backdrop-blur-md">
                <span class="text-green-700"><?= strtoupper(substr($_SESSION['nama'],0,1)) ?></span>
            </div>
        </div>
        <div class="mb-2 text-center">
            <span class="block font-semibold text-green-700"><?= $_SESSION['nama'] ?></span>
            <span class="text-green-400 text-xs">Online</span>
        </div>
        <a href="../../../logout.php" class="text-red-400 hover:underline mt-2">Logout</a>
    </div>
</aside>

<!-- Main Content -->
<main class="flex-1 p-6">
