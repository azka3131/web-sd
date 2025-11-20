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
}
