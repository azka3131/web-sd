<?php

namespace Admin;

// Pastikan path ini benar sesuai struktur folder Anda
require_once __DIR__ . '/../../../config/database.php';

class AuthController
{

    public function loginForm()
    {
        session_start();
        // Jika sudah login, lempar langsung ke dashboard
        if (isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
            exit;
        }
        require_once __DIR__ . '/../../../app/views/admin/login.php';
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Method not allowed");
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo "Username dan password wajib diisi.";
            return;
        }

        // Koneksi DB
        $db = new \Database();
        $conn = $db->connect();

        // Ambil user
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Verifikasi Password
        if ($user && password_verify($password, $user['password'])) {

            // Regenerasi session ID untuk keamanan
            session_regenerate_id(true);

            $_SESSION['admin'] = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'] ?? 'admin'
            ];

            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
            exit;
        } else {
            // Agar user tidak bingung, kita redirect balik ke login dengan alert (opsional)
            // Atau echo sederhana seperti sebelumnya:
            echo "<script>alert('Username atau Password salah!'); window.location.href='/kp-sd2-dukuhbenda/public/admin/login';</script>";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /kp-sd2-dukuhbenda/public/admin/login");
        exit;
    }
}
