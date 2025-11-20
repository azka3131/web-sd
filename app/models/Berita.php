<?php

require_once __DIR__ . '/../../config/database.php';

class Berita {

    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM berita ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM berita WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
