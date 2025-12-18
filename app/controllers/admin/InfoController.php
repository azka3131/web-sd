<?php

namespace Admin;

require_once __DIR__ . '/../../models/InfoSekolah.php';

// Load AuthController agar fitur keamanan (Login Check & Timeout) aktif
require_once __DIR__ . '/AuthController.php';

class InfoController {

    private $model;

    public function __construct() {

        // 1. Apakah user sudah login?
        // 2. Apakah user sudah diam lebih dari 60 menit (Timeout)?
        AuthController::check();

        $this->model = new \InfoSekolah();
    }

    public function index() {
        $data = $this->model->getInfo();
        require_once __DIR__ . '/../../views/admin/info/index.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->updateInfo([
                'siswa' => $_POST['siswa'],
                'guru' => $_POST['guru'],
                'rombel' => $_POST['rombel'],
                'prestasi' => $_POST['prestasi']
            ]);
            
            // Setelah simpan, langsung lempar balik ke Dashboard
            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard?pesan=info_updated");
            exit;
        }
    }
}