<?php
namespace Admin; // Namespace Dashboard harus Admin

// Panggil file AuthController.php yang ada di folder SAMA (admin)
require_once __DIR__ . '/AuthController.php'; 

class DashboardController {
    public function index() {
        // Panggil fungsi static check() dari class AuthController
        AuthController::check(); 

        // Tampilkan view dashboard
        require_once __DIR__ . '/../../../app/views/admin/dashboard.php';
    }
}