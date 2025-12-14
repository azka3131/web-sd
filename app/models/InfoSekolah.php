<?php

require_once __DIR__ . '/../../config/database.php';

class InfoSekolah {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getInfo() {
        // Ambil data baris pertama (id=1)
        $query = $this->db->query("SELECT * FROM info_sekolah WHERE id = 1");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateInfo($data) {
        $query = "UPDATE info_sekolah SET 
                  jumlah_siswa = :siswa, 
                  jumlah_guru = :guru, 
                  jumlah_rombel = :rombel, 
                  jumlah_prestasi = :prestasi 
                  WHERE id = 1";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'siswa' => $data['siswa'],
            'guru' => $data['guru'],
            'rombel' => $data['rombel'],
            'prestasi' => $data['prestasi']
        ]);
    }
}