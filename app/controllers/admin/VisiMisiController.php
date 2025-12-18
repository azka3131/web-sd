<?php

namespace Admin;

require_once __DIR__ . '/../../models/ProfilSekolah.php';

class VisiMisiController {

    public function index() {
        // Cek sesi login admin
        session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }

        $profilModel = new \ProfilSekolah();
        $data = $profilModel->getProfile();

        // Load view form edit
        require_once __DIR__ . '/../../../app/views/admin/visimisi.php';
    }

    public function update() {
        session_start();
        
        // PERBAIKAN 1: Jika belum login, lempar ke LOGIN (bukan dashboard)
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];

            $profilModel = new \ProfilSekolah();
            
            // Simpan data
            if ($profilModel->updateVisiMisi($visi, $misi)) {
                
                // PERBAIKAN 2: Redirect SUKSES diarahkan ke DASHBOARD
                header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
                exit;
                
            } else {
                echo "Gagal mengupdate data. Silakan coba lagi.";
            }
        }
    }
}