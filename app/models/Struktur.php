<?php

require_once __DIR__ . '/../../config/database.php';

class Struktur {

    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        // Diurutkan berdasarkan kolom 'urutan' agar hierarki rapi (Kepsek paling atas)
        $query = $this->db->query("SELECT * FROM struktur ORDER BY urutan ASC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM struktur WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO struktur (nama, jabatan, foto, urutan) VALUES (:nama, :jabatan, :foto, :urutan)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $query = "UPDATE struktur SET nama = :nama, jabatan = :jabatan, foto = :foto, urutan = :urutan WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM struktur WHERE id = ?");
        return $stmt->execute([$id]);
    }
}