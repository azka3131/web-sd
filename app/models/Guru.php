<?php

require_once __DIR__ . '/../../config/database.php';

class Guru {

    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM guru ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM guru WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- FUNGSI INI YANG SEBELUMNYA HILANG ---
    public function getKepalaSekolah() {
        // Cari guru yang jabatannya mengandung kata "Kepala Sekolah"
        $query = "SELECT * FROM guru WHERE jabatan LIKE '%Kepala Sekolah%' LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi Create, Update, Delete (Simpan yang sudah ada sebelumnya)
    public function create($data) {
        $query = "INSERT INTO guru (nama, jabatan, pendidikan, foto, bio) VALUES (:nama, :jabatan, :pendidikan, :foto, :bio)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':jabatan', $data['jabatan']);
        $stmt->bindValue(':pendidikan', $data['pendidikan']);
        $stmt->bindValue(':foto', $data['foto']);
        $stmt->bindValue(':bio', $data['bio']);
        return $stmt->execute();
    }

    public function update($data) {
        $query = "UPDATE guru SET nama=:nama, jabatan=:jabatan, pendidikan=:pendidikan, foto=:foto, bio=:bio WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':jabatan', $data['jabatan']);
        $stmt->bindValue(':pendidikan', $data['pendidikan']);
        $stmt->bindValue(':foto', $data['foto']);
        $stmt->bindValue(':bio', $data['bio']);
        $stmt->bindValue(':id', $data['id']);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM guru WHERE id = ?");
        return $stmt->execute([$id]);
    }
}