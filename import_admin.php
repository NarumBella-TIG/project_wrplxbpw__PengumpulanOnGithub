<?php
// import_admin.php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_palmsysfinance';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die('Koneksi gagal: ' . $conn->connect_error);

$username = 'Admin1';
$password = password_hash('Narum123', PASSWORD_DEFAULT);
$nama_lengkap = 'M. Narum Bella';
$role = 'admin';

$stmt = $conn->prepare('INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $username, $password, $nama_lengkap, $role);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    echo 'User admin berhasil ditambahkan!';
} else {
    echo 'Gagal menambah user admin.';
}
$stmt->close();
$conn->close();
