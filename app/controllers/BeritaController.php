<?php

require_once __DIR__ . '/../models/Berita.php';

class BeritaController {

    // Menampilkan semua berita di halaman depan
    public function index() {
        $beritaModel = new Berita();
        
        // GANTI: Hanya ambil yang statusnya 'published'
        $data = $beritaModel->getAllPublished();
        
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