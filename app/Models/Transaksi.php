<?php
class Transaksi {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'db_palmsysfinance');
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getAll() {
        $result = $this->conn->query('SELECT * FROM transaksi');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getById($id) {
        $stmt = $this->conn->prepare('SELECT * FROM transaksi WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insert($data) {
        $stmt = $this->conn->prepare('INSERT INTO transaksi (tanggal, keterangan, unit, satuan, tipe, jumlah, dibuat_oleh) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssissdi', $data['tanggal'], $data['keterangan'], $data['unit'], $data['satuan'], $data['tipe'], $data['jumlah'], $data['dibuat_oleh']);
        $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare('UPDATE transaksi SET tanggal=?, keterangan=?, tipe=?, jumlah=?, dibuat_oleh=? WHERE id=?');
        $stmt->bind_param('sssidi', $data['tanggal'], $data['keterangan'], $data['tipe'], $data['jumlah'], $data['dibuat_oleh'], $id);
        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare('DELETE FROM transaksi WHERE id=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function getLaporan($start = null, $end = null, $jenis = null, $pembuat = null) {
        $query = "SELECT t.*, t.tipe AS jenis, u.nama_lengkap AS pembuat 
                  FROM transaksi t 
                  LEFT JOIN users u ON t.dibuat_oleh = u.id_users 
                  WHERE 1=1";

        $params = [];
        $types = '';

        if ($start) {
            $query .= " AND t.tanggal >= ?";
            $types .= 's';
            $params[] = $start;
        }
        if ($end) {
            $query .= " AND t.tanggal <= ?";
            $types .= 's';
            $params[] = $end;
        }
        if ($jenis) {
            $query .= " AND t.tipe = ?";
            $types .= 's';
            $params[] = $jenis;
        }
        if ($pembuat) {
            $query .= " AND u.nama_lengkap LIKE ?";
            $types .= 's';
            $params[] = "%$pembuat%";
        }

        $stmt = $this->conn->prepare($query);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
