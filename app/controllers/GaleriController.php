<?php

// Panggil Model Galeri yang sudah Anda buat
require_once __DIR__ . '/../models/Galeri.php';

class GaleriController {
    public function index() {
        // 1. Panggil Model
        $galeriModel = new Galeri();
        
        // 2. Ambil data dari Database
        $data = $galeriModel->getAll();

        // 3. Kirim ke View
        require_once __DIR__ . '/../views/galeri.php';
    }
}