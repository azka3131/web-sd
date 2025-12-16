<?php
require_once __DIR__ . '/../../config/database.php';

class Prestasi {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM prestasi ORDER BY tanggal DESC, id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM prestasi WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO prestasi (judul, nama_siswa, jenis_juara, tingkat, tanggal, deskripsi, foto) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['judul'], $data['nama_siswa'], $data['jenis_juara'], 
            $data['tingkat'], $data['tanggal'], $data['deskripsi'], $data['foto']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE prestasi SET judul=?, nama_siswa=?, jenis_juara=?, tingkat=?, tanggal=?, deskripsi=?, foto=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['judul'], $data['nama_siswa'], $data['jenis_juara'], 
            $data['tingkat'], $data['tanggal'], $data['deskripsi'], $data['foto'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM prestasi WHERE id = ?");
        return $stmt->execute([$id]);
    }
}