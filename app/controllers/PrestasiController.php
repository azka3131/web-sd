<?php
require_once __DIR__ . '/../models/Prestasi.php';

class PrestasiController {
    public function index() {
        $model = new Prestasi();

        // 1. Ambil Filter dari URL
        $keyword = isset($_GET['q']) ? $_GET['q'] : null;
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;
        $tingkat = isset($_GET['tingkat']) ? $_GET['tingkat'] : null;

        // 2. Ambil data hasil pencarian
        $data = $model->getPrestasiPublic($keyword, $tahun, $tingkat);

        // 3. Ambil data untuk isi Dropdown Filter
        $listTahun = $model->getYears();
        $listTingkat = $model->getTingkatList(); // Ganti kategori dengan Tingkat

        // 4. Load View Public (Grid)
        // Pastikan path ini sesuai dengan lokasi file view Anda
        require_once __DIR__ . '/../views/prestasi.php';
    }
}