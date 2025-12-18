<?php

require_once __DIR__ . '/../../config/database.php';

class ProfilSekolah {

    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getProfile() {
        // Mengambil satu baris data profil (asumsi ID 1 adalah data sekolah utama)
        $stmt = $this->db->query("SELECT * FROM profil_sekolah LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Fungsi update (diperlukan untuk Admin nanti)
    public function updateVisiMisi($visi, $misi) {
        // Cek dulu apakah data sudah ada
        $check = $this->db->query("SELECT id FROM profil_sekolah LIMIT 1");
        
        if ($check->rowCount() > 0) {
            // Jika ada, lakukan UPDATE
            $stmt = $this->db->prepare("UPDATE profil_sekolah SET visi = ?, misi = ? WHERE id = 1"); // Asumsi ID selalu 1
             return $stmt->execute([$visi, $misi]);
        } else {
            // Jika kosong, lakukan INSERT
            $stmt = $this->db->prepare("INSERT INTO profil_sekolah (visi, misi) VALUES (?, ?)");
            return $stmt->execute([$visi, $misi]);
        }
    }
    public function updateSejarah($sejarah) {
        $check = $this->db->query("SELECT id FROM profil_sekolah LIMIT 1");
        
        if ($check->rowCount() > 0) {
            // Update hanya kolom sejarah
            $stmt = $this->db->prepare("UPDATE profil_sekolah SET sejarah = ? WHERE id = 1");
             return $stmt->execute([$sejarah]);
        } else {
            // Insert baru jika belum ada data sama sekali
            $stmt = $this->db->prepare("INSERT INTO profil_sekolah (sejarah) VALUES (?)");
            return $stmt->execute([$sejarah]);
        }
    }
}