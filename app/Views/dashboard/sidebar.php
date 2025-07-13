<?php
$user = $_SESSION['user'] ?? [];
$role = $user['role'] ?? '';
$nama = $user['nama_lengkap'] ?? '';
$current = $_GET['action'] ?? 'index';
$menu = [
    'admin' => [
        ['label' => 'Dashboard', 'href' => 'index.php', 'action' => 'index', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2"></path></svg>'],
        ['label' => 'Manajemen Users', 'href' => 'index.php?action=users', 'action' => 'users', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>'],
        ['label' => 'Laporan Keuangan', 'href' => 'index.php?action=laporan_keuangan', 'action' => 'laporan_keuangan', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"></path></svg>'],
        ['label' => 'Transaksi', 'href' => 'index.php?action=transaksi', 'action' => 'transaksi', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>'],
         [
        'label' => 'Log Aktivitas',
        'href' => 'index.php?action=log_aktivitas',
        'action' => 'log_aktivitas',
        'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm4 4h10M7 12h10m-10 4h10" /></svg>'
        ]
    ],
    'staff_keuangan' => [
        ['label' => 'Dashboard', 'href' => 'index.php', 'action' => 'index', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2"></path></svg>'],
        ['label' => 'Input Transaksi', 'href' => 'index.php?action=transaksi', 'action' => 'transaksi', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>'],
        ['label' => 'Laporan Keuangan', 'href' => 'index.php?action=laporan_keuangan', 'action' => 'laporan_keuangan', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"></path></svg>'],
    ],
    
    'manajer' => [
        ['label' => 'Dashboard', 'href' => 'index.php', 'action' => 'index', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5a2 2 0 00-2 2v2"></path></svg>'],
        ['label' => 'Laporan Keuangan', 'href' => 'index.php?action=laporan_keuangan', 'action' => 'laporan_keuangan', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"></path></svg>'],
        ['label' => 'Data Transaksi', 'href' => 'index.php?action=transaksi', 'action' => 'transaksi', 'icon' => '<svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>'],
    ],
];
?>
<!-- Sidebar Modern -->
<aside class="w-64 bg-gradient-to-b from-green-100 via-white to-green-50 min-h-screen flex flex-col shadow-xl font-sans fixed left-0 top-0 z-20">
    <div class="flex flex-col items-center py-8">
        <div class="backdrop-blur-md bg-white/60 rounded-full p-3 mb-2 shadow-lg border border-green-200">
            <img src="https://res.cloudinary.com/dtbgq8wvm/image/upload/v1752323737/logo_fjwali.png" class="w-15 h-auto" alt="">
        </div>
        <div class="text-2xl font-extrabold tracking-wide text-green-700">PalmSys <span class="text-yellow-400">Finance</span> </div>
        <div class="text-xs text-green-400 mt-1">Sistem Keuangan Perkebunan</div>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-4 text-base">
        <?php foreach ($menu[$role] as $item): 
        // Perbaikan logika aktif: jika action di URL sama persis dengan action menu, atau jika action=tidak ada dan menu index
        $isActive = ($current === $item['action']) || ($item['action'] === 'index' && (!isset($_GET['action']) || $_GET['action'] === 'index'));
    ?>
        <a href="<?= $item['href'] ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-sm bg-white/70 transition-all duration-200 text-green-700 font-medium<?php if($isActive) echo ' ring-2 ring-green-400 ring-offset-2 ring-offset-white'; ?> hover:-translate-y-1 hover:shadow-lg">
            <span class="text-xl"> <?= $item['icon'] ?> </span> <span><?= $item['label'] ?></span>
        </a>
        <?php endforeach; ?>
    </nav>
    <div class="px-6 py-8 mt-auto flex flex-col items-center">
    <div class="mb-3">
        <div class="w-14 h-14 rounded-full bg-white/70 flex items-center justify-center text-2xl font-bold border-2 border-green-300 shadow backdrop-blur-md">
            <span class="text-green-700"><?= strtoupper(substr($nama, 0, 1)) ?></span>
        </div>
    </div>
    <div class="mb-2 text-center">
        <span class="block font-semibold text-green-700"><?= htmlspecialchars($nama) ?></span>
        <span class="text-green-400 text-xs capitalize"><?= htmlspecialchars($_SESSION['user_role']) ?></span>
        <span class="text-red-500 text-xs">Online</span>
    </div>
   <a href="index.php?action=logout"
   class="inline-flex items-center gap-2 px-4 py-2 bg-red-100 text-red-700 font-semibold rounded-xl shadow hover:bg-red-200 transition-all duration-200 group">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:rotate-[-90deg] transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
    </svg>
    Logout
</a>
</div>
</aside>