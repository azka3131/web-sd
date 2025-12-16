<?php
require_once __DIR__ . '/../models/PpdbModel.php';

class PpdbController {
    public function index() {
        $model = new PpdbModel();
        $data = $model->get();
        require_once __DIR__ . '/../views/ppdb.php';
    }
}