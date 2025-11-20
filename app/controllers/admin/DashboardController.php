<?php
namespace Admin;
class DashboardController {
    public function index() {
        // sebaiknya include view dashboard jika sudah dibuat:
        // require_once __DIR__ . '/../../../app/views/admin/dashboard.php';
        echo "<h1>Selamat Datang di Dashboard Admin</h1>";
    }
}
