<?php

namespace Admin;

require_once __DIR__ . '/../../models/InfoSekolah.php';

class InfoController {

    private $model;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }
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
            
            // [PERBAIKAN] Setelah simpan, langsung lempar balik ke Dashboard
            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard?pesan=info_updated");
            exit;
        }
    }
}