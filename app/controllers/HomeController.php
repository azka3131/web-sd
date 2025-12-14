<?php

// Panggil semua model yang dibutuhkan
require_once __DIR__ . '/../models/Guru.php';
require_once __DIR__ . '/../models/Berita.php';
require_once __DIR__ . '/../models/InfoSekolah.php'; // [BARU] Panggil Model Info Sekolah

class HomeController {
    public function index() {
        // 1. DATA KEPALA SEKOLAH
        $guruModel = new Guru();
        // Cek apakah method getKepalaSekolah ada, jika tidak pakai getAll manual
        // (Asumsi: Anda mungkin belum punya method getKepalaSekolah di model Guru)
        $allGuru = $guruModel->getAll();
        $kepsek = null;
        foreach ($allGuru as $g) {
            if (strtolower($g['jabatan']) == 'kepala sekolah') {
                $kepsek = $g;
                break;
            }
        }

        // 2. DATA BERITA TERBARU (Ambil 3 Teratas)
        $beritaModel = new Berita();
        $allBerita = $beritaModel->getAll(); 
        $beritaTerbaru = array_slice($allBerita, 0, 3);

        // 3. [BARU] DATA STATISTIK SEKOLAH
        $infoModel = new InfoSekolah();
        $info = $infoModel->getInfo(); 

        // Kirim semua data ke View
        require_once __DIR__ . '/../views/home.php';
    }
}