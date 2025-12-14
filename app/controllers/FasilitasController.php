<?php

// Panggil Model Fasilitas yang sudah Anda buat
require_once __DIR__ . '/../models/Fasilitas.php';

class FasilitasController {
    public function index() {
        // 1. Buat object model
        $fasilitasModel = new Fasilitas();
        
        // 2. Ambil data asli dari database menggunakan method getAll()
        $data = $fasilitasModel->getAll();

        // 3. Kirim ke View (View akan otomatis menampilkan data dari DB)
        require_once __DIR__ . '/../views/fasilitas.php';
    }
}