<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Keuangan Perkebunan Kelapa Sawit</title>
    <link href="/project_wrplxbpw/src/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 via-white to-green-50 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white/70 backdrop-blur-md shadow-2xl rounded-2xl p-8 max-w-md w-full border border-green-200">
        <div class="flex flex-col items-center mb-6">
        
            <img src="/project_wrplxbpw/asset/logo.png" class="w-10 h-10 object-contain">
            <h1 class="text-2xl font-extrabold tracking-wide text-green-700 mb-1 text-center">PalmSys <span class="text-yellow-400">Finance</span></h1>
            <div class="text-xs text-green-400 mt-1 mb-2">Sistem Keuangan Perkebunan</div>
        </div>
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center border border-red-300">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <form action="index.php?action=login" method="post" class="space-y-4">
            <div class="relative">
                <span class="absolute left-3 top-2.5 text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </span>
                <input type="text" name="username" placeholder="Username" class="w-full border border-green-200 focus:border-green-500 px-10 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required autofocus>
            </div>
            <div class="relative">
                <span class="absolute left-3 top-2.5 text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 0v2m0 4h.01" /></svg>
                </span>
                <input type="password" name="password" placeholder="Password" class="w-full border border-green-200 focus:border-green-500 px-10 py-2 rounded-xl focus:outline-none bg-white/80 text-green-800 placeholder-green-400" required>
            </div>
            <button 
                type="submit"
                class="w-full bg-green-500 text-white font-semibold px-4 py-2 rounded-xl shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg cursor-pointer">
                Login
            </button>
        </form>
        <div class="mt-6 text-center text-xs text-green-400">&copy; 2025 PalmSys Finance</div>
    </div>
</body>
</html>
