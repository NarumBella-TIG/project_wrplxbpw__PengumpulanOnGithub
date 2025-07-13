<link rel="stylesheet" href="/project_wrplxbpw/src/output.css">

<div class="ml-[270px] bg-white shadow rounded-xl p-6 mt-8 max-w-5xl">
    <a href="index.php"
   class="inline-flex items-center px-4 py-2 mb-4 text-sm font-medium text-green-700 bg-green-100 border border-green-300 rounded-lg 
          hover:bg-green-200 hover:text-green-800 hover:-translate-y-1 transition transform duration-300 ease-in-out shadow-sm">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali ke Dashboard
</a>


    <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center gap-2">
       
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h3m1 0h-4a4 4 0 00-4 4v2m-4 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
        </svg>
        Log Aktivitas Pengguna
    </h2>

    <div class="ml-30 rounded-lg border border-gray-200 shadow-sm">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-green-100 text-green-800 font-semibold">
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left">User</th>
                    <th class="px-4 py-2 text-left">Aktivitas</th>
                    <th class="px-4 py-2 text-left">Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logAktivitas as $i => $log): ?>
                    <tr class="border-t hover:bg-green-50 transition-all">
                        <td class="px-4 py-2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <?= $i + 1 ?>
                            </div>
                        </td>
                        <td class="px-4 py-2 font-medium"><?= htmlspecialchars($log['nama_user'] ?? 'Tidak diketahui') ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($log['aktivitas']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-500"><?= date('d-m-Y H:i:s', strtotime($log['waktu'])) ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($logAktivitas)): ?>
                    <tr>
                        <td colspan="4" class="text-center text-gray-400 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9.75L14.25 14.25M14.25 9.75L9.75 14.25M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                            </svg>
                            Tidak ada log aktivitas.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

