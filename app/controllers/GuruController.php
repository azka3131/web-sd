<?php

require_once __DIR__ . '/../models/Guru.php';

class GuruController {
    public function index() {
        $guruModel = new Guru();
        $data = $guruModel->getAll();

        require_once __DIR__ . '/../views/guru.php';
    }
}
