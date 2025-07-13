<?php
// app/Controllers/DashboardController.php
namespace app\Controllers;

class DashboardController {
    public function index() {
        // session_start();
        $user = $_SESSION['user'] ?? null;
        if (!$user) {
            header('Location: index.php?action=login');
            exit;
        }
        $role = $user['role'];
        switch ($role) {
            case 'admin':
                include __DIR__ . '/../Views/dashboard/admin.php';
                break;
            case 'manajer':
                include __DIR__ . '/../Views/dashboard/manajer.php';
                break;
            case 'staff_kebun':
                include __DIR__ . '/../Views/dashboard/staff_kebun.php';
                break;
            case 'staff_keuangan':
                include __DIR__ . '/../Views/dashboard/staff_keuangan.php';
                break;
            default:
                echo 'Role tidak dikenali.';
        }
    }
}
