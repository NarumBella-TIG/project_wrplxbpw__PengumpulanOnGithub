<?php
// public/index.php
session_start();

require_once '../app/Controllers/UserController.php';
require_once '../app/Controllers/AuthController.php';
require_once '../app/Controllers/DashboardController.php';
// require_once '../app/Controllers/GajiController.php';
// require_once '../app/Controllers/KebunController.php';
require_once '../app/Controllers/TransaksiController.php';
require_once '../app/Controllers/logController.php';

use app\Controllers\UserController;
use app\Controllers\AuthController;
use app\Controllers\DashboardController;

$action = $_GET['action'] ?? 'index';

if (!isset($_SESSION['user']) && !in_array($action, ['login', 'loginForm'])) {
    $auth = new AuthController();
    $auth->loginForm();
    exit;
}

if (isset($_SESSION['user']) && $action === 'index') {
    $dashboard = new DashboardController();
    $dashboard->index();
    exit;
}

switch ($action) {
    case 'login':
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login();
        } else {
            $auth->loginForm();
        }
        break;
    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;
    case 'users':
        $controller = new UserController();
        $controller->index();
        break;
    case 'create':
    case 'store':
    case 'edit':
    case 'update':
    case 'delete':
        $controller = new UserController();
        switch ($action) {
            case 'create':
                $controller->create();
                break;
            case 'store':
                $controller->store();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'delete':
                $controller->delete();
                break;
        }
        break;
    // case 'laporan_keuangan':
    //     include __DIR__ . '/../app/Views/dashboard/laporan_keuangan.php';
    //     break;
    case 'laporan_keuangan':
    $controller = new TransaksiController();
    $controller->laporan_keuangan();
    break;
    case 'data_kebun':
        // Dihapus, diganti ke 'kebun' saja
        header('Location: index.php?action=kebun');
        break;
    case 'laporan_panen':
        echo '<div class="ml-64 p-8"><h1 class="text-2xl font-bold mb-4">Laporan Panen (Coming Soon)</h1></div>';
        break;
    // case 'data_gaji':
    //     require_once '../app/Controllers/GajiController.php';
    //     $controller = new GajiController();
    //     $controller->index();
    //     break;
    case 'index':
        include __DIR__ . '/../app/Views/dashboard/dashboard_main.php';
        break;
    // case 'kebun':
    //     $controller = new KebunController();
    //     $controller->index();
    //     break;
    // case 'create_kebun':
    //     $controller = new KebunController();
    //     $controller->create();
    //     break;
    // case 'store_kebun':
    //     $controller = new KebunController();
    //     $controller->store();
    //     break;
    // case 'edit_kebun':
    //     $controller = new KebunController();
    //     $controller->edit();
    //     break;
    // case 'update_kebun':
    //     $controller = new KebunController();
    //     $controller->update();
    //     break;
    // case 'delete_kebun':
    //     $controller = new KebunController();
    //     $controller->delete();
    //     break;
    // case 'create_gaji':
    //     require_once '../app/Controllers/GajiController.php';
    //     $controller = new GajiController();
    //     $controller->create();
    //     break;
    // case 'store_gaji':
    //     require_once '../app/Controllers/GajiController.php';
    //     $controller = new GajiController();
    //     $controller->store();
    //     break;
    // case 'edit_gaji':
    //     require_once '../app/Controllers/GajiController.php';
    //     $controller = new GajiController();
    //     $controller->edit();
    //     break;
    // case 'update_gaji':
    //     require_once '../app/Controllers/GajiController.php';
    //     $controller = new GajiController();
    //     $controller->update();
    //     break;
    // case 'delete_gaji':
    //     require_once '../app/Controllers/GajiController.php';
    //     $controller = new GajiController();
    //     $controller->delete();
    //     break;
    case 'transaksi':
        require_once '../app/Controllers/TransaksiController.php';
        $controller = new TransaksiController();
        $controller->index();
        break;
    case 'create_transaksi':
        require_once '../app/Controllers/TransaksiController.php';
        $controller = new TransaksiController();
        $controller->create();
        break;
    case 'store_transaksi':
        require_once '../app/Controllers/TransaksiController.php';
        $controller = new TransaksiController();
        $controller->store();
        break;
    case 'edit_transaksi':
        require_once '../app/Controllers/TransaksiController.php';
        $controller = new TransaksiController();
        $controller->edit();
        break;
    case 'update_transaksi':
        require_once '../app/Controllers/TransaksiController.php';
        $controller = new TransaksiController();
        $controller->update();
        break;
    case 'delete_transaksi':
        require_once '../app/Controllers/TransaksiController.php';
        $controller = new TransaksiController();
        $controller->delete();
        break;
    case 'log_aktivitas':
        $controller = new logController();
        $controller->log_aktivitas();
    break;
    case 'edit_user':
        $controller = new app\Controllers\UserController();
        $controller->edit();
    break;
    case 'update_user':
    $controller = new UserController();
    $controller->update();
    break;
    default:
        $dashboard = new DashboardController();
        $dashboard->index();
        break;
}
