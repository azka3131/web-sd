<?php

require_once __DIR__ . '/../../config/database.php';

class Pengunjung {

    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // Ambil angka total saat ini
    public function getTotal() {
        $stmt = $this->db->query("SELECT total FROM pengunjung WHERE id = 1");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Tambah angka +1
    public function tambah() {
        $this->db->query("UPDATE pengunjung SET total = total + 1 WHERE id = 1");
    }
}