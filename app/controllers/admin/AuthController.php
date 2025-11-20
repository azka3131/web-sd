<?php

namespace Admin;

require_once __DIR__ . '/../../../config/database.php';

class AuthController {

    public function loginForm() {
        // path view harus folder: app/views/admin/login.php
        require_once __DIR__ . '/../../../app/views/admin/login.php';
    }

    public function login() {
        session_start();

        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            die("Invalid request");
        }

        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Koneksi DB
        $db = new \Database();
        $conn = $db->connect();

        // Ambil user berdasarkan username
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Validasi user + password
        if ($user && password_verify($password, $user['password'])) {

            // Simpan session admin
            $_SESSION['admin'] = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'] ?? 'admin'
            ];

            // redirect
            header("Location: /kp-sd2-dukuhbenda/public/admin/dashboard");
            exit;

        } else {
            echo "Username atau password salah.";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /kp-sd2-dukuhbenda/public/admin/login");
        exit;
    }
}
