<?php
// app/Controllers/AuthController.php
namespace app\Controllers;
require_once __DIR__ . '/../Helpers/functions.php';

require_once __DIR__ . '/../Models/User.php';
use app\Models\User;

class AuthController {
    public function loginForm() {
        include __DIR__ . '/../Views/auth/login.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                // Simpan ke session
                $_SESSION['user'] = $user;
                $_SESSION['user_role'] = $user['role']; // PENTING: buat pengecekan role
                tulisLog($user['id_users'], "Login ke sistem");
                header("Location: index.php");
                exit;
            } else {
                $error = "Username atau password salah";
                include __DIR__ . '/../Views/auth/login.php';
            }
        }
    
    }
    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
    }
}
