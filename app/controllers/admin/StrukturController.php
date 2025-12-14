<?php

namespace Admin;

require_once __DIR__ . '/../../models/Struktur.php';

class StrukturController {

    private $model;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }
        $this->model = new \Struktur();
    }

    public function index() {
        $data = $this->model->getAll();
        require_once __DIR__ . '/../../views/admin/struktur/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/struktur/form.php';
    }

    // NAMA FUNGSI KEMBALI KE 'store' SESUAI ROUTES
    public function store() {
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $urutan = $_POST['urutan'];
        $foto = "default.png";

        // Validasi Foto
        if (!empty($_FILES['foto']['name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $targetDir = __DIR__ . "/../../../public/assets/img/struktur/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            
            $fileName = uniqid() . "." . $ext;
            
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetDir . $fileName)) {
                $foto = $fileName;
            }
        }

        $this->model->create([
            'nama' => $nama, 
            'jabatan' => $jabatan, 
            'foto' => $foto,
            'urutan' => $urutan
        ]);

        header("Location: /kp-sd2-dukuhbenda/public/admin/struktur");
    }

    public function edit() {
        $id = $_GET['id'];
        $struktur = $this->model->getById($id);
        require_once __DIR__ . '/../../views/admin/struktur/form.php';
    }

    public function update() {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $urutan = $_POST['urutan'];
        
        $oldData = $this->model->getById($id);
        $foto = $oldData['foto'];

        if (!empty($_FILES['foto']['name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $targetDir = __DIR__ . "/../../../public/assets/img/struktur/";
            $fileName = uniqid() . "." . $ext;
            
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetDir . $fileName)) {
                if ($oldData['foto'] && $oldData['foto'] != 'default.png' && file_exists($targetDir . $oldData['foto'])) {
                    unlink($targetDir . $oldData['foto']);
                }
                $foto = $fileName;
            }
        }

        $this->model->update($id, [
            'nama' => $nama, 
            'jabatan' => $jabatan, 
            'foto' => $foto,
            'urutan' => $urutan
        ]);

        header("Location: /kp-sd2-dukuhbenda/public/admin/struktur");
    }

    // NAMA FUNGSI DELETE (BUKAN HAPUS) SESUAI ROUTES
    public function delete() {
        $id = $_GET['id'];
        
        $data = $this->model->getById($id);
        $targetDir = __DIR__ . "/../../../public/assets/img/struktur/";
        
        if ($data['foto'] && $data['foto'] != 'default.png' && file_exists($targetDir . $data['foto'])) {
            unlink($targetDir . $data['foto']);
        }

        $this->model->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/struktur");
    }
}