<?php
class Gaji {
    private $db;
    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'db_palmsysfinance');
    }
    public function getAll() {
        $result = $this->db->query('SELECT * FROM gaji');
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM gaji WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function insert($data) {
        $stmt = $this->db->prepare('INSERT INTO gaji (nama, jabatan, jumlah, tanggal) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssis', $data['nama'], $data['jabatan'], $data['jumlah'], $data['tanggal']);
        $stmt->execute();
    }
    public function update($data) {
        $stmt = $this->db->prepare('UPDATE gaji SET nama=?, jabatan=?, jumlah=?, tanggal=? WHERE id=?');
        $stmt->bind_param('ssisi', $data['nama'], $data['jabatan'], $data['jumlah'], $data['tanggal'], $data['id']);
        $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM gaji WHERE id=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
