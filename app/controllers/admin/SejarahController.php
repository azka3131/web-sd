<?php

namespace Admin;

require_once __DIR__ . '/../../models/ProfilSekolah.php';

class SejarahController {

    public function index() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }

        $profilModel = new \ProfilSekolah();
        $data = $profilModel->getProfile();

        require_once __DIR__ . '/../../../app/views/admin/sejarah.php';
    }

    public function update() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sejarah = $_POST['sejarah'];

            $profilModel = new \ProfilSekolah();
            
            if ($profilModel->updateSejarah($sejarah)) {
                header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
                exit;
            } else {
                echo "Gagal menyimpan data.";
            }
        }
    }
}