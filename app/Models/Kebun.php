<?php
class Kebun {
    private $conn;
    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'db_palmsysfinance');
    }
    public function getAll() {
        $result = $this->conn->query('SELECT * FROM kebun');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
    public function getById($id) {
        $stmt = $this->conn->prepare('SELECT * FROM kebun WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function insert($data) {
        $stmt = $this->conn->prepare('INSERT INTO kebun (nama, lokasi, luas, jenis_bibit) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssis', $data['nama'], $data['lokasi'], $data['luas'], $data['jenis_bibit']);
        $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->conn->prepare('UPDATE kebun SET nama=?, lokasi=?, luas=?, jenis_bibit=? WHERE id=?');
        $stmt->bind_param('ssisi', $data['nama'], $data['lokasi'], $data['luas'], $data['jenis_bibit'], $id);
        $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare('DELETE FROM kebun WHERE id=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
