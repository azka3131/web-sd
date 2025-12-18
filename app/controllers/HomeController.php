<?php

// Panggil semua model yang dibutuhkan
require_once __DIR__ . '/../models/Guru.php';
require_once __DIR__ . '/../models/Berita.php';
require_once __DIR__ . '/../models/InfoSekolah.php'; 
// [BARU] Panggil Model Pengunjung
require_once __DIR__ . '/../models/Pengunjung.php';

class HomeController {
    public function index() {
        // --- 1. DATA KEPALA SEKOLAH ---
        $guruModel = new Guru();
        $allGuru = $guruModel->getAll();
        $kepsek = null;
        foreach ($allGuru as $g) {
            if (strtolower($g['jabatan']) == 'kepala sekolah') {
                $kepsek = $g;
                break;
            }
        }

        // --- 2. DATA BERITA TERBARU (Ambil 3 Teratas) ---
        $beritaModel = new Berita();
        $allBerita = $beritaModel->getAll(); 
        $beritaTerbaru = array_slice($allBerita, 0, 3);

        // --- 3. DATA STATISTIK SEKOLAH ---
        $infoModel = new InfoSekolah();
        $info = $infoModel->getInfo(); 

        // --- 4. [BARU] LOGIKA VISITOR COUNTER ---
        // Mulai session jika belum dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $pengunjungModel = new Pengunjung();

        // Cek apakah user ini baru berkunjung di sesi ini
        if (!isset($_SESSION['has_visited'])) {
            $pengunjungModel->tambah();     // Tambah database +1
            $_SESSION['has_visited'] = true; // Tandai sudah berkunjung
        }

        // Ambil total terbaru
        $totalPengunjung = $pengunjungModel->getTotal();

        // Kirim semua data ke View
        require_once __DIR__ . '/../views/home.php';
    }
}