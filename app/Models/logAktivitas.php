<?php
class logAktivitas {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_palmsysfinance");
    }

    public function getAllLog() {
   $query = "SELECT log_aktivitas.*, users.nama_lengkap AS nama_user
          FROM log_aktivitas
          LEFT JOIN users ON log_aktivitas.id_user = users.id_users
          ORDER BY log_aktivitas.waktu DESC";
$result = $this->conn->query($query);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

}
