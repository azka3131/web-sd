<?php

namespace Admin;

require_once __DIR__ . '/../../models/Prestasi.php';

// Load AuthController agar fitur keamanan (Login Check & Timeout) aktif
require_once __DIR__ . '/AuthController.php';

class PrestasiController {

    public function __construct() {
        // === PASANG PENGAMANAN DISINI ===
        // Fungsi ini otomatis mengecek:
        // 1. Apakah user sudah login?
        // 2. Apakah user sudah diam lebih dari 60 menit (Timeout)?
        AuthController::check();
    }

    public function index() {
        $model = new \Prestasi();
        $data = $model->getAll();
        require_once __DIR__ . '/../../views/admin/prestasi/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/prestasi/create.php';
    }

    public function store() {
        $foto = '';
        
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

            // Gunakan uniqid agar nama file unik
            $foto = uniqid() . "." . $ext;
            $targetDir = __DIR__ . '/../../../public/assets/img/prestasi/';
            
            // Buat folder jika belum ada
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            move_uploaded_file($_FILES['foto']['tmp_name'], $targetDir . $foto);
        }
        // --- VALIDASI FOTO (SELESAI) ---

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
        if (!isset($_GET['id'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/prestasi");
            exit;
        }
        $id = $_GET['id'];
        $model = new \Prestasi();
        $prestasi = $model->getById($id);
        require_once __DIR__ . '/../../views/admin/prestasi/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $model = new \Prestasi();
        
        // Ambil data lama untuk cek file lama
        $oldData = $model->getById($id);
        $foto = $oldData['foto'];

        // Cek apakah ada foto baru diupload
        if (!empty($_FILES['foto']['name'])) {
            
            // --- VALIDASI FOTO BARU ---
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $fotoBaru = uniqid() . "." . $ext;
            $targetDir = __DIR__ . '/../../../public/assets/img/prestasi/';
            
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            move_uploaded_file($_FILES['foto']['tmp_name'], $targetDir . $fotoBaru);

            // Hapus foto lama jika ada
            if ($oldData['foto'] && file_exists($targetDir . $oldData['foto'])) {
                unlink($targetDir . $oldData['foto']);
            }

            $foto = $fotoBaru;
        }

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
        if (!isset($_GET['id'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/prestasi");
            exit;
        }
        $id = $_GET['id'];
        $model = new \Prestasi();
        
        // Hapus file fisik dulu
        $oldData = $model->getById($id);
        if ($oldData['foto'] && file_exists(__DIR__ . '/../../../public/assets/img/prestasi/' . $oldData['foto'])) {
            unlink(__DIR__ . '/../../../public/assets/img/prestasi/' . $oldData['foto']);
        }

        $model->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/prestasi");
    }
}