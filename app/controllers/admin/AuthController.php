<?php

namespace Admin; // <--- WAJIB ADA INI

require_once __DIR__ . '/../../../config/database.php';

class AuthController { // <--- Pastikan nama class sama persis

    public function loginForm() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        if (isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
            exit;
        }
        require_once __DIR__ . '/../../../app/views/admin/login.php';
    }

    public function login() {
        if (session_status() == PHP_SESSION_NONE) session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Method not allowed");
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo "<script>alert('Username dan password wajib diisi.'); window.location.href='/kp-sd2-dukuhbenda/public/admin/login';</script>";
            return;
        }

        $db = new \Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin'] = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'] ?? 'admin'
            ];
            $_SESSION['last_activity'] = time();

            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
            exit;
        } else {
            echo "<script>alert('Username atau Password salah!'); window.location.href='/kp-sd2-dukuhbenda/public/admin/login';</script>";
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location: /kp-sd2-dukuhbenda/public/admin/login");
        exit;
    }

    // Fungsi Security yang dipanggil Controller lain
    public static function check() {
        if (session_status() == PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }

        $timeout_duration = 3600; 
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
            session_unset();
            session_destroy();
            header("Location: /kp-sd2-dukuhbenda/public/admin/login?timeout=true");
            exit;
        }
        $_SESSION['last_activity'] = time();
    }
}