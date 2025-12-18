<?php

namespace Admin;

require_once __DIR__ . '/../../models/PpdbModel.php';

// Load AuthController agar fitur keamanan (Login Check & Timeout) aktif
require_once __DIR__ . '/AuthController.php';

class PpdbController {

    private $model;

    public function __construct() {
        // === PASANG PENGAMANAN DISINI ===
        // Fungsi ini otomatis mengecek:
        // 1. Apakah user sudah login?
        // 2. Apakah user sudah diam lebih dari 60 menit (Timeout)?
        AuthController::check();

        $this->model = new \PpdbModel();
    }

    public function index() {
        $data = $this->model->get();
        require_once __DIR__ . '/../../views/admin/ppdb/index.php';
    }

    public function update() {
        // Cek apakah ada file yang diupload dan tidak error
        if (isset($_FILES['brosur']) && $_FILES['brosur']['error'] === 0) {
            
            // --- VALIDASI EKSTENSI (KEAMANAN) ---
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['brosur']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $targetDir = __DIR__ . '/../../../public/assets/img/ppdb/';
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            // Gunakan time() agar nama file unik
            $fileName = time() . '_' . $_FILES['brosur']['name'];
            
            if (move_uploaded_file($_FILES['brosur']['tmp_name'], $targetDir . $fileName)) {
                $this->model->updateBrosur($fileName);
            }
        }
        
        header("Location: /kp-sd2-dukuhbenda/public/admin/ppdb");
        exit;
    }
}