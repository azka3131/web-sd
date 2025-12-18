<?php

namespace Admin;

require_once __DIR__ . '/../../models/Guru.php';

// Load AuthController agar fitur keamanan (Login Check & Timeout) aktif
require_once __DIR__ . '/AuthController.php';

class GuruController {
    private $guruModel;

    public function __construct() {
        // === PASANG PENGAMANAN DISINI ===
        // Fungsi ini otomatis mengecek:
        // 1. Apakah user sudah login?
        // 2. Apakah user sudah diam lebih dari 60 menit (Timeout)?
        AuthController::check();

        $this->guruModel = new \Guru();
    }

    public function index() {
        // PENTING: Variabel ini dinamakan $data agar cocok dengan View baru
        $data = $this->guruModel->getAll();
        require_once __DIR__ . '/../../views/admin/guru/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/guru/form.php';
    }

    public function store() {
        $foto = '';
        
        // Cek apakah ada file yang diupload
        if (!empty($_FILES['foto']['name'])) {
            
            // --- VALIDASI EKSTENSI (MULAI) ---
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file tidak diizinkan! Hanya JPG, JPEG, dan PNG.');
                        window.history.back();
                      </script>";
                exit;
            }
            // --- VALIDASI EKSTENSI (SELESAI) ---

            $foto = uniqid() . "." . $ext;
            move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . '/../../../public/assets/img/guru/' . $foto);
        }

        $input = [
            'nama' => $_POST['nama'],
            'jabatan' => $_POST['jabatan'],
            'pendidikan' => $_POST['pendidikan'],
            'bio' => $_POST['bio'],
            'foto' => $foto
        ];

        $this->guruModel->create($input);
        header("Location: /kp-sd2-dukuhbenda/public/admin/guru");
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/guru");
            exit;
        }
        $id = $_GET['id'];
        $guru = $this->guruModel->getById($id);
        require_once __DIR__ . '/../../views/admin/guru/form.php';
    }

    public function update() {
        $id = $_POST['id'];
        $guruLama = $this->guruModel->getById($id);
        $foto = $guruLama['foto'];

        // Cek apakah ada file baru yang diupload
        if (!empty($_FILES['foto']['name'])) {
            
            // --- VALIDASI EKSTENSI (MULAI) ---
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file tidak diizinkan! Hanya JPG, JPEG, dan PNG.');
                        window.history.back();
                      </script>";
                exit;
            }
            // --- VALIDASI EKSTENSI (SELESAI) ---

            $fotoBaru = uniqid() . "." . $ext;
            
            // Upload foto baru
            move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . '/../../../public/assets/img/guru/' . $fotoBaru);
            
            // Hapus foto lama jika ada dan bukan kosong
            if ($guruLama['foto'] && file_exists(__DIR__ . '/../../../public/assets/img/guru/' . $guruLama['foto'])) {
                unlink(__DIR__ . '/../../../public/assets/img/guru/' . $guruLama['foto']);
            }
            
            $foto = $fotoBaru;
        }

        $input = [
            'id' => $id,
            'nama' => $_POST['nama'],
            'jabatan' => $_POST['jabatan'],
            'pendidikan' => $_POST['pendidikan'],
            'bio' => $_POST['bio'],
            'foto' => $foto
        ];

        $this->guruModel->update($input);
        header("Location: /kp-sd2-dukuhbenda/public/admin/guru");
    }

    public function delete() {
        if (!isset($_GET['id'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/guru");
            exit;
        }
        $id = $_GET['id'];
        
        // Ambil data dulu untuk tahu nama filenya
        $guru = $this->guruModel->getById($id);
        
        // Hapus file fisik
        if ($guru['foto'] && file_exists(__DIR__ . '/../../../public/assets/img/guru/' . $guru['foto'])) {
            unlink(__DIR__ . '/../../../public/assets/img/guru/' . $guru['foto']);
        }

        $this->guruModel->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/guru");
    }
}