<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 30px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,.1);
        }
        a.button {
            display: block;
            text-align: center;
            padding: 10px;
            background: #004aad;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<h1>Dashboard Admin</h1>
<p>Selamat datang, <b><?= $_SESSION['admin'] ?></b></p>

<div class="card">
    <h3>Kelola Guru</h3>
    <a class="button" href="/kp-sd2-dukuhbenda/public/admin/guru">Masuk</a>
</div>

<div class="card">
    <h3>Kelola Berita</h3>
    <a class="button" href="/kp-sd2-dukuhbenda/public/admin/berita">Masuk</a>
</div>

<div class="card">
    <h3>Kelola Galeri</h3>
    <a class="button" href="/kp-sd2-dukuhbenda/public/admin/galeri">Masuk</a>
</div>

<div class="card">
    <h3>Kelola Fasilitas</h3>
    <a class="button" href="/kp-sd2-dukuhbenda/public/admin/fasilitas">Masuk</a>
</div>

<a href="/kp-sd2-dukuhbenda/public/admin/logout">Logout</a>

</body>
</html>
