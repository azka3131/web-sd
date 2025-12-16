<?php
require_once __DIR__ . '/../models/Prestasi.php';

class PrestasiController {
    public function index() {
        $model = new Prestasi();
        $data = $model->getAll();
        require_once __DIR__ . '/../views/prestasi.php';
    }
}