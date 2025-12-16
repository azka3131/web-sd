<?php
namespace Admin;
require_once __DIR__ . '/../../models/Prestasi.php';

class PrestasiController {

    public function index() {
        // Cek Login (Sederhana)
        if (!isset($_SESSION['admin'])) { session_start(); }
        if (!isset($_SESSION['admin'])) { header("Location: /kp-sd2-dukuhbenda/public/admin/login"); exit; }

        $model = new \Prestasi();
        $data = $model->getAll();
        require_once __DIR__ . '/../../views/admin/prestasi/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/prestasi/create.php';
    }

    public function store() {
        $foto = $this->uploadFoto();
        
        $data = [
            'judul' => $_POST['judul'],
            'nama_siswa' => $_POST['nama_siswa'],
            'jenis_juara' => $_POST['jenis_juara'],
            'tingkat' => $_POST['tingkat'],
            'tanggal' => $_POST['tanggal'],
            'deskripsi' => $_POST['deskripsi'],
            'foto' => $foto
        ];

        $model = new \Prestasi();
        $model->create($data);
        header("Location: /kp-sd2-dukuhbenda/public/admin/prestasi");
    }

    public function edit() {
        $id = $_GET['id'];
        $model = new \Prestasi();
        $prestasi = $model->getById($id);
        require_once __DIR__ . '/../../views/admin/prestasi/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $model = new \Prestasi();
        $oldData = $model->getById($id);

        // Cek apakah ada foto baru diupload
        $foto = $_FILES['foto']['name'] ? $this->uploadFoto() : $oldData['foto'];

        $data = [
            'judul' => $_POST['judul'],
            'nama_siswa' => $_POST['nama_siswa'],
            'jenis_juara' => $_POST['jenis_juara'],
            'tingkat' => $_POST['tingkat'],
            'tanggal' => $_POST['tanggal'],
            'deskripsi' => $_POST['deskripsi'],
            'foto' => $foto
        ];

        $model->update($id, $data);
        header("Location: /kp-sd2-dukuhbenda/public/admin/prestasi");
    }

    public function delete() {
        $id = $_GET['id'];
        $model = new \Prestasi();
        $model->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/prestasi");
    }

    private function uploadFoto() {
        if (!isset($_FILES['foto']) || $_FILES['foto']['error'] != 0) return "";
        
        $targetDir = __DIR__ . '/../../../public/assets/img/prestasi/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $fileName = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $targetDir . $fileName);
        return $fileName;
    }
}