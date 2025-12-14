<?php

require_once "../routes/web.php";

// Ambil path URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = "/kp-sd2-dukuhbenda/public";

if (substr($path, 0, strlen($base)) === $base) {
    $path = substr($path, strlen($base));
}

$path = rtrim($path, '/');
if ($path === '') $path = '/';

// Cek route
if (!isset($routes[$path])) {
    die("404 - Route not found: $path");
}

list($controller, $method) = explode('@', $routes[$path]);

// Konversi namespace ke path file
$controllerPath = "../app/controllers/" . str_replace("Admin\\", "admin/", $controller) . ".php";

if (!file_exists($controllerPath)) {
    die("Controller file NOT FOUND: $controllerPath");
}

require_once $controllerPath;

// === Masalah yang membuat login tidak bekerja ===
// Kita harus memastikan object dibuat sebagai fully-qualified class
$className = "\\" . $controller;   // ← SOLUSI UTAMA

if (!class_exists($className)) {
    die("Class NOT FOUND: $className");
}

$obj = new $className();

if (!method_exists($obj, $method)) {
    die("Method NOT FOUND: $method");
}

$obj->$method();
