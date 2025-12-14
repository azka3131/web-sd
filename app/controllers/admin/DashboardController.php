<?php
namespace Admin;

class DashboardController {
    public function index() {
        session_start();
        
        // Cek login
        if (!isset($_SESSION['admin'])) {
            header("Location: /kp-sd2-dukuhbenda/public/admin/login");
            exit;
        }

        // Hapus tanda komentar (//) agar view terpanggil
        require_once __DIR__ . '/../../../app/views/admin/dashboard.php';
    }
}