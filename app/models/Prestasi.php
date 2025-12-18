<?php
require_once __DIR__ . '/../../config/database.php';

class Prestasi {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // --- BAGIAN KHUSUS ADMIN (CRUD) ---
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

    // --- [BARU] BAGIAN KHUSUS PUBLIC (SEARCH & FILTER) ---
    
    public function getPrestasiPublic($keyword = null, $tahun = null, $tingkat = null) {
        $sql = "SELECT * FROM prestasi WHERE 1=1";
        $params = [];

        // 1. Cari berdasarkan Judul atau Nama Siswa
        if (!empty($keyword)) {
            $sql .= " AND (judul LIKE ? OR nama_siswa LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        // 2. Filter berdasarkan Tahun
        if (!empty($tahun)) {
            $sql .= " AND YEAR(tanggal) = ?";
            $params[] = $tahun;
        }

        // 3. Filter berdasarkan Tingkat (Kecamatan, Kabupaten, dll)
        if (!empty($tingkat)) {
            $sql .= " AND tingkat = ?";
            $params[] = $tingkat;
        }

        $sql .= " ORDER BY tanggal DESC"; // Urutkan dari yang terbaru

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil daftar tahun unik untuk dropdown
    public function getYears() {
        $stmt = $this->db->query("SELECT DISTINCT YEAR(tanggal) as tahun FROM prestasi ORDER BY tahun DESC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Ambil daftar tingkat unik untuk dropdown
    public function getTingkatList() {
        $stmt = $this->db->query("SELECT DISTINCT tingkat FROM prestasi ORDER BY tingkat ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}