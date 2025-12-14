<?php

namespace Admin;

// Pastikan path ke model benar
require_once __DIR__ . '/../../models/Galeri.php';

class GaleriController {
    private $galeriModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }
        $this->galeriModel = new \Galeri();
    }

    public function index() {
        $data = $this->galeriModel->getAll();
        require_once __DIR__ . '/../../views/admin/galeri/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/galeri/form.php';
    }

    public function store() {
        $filename = '';
        
        // --- VALIDASI FOTO (MULAI) ---
        if (!empty($_FILES['foto']['name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            // Jika ekstensi bukan jpg/jpeg/png, tolak!
            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $filename = uniqid() . "." . $ext;
            // Pastikan folder tujuan benar: public/assets/img/galeri/
            move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . '/../../../public/assets/img/galeri/' . $filename);
        }
        // --- VALIDASI FOTO (SELESAI) ---

        $input = [
            'judul' => $_POST['judul'],
            'deskripsi' => $_POST['deskripsi'],
            'link_drive' => $_POST['link_drive'],
            'filename' => $filename
        ];

        $this->galeriModel->create($input);
        header("Location: /kp-sd2-dukuhbenda/public/admin/galeri");
    }

    public function edit() {
        $id = $_GET['id'];
        $galeri = $this->galeriModel->getById($id);
        require_once __DIR__ . '/../../views/admin/galeri/form.php';
    }

    public function update() {
        $id = $_POST['id'];
        
        // Ambil data lama untuk cek file lama
        $lama = $this->galeriModel->getById($id);
        $filename = $lama['filename'];

        if (!empty($_FILES['foto']['name'])) {
            
            // --- VALIDASI FOTO (MULAI) ---
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }
            // --- VALIDASI FOTO (SELESAI) ---

            $filenameBaru = uniqid() . "." . $ext;
            
            // Upload foto baru
            move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . '/../../../public/assets/img/galeri/' . $filenameBaru);
            
            // Hapus foto lama jika ada (agar folder tidak penuh sampah)
            if ($lama['filename'] && file_exists(__DIR__ . '/../../../public/assets/img/galeri/' . $lama['filename'])) {
                unlink(__DIR__ . '/../../../public/assets/img/galeri/' . $lama['filename']);
            }

            $filename = $filenameBaru;
        }

        $input = [
            'id' => $id,
            'judul' => $_POST['judul'],
            'deskripsi' => $_POST['deskripsi'],
            'link_drive' => $_POST['link_drive'],
            'filename' => $filename
        ];

        $this->galeriModel->update($input);
        header("Location: /kp-sd2-dukuhbenda/public/admin/galeri");
    }

    public function delete() {
        $id = $_GET['id'];
        
        // Ambil data dulu
        $galeri = $this->galeriModel->getById($id);
        
        // Hapus file fisik jika ada
        if ($galeri['filename'] && file_exists(__DIR__ . '/../../../public/assets/img/galeri/' . $galeri['filename'])) {
            unlink(__DIR__ . '/../../../public/assets/img/galeri/' . $galeri['filename']);
        }

        $this->galeriModel->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/galeri");
    }
}