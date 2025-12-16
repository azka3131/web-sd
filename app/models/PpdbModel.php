<?php
require_once __DIR__ . '/../../config/database.php';

class PpdbModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function get() {
        // Ambil data pertama saja (karena hanya butuh 1 brosur)
        $query = $this->db->query("SELECT * FROM ppdb LIMIT 1");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBrosur($file) {
        // Update baris pertama
        $stmt = $this->db->prepare("UPDATE ppdb SET file_brosur = ?, updated_at = NOW() WHERE id = 1");
        return $stmt->execute([$file]);
    }
}