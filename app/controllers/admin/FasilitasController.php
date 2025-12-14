<?php

namespace Admin;

require_once __DIR__ . '/../../models/Fasilitas.php';

class FasilitasController {
    private $fasilitasModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }
        $this->fasilitasModel = new \Fasilitas();
    }

    public function index() {
        $data = $this->fasilitasModel->getAll();
        require_once __DIR__ . '/../../views/admin/fasilitas/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/fasilitas/form.php';
    }

    public function store() {
        $gambar = '';
        
        // --- VALIDASI GAMBAR (MULAI) ---
        if (!empty($_FILES['gambar']['name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            // Jika ekstensi bukan jpg/jpeg/png, tolak!
            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $gambar = uniqid() . "." . $ext;
            // Upload file
            move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../../../public/assets/img/fasilitas/' . $gambar);
        }
        // --- VALIDASI GAMBAR (SELESAI) ---

        $input = [
            'nama' => $_POST['nama'],
            'deskripsi' => $_POST['deskripsi'],
            'gambar' => $gambar
        ];

        $this->fasilitasModel->create($input);
        header("Location: /kp-sd2-dukuhbenda/public/admin/fasilitas");
    }

    public function edit() {
        $id = $_GET['id'];
        $fasilitas = $this->fasilitasModel->getById($id);
        require_once __DIR__ . '/../../views/admin/fasilitas/form.php';
    }

    public function update() {
        $id = $_POST['id'];
        
        // Ambil data lama untuk cek file lama
        $lama = $this->fasilitasModel->getById($id);
        $gambar = $lama['gambar'];

        if (!empty($_FILES['gambar']['name'])) {
            
            // --- VALIDASI GAMBAR (MULAI) ---
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }
            // --- VALIDASI GAMBAR (SELESAI) ---

            $gambarBaru = uniqid() . "." . $ext;
            
            // Upload gambar baru
            move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../../../public/assets/img/fasilitas/' . $gambarBaru);
            
            // Hapus gambar lama jika ada (agar folder tidak penuh)
            if ($lama['gambar'] && file_exists(__DIR__ . '/../../../public/assets/img/fasilitas/' . $lama['gambar'])) {
                unlink(__DIR__ . '/../../../public/assets/img/fasilitas/' . $lama['gambar']);
            }

            $gambar = $gambarBaru;
        }

        $input = [
            'id' => $id,
            'nama' => $_POST['nama'],
            'deskripsi' => $_POST['deskripsi'],
            'gambar' => $gambar
        ];

        $this->fasilitasModel->update($input);
        header("Location: /kp-sd2-dukuhbenda/public/admin/fasilitas");
    }

    public function delete() {
        $id = $_GET['id'];
        
        // Ambil data dulu
        $fasilitas = $this->fasilitasModel->getById($id);
        
        // Hapus file fisik jika ada
        if ($fasilitas['gambar'] && file_exists(__DIR__ . '/../../../public/assets/img/fasilitas/' . $fasilitas['gambar'])) {
            unlink(__DIR__ . '/../../../public/assets/img/fasilitas/' . $fasilitas['gambar']);
        }

        $this->fasilitasModel->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/fasilitas");
    }
}