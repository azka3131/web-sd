<?php

require_once __DIR__ . '/../models/Berita.php';

class BeritaController {

    public function index() {
        $beritaModel = new Berita();
        $data = $beritaModel->getAll();
        require_once __DIR__ . '/../views/berita/index.php';
    }

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
