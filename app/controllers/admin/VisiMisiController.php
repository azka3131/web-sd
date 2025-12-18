<?php

namespace Admin;

require_once __DIR__ . '/../../models/ProfilSekolah.php';

// Load AuthController agar fitur keamanan (Login Check & Timeout) aktif
require_once __DIR__ . '/AuthController.php';

class VisiMisiController {

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

        // Load view form edit
        require_once __DIR__ . '/../../../app/views/admin/visimisi.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];

            // Simpan data
            if ($this->profilModel->updateVisiMisi($visi, $misi)) {
                // Redirect SUKSES diarahkan ke DASHBOARD
                header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
                exit;
            } else {
                echo "Gagal mengupdate data. Silakan coba lagi.";
            }
        }
    }
}