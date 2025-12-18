<?php

namespace Admin;

require_once __DIR__ . '/../../models/Berita.php';

class BeritaController {
    private $beritaModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }
        $this->beritaModel = new \Berita();
    }

    public function index() {
        // Admin melihat SEMUA data (published & archived)
        $data = $this->beritaModel->getAll();
        require_once __DIR__ . '/../../views/admin/berita/index.php';
    }

    // --- FUNGSI BARU: ARSIPKAN / TERBITKAN ---
    public function setStatus() {
        if (isset($_GET['id']) && isset($_GET['action'])) {
            $id = $_GET['id'];
            $action = $_GET['action']; // 'archive' atau 'publish'
            
            // Set status sesuai action
            $status = ($action === 'archive') ? 'archived' : 'published';

            $this->beritaModel->updateStatus($id, $status);
        }
        // Redirect kembali ke halaman index berita
        header("Location: /kp-sd2-dukuhbenda/public/admin/berita");
        exit;
    }

    public function create() {
        require_once __DIR__ . '/../../views/admin/berita/form.php';
    }

    public function store() {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tanggal = $_POST['tanggal'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

        $gambar = '';
        
        // --- VALIDASI GAMBAR ---
        if (!empty($_FILES['gambar']['name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $gambar = uniqid() . "." . $ext;
            move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../../../public/assets/img/berita/' . $gambar);
        }

        $data = [
            'judul' => $judul,
            'slug' => $slug,
            'isi' => $isi,
            'tanggal' => $tanggal,
            'gambar' => $gambar,
            'status' => 'published' // Default status saat buat baru: PUBLISHED
        ];

        $this->beritaModel->create($data);
        header("Location: /kp-sd2-dukuhbenda/public/admin/berita");
    }

    public function edit() {
        $id = $_GET['id'];
        $berita = $this->beritaModel->getById($id);
        require_once __DIR__ . '/../../views/admin/berita/form.php';
    }

    public function update() {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tanggal = $_POST['tanggal'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

        // Ambil data lama
        $beritaLama = $this->beritaModel->getById($id);
        $gambar = $beritaLama['gambar'];

        if (!empty($_FILES['gambar']['name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                echo "<script>
                        alert('Format file salah! Mohon upload file gambar (JPG, JPEG, atau PNG).');
                        window.history.back();
                      </script>";
                exit;
            }

            $gambarBaru = uniqid() . "." . $ext;
            move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../../../public/assets/img/berita/' . $gambarBaru);
            
            // Hapus gambar lama
            if ($beritaLama['gambar'] && file_exists(__DIR__ . '/../../../public/assets/img/berita/' . $beritaLama['gambar'])) {
                unlink(__DIR__ . '/../../../public/assets/img/berita/' . $beritaLama['gambar']);
            }

            $gambar = $gambarBaru;
        }

        $data = [
            'id' => $id,
            'judul' => $judul,
            'slug' => $slug,
            'isi' => $isi,
            'tanggal' => $tanggal,
            'gambar' => $gambar
            // Status tidak diupdate di sini, biar tetap sesuai kondisi sebelumnya (arsip/publish)
        ];

        $this->beritaModel->update($data);
        header("Location: /kp-sd2-dukuhbenda/public/admin/berita");
    }

    public function delete() {
        $id = $_GET['id'];
        
        $berita = $this->beritaModel->getById($id);
        if ($berita['gambar'] && file_exists(__DIR__ . '/../../../public/assets/img/berita/' . $berita['gambar'])) {
            unlink(__DIR__ . '/../../../public/assets/img/berita/' . $berita['gambar']);
        }

        $this->beritaModel->delete($id);
        header("Location: /kp-sd2-dukuhbenda/public/admin/berita");
    }
}