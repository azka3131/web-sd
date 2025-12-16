<?php

// 1. Load Konfigurasi (Pastikan file app/config/config.php sudah dibuat)
if (file_exists("../app/config/config.php")) {
    require_once "../app/config/config.php";
} else {
    // Fallback jika lupa buat config, set BASEURL manual (darurat)
    define('BASEURL', 'http://localhost/kp-sd2-dukuhbenda/public');
}

require_once "../routes/web.php";

// 2. Logic Routing Dinamis (Pengganti Hardcode)
// Ambil URL yang diminta oleh browser
$request = $_SERVER['REQUEST_URI'];

// Ambil path folder tempat script ini berada (secara otomatis)
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
// Normalisasi slash (ubah backslash Windows \ jadi slash biasa /)
$scriptName = str_replace('\\', '/', $scriptName);

// Hapus folder script dari URL request untuk mendapatkan "path murni"
// Contoh: Request = /kp-sd2-dukuhbenda/public/guru  --> Hasil = /guru
$path = str_replace($scriptName, '', $request);

// Bersihkan query string (misal: ?id=1) agar tidak mengganggu pencarian route
$path = explode('?', $path)[0];

// Pastikan path diawali dengan / dan tidak diakhiri / (kecuali root)
$path = '/' . ltrim($path, '/');
if ($path !== '/') {
    $path = rtrim($path, '/');
}

// 3. Cek apakah Route ada di daftar
if (!isset($routes[$path])) {
    http_response_code(404);
    die("<h1>404 - Halaman Tidak Ditemukan</h1><p>Route yang diminta: <b>$path</b> tidak terdaftar.</p>");
}

// 4. Eksekusi Controller
list($controller, $method) = explode('@', $routes[$path]);

// Konversi namespace Admin\Controller ke path file (admin/Controller.php)
// Kita ubah backslash namespace menjadi slash biasa untuk path file
$fileFolder = str_replace("Admin\\", "admin/", $controller);
$controllerPath = "../app/controllers/" . $fileFolder . ".php";

if (!file_exists($controllerPath)) {
    die("Controller file NOT FOUND: $controllerPath");
}

require_once $controllerPath;

// Instansiasi Class
// Tambahkan backslash di depan agar dianggap sebagai Global/Fully Qualified Class Name
$className = "\\" . $controller;

if (!class_exists($className)) {
    die("Class NOT FOUND: $className");
}

$obj = new $className();

if (!method_exists($obj, $method)) {
    die("Method NOT FOUND: $method");
}

$obj->$method();