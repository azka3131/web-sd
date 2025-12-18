<?php

// ==========================================================
// 1. DEFINISI BASEURL (PENTING!)
// ==========================================================
// Kita buat otomatis mendeteksi URL dasar website.
// Ini akan memperbaiki error %3C (link rusak) di form Anda.

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$serverHost = $_SERVER['HTTP_HOST'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$scriptName = str_replace('\\', '/', $scriptName); // Normalisasi slash untuk Windows

// Definisikan konstanta BASEURL
// Hasilnya misal: http://localhost/kp-sd2-dukuhbenda/public
define('BASEURL', $protocol . "://" . $serverHost . $scriptName);

// ==========================================================
// 2. LOAD ROUTES
// ==========================================================
if (file_exists("../routes/web.php")) {
    require_once "../routes/web.php";
} else {
    die("Error: File routes/web.php tidak ditemukan!");
}

// ==========================================================
// 3. LOGIC ROUTING (PENCARI ALAMAT)
// ==========================================================
$request = $_SERVER['REQUEST_URI'];

// Bersihkan path: Hapus folder project dari URL request
// Contoh: Request = /kp-sd2-dukuhbenda/public/guru  --> Hasil = /guru
$path = str_replace($scriptName, '', $request);

// Hapus query string (misal: ?id=1) agar tidak mengganggu pencarian route
$path = explode('?', $path)[0];

// Pastikan path diawali dengan / dan tidak diakhiri / (kecuali root)
$path = '/' . ltrim($path, '/');
if ($path !== '/' && strlen($path) > 1) {
    $path = rtrim($path, '/');
}

// ==========================================================
// 4. CEK ROUTE & JALANKAN CONTROLLER
// ==========================================================

// Jika route tidak terdaftar di web.php
if (!isset($routes[$path])) {
    http_response_code(404);
    echo "<div style='font-family: sans-serif; text-align: center; padding: 50px;'>";
    echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
    echo "<p>Maaf, alamat <b>" . htmlspecialchars($path) . "</b> tidak terdaftar di sistem.</p>";
    echo "<a href='" . BASEURL . "'>Kembali ke Beranda</a>";
    echo "</div>";
    exit;
}

// Pecah Controller dan Method (Contoh: Admin\DashboardController@index)
list($controllerName, $methodName) = explode('@', $routes[$path]);

// KONVERSI NAMESPACE KE PATH FILE
// Ubah "Admin\" menjadi "admin/" (huruf kecil) agar sesuai nama folder
$folderPath = str_replace("Admin\\", "admin/", $controllerName); 
$controllerPath = "../app/controllers/" . $folderPath . ".php";

// 1. Cek apakah file controllernya ada?
if (!file_exists($controllerPath)) {
    die("Error System: File Controller tidak ditemukan di <b>$controllerPath</b>");
}

require_once $controllerPath;

// 2. Cek apakah Class-nya ada?
// Tambahkan backslash di depan agar PHP tahu ini class Global/Namespace penuh
$className = "\\" . $controllerName; 

if (!class_exists($className)) {
    die("Error System: Class <b>$className</b> tidak ditemukan. Pastikan namespace dan nama class di file sesuai.");
}

// 3. Instansiasi Object
$controllerObj = new $className();

// 4. Cek apakah Method-nya ada?
if (!method_exists($controllerObj, $methodName)) {
    die("Error System: Method <b>$methodName</b> tidak ditemukan di dalam class <b>$className</b>.");
}

// JALANKAN!
$controllerObj->$methodName();