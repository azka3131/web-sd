<?php

require_once __DIR__ . '/../models/Berita.php';

class BeritaController {

    // Menampilkan semua berita di halaman depan
    public function index() {
        $beritaModel = new Berita();

        // Ambil input dari URL (jika ada)
        $keyword = isset($_GET['q']) ? $_GET['q'] : null;
        $date = isset($_GET['date']) ? $_GET['date'] : null;

        // Cek apakah user sedang mencari sesuatu (salah satu atau keduanya terisi)
        if (!empty($keyword) || !empty($date)) {
            $data = $beritaModel->search($keyword, $date);
        } else {
            // Jika tidak cari apa-apa, ambil semua
            $data = $beritaModel->getAllPublished();
        }

        require_once __DIR__ . '/../views/berita/index.php';
    }

    // Menampilkan detail 1 berita
    public function show() {
        if (!isset($_GET['id'])) {
            echo "ID tidak ditemukan";
            return;
        }

        $id = $_GET['id'];
        $beritaModel = new Berita();
        $detail = $beritaModel->getById($id);

        require_once __DIR__ . '/../views/berita/detail.php';
    }
}