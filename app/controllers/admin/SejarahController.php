<?php

namespace Admin;

require_once __DIR__ . '/../../models/ProfilSekolah.php';

// Load AuthController agar fitur keamanan (Login Check & Timeout) aktif
require_once __DIR__ . '/AuthController.php';

class SejarahController {

    private $profilModel;

    public function __construct() {
        // === PASANG PENGAMANAN DISINI ===
        // Fungsi ini otomatis mengecek:
        // 1. Apakah user sudah login?
        // 2. Apakah user sudah diam lebih dari 60 menit (Timeout)?
        AuthController::check();

        $this->profilModel = new \ProfilSekolah();
    }

    public function index() {
        $data = $this->profilModel->getProfile();
        require_once __DIR__ . '/../../../app/views/admin/sejarah.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sejarah = $_POST['sejarah'];

            if ($this->profilModel->updateSejarah($sejarah)) {
                header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
                exit;
            } else {
                echo "Gagal menyimpan data.";
            }
        }
    }
}