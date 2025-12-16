<?php
namespace Admin;
require_once __DIR__ . '/../../models/PpdbModel.php';

class PpdbController {
    public function index() {
        if (!isset($_SESSION['admin'])) { session_start(); }
        // jika belum login, redirect
        
        $model = new \PpdbModel();
        $data = $model->get();
        require_once __DIR__ . '/../../views/admin/ppdb/index.php';
    }

    public function update() {
        if (isset($_FILES['brosur']) && $_FILES['brosur']['error'] === 0) {
            $targetDir = __DIR__ . '/../../../public/assets/img/ppdb/';
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            $fileName = time() . '_' . $_FILES['brosur']['name'];
            move_uploaded_file($_FILES['brosur']['tmp_name'], $targetDir . $fileName);

            $model = new \PpdbModel();
            $model->updateBrosur($fileName);
        }
        header("Location: /kp-sd2-dukuhbenda/public/admin/ppdb");
    }
}