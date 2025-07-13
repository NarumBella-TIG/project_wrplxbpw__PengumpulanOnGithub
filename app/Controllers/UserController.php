<?php
// app/Controllers/UserController.php
namespace app\Controllers;

require_once __DIR__ . '/../Models/User.php';

use app\Models\User;

class UserController {
    public function index() {
        $users = User::all();
        include __DIR__ . '/../Views/users/index.php';
    }
    public function create() {
        include __DIR__ . '/../Views/users/create.php';
    }
    public function store() {
        User::create($_POST);
        header('Location: index.php?action=users');
    }
    public function edit() {
        $user = User::find($_GET['id']);
        include __DIR__ . '/../Views/users/edit.php';
    }
    public function update() {
         try {
        User::update($_POST['id'], $_POST);
        header('Location: index.php?action=users');
    } catch (\Exception $e) {
        // Kembalikan ke form edit dengan pesan error
        $error = $e->getMessage();
        $user = User::find($_POST['id']);
        include __DIR__ . '/../Views/users/edit.php';
    }
    }
    public function delete() {
        User::delete($_GET['id']);
        header('Location: index.php?action=users');
    }
}
