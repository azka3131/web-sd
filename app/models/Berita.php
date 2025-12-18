<?php

require_once __DIR__ . '/../../config/database.php';

class Berita {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // 1. UNTUK ADMIN: Ambil SEMUA berita (Baik yang tayang maupun arsip)
    public function getAll() {
        $query = $this->db->query("SELECT * FROM berita ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. UNTUK PUBLIK: Hanya ambil berita yang statusnya 'published'
    public function getAllPublished() {
        // Asumsi kolom status ada di DB. Jika error, pastikan sudah ALTER TABLE.
        $query = $this->db->query("SELECT * FROM berita WHERE status = 'published' ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM berita WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. UNTUK ADMIN: Fungsi Ubah Status (Arsip/Terbitkan)
    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE berita SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function create($data) {
        $query = "INSERT INTO berita (judul, slug, isi, gambar, tanggal, status) 
                  VALUES (:judul, :slug, :isi, :gambar, :tanggal, :status)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':judul', $data['judul']);
        $stmt->bindValue(':slug', $data['slug']);
        $stmt->bindValue(':isi', $data['isi']);
        $stmt->bindValue(':gambar', $data['gambar']);
        $stmt->bindValue(':tanggal', $data['tanggal']);
        $stmt->bindValue(':status', $data['status']);
        
        return $stmt->execute();
    }

    public function update($data) {
        $query = "UPDATE berita SET judul=:judul, slug=:slug, isi=:isi, tanggal=:tanggal, gambar=:gambar WHERE id=:id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':judul', $data['judul']);
        $stmt->bindValue(':slug', $data['slug']);
        $stmt->bindValue(':isi', $data['isi']);
        $stmt->bindValue(':tanggal', $data['tanggal']);
        $stmt->bindValue(':gambar', $data['gambar']);
        $stmt->bindValue(':id', $data['id']);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM berita WHERE id = ?");
        return $stmt->execute([$id]);
    }
}