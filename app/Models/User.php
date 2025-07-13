<?php
// app/Models/User.php
namespace app\Models;

class User {
    private static function connect() {
        $conn = new \mysqli('localhost', 'root', '', 'db_palmsysfinance');
        if ($conn->connect_error) die('Koneksi gagal: ' . $conn->connect_error);
        return $conn;
    }
    public static function all() {
        $conn = self::connect();
        $result = $conn->query('SELECT * FROM users');
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        $conn->close();
        return $data;
    }
    public static function find($id) {
        $conn = self::connect();
        $stmt = $conn->prepare('SELECT * FROM users WHERE id_users=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $user;
    }
    public static function create($data) {
        $conn = self::connect();
        $stmt = $conn->prepare('INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)');
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('ssss', $data['username'], $hashedPassword, $data['nama_lengkap'], $data['role']);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    public static function update($id, $data) {
    $conn = self::connect();

    // 1. Cek apakah username sudah digunakan oleh user lain
    $cek = $conn->prepare("SELECT id_users FROM users WHERE username = ? AND id_users != ?");
    $cek->bind_param("si", $data['username'], $id);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        throw new \Exception("Username sudah digunakan oleh user lain.");
    }

    // 2. Cek apakah password diisi
    if (!empty($data['password'])) {
        $hashed = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE users SET username=?, password=?, nama_lengkap=?, role=? WHERE id_users=?');
        $stmt->bind_param('ssssi', $data['username'], $hashed, $data['nama_lengkap'], $data['role'], $id);
    } else {
        $stmt = $conn->prepare('UPDATE users SET username=?, nama_lengkap=?, role=? WHERE id_users=?');
        $stmt->bind_param('sssi', $data['username'], $data['nama_lengkap'], $data['role'], $id);
    }

    $stmt->execute();
    $stmt->close();
    $conn->close();
}

    public static function delete($id) {
        $conn = self::connect();
        $stmt = $conn->prepare('DELETE FROM users WHERE id_users=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    public static function findByUsername($username) {
        $conn = self::connect();
        $stmt = $conn->prepare('SELECT * FROM users WHERE username=?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $user;
    }
}
