<?php
// [FIX] Cek session dulu biar gak error
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek jika belum login, tendang ke halaman login
if (!isset($_SESSION['admin'])) {
    header("Location: /kp-sd2-dukuhbenda/public/admin/login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SDN Dukuhbenda 02</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* RESET & BODY */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        body {
            background-color: #f4f6f9;
            color: #333;
            padding: 40px;
        }

        /* HEADER */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .welcome-text h1 { font-size: 24px; color: #2c3e50; margin-bottom: 5px; }
        .welcome-text p { font-size: 14px; color: #7f8c8d; }
        .welcome-text b { color: #4FB6C7; }

        /* TOMBOL LOGOUT */
        .btn-logout {
            background-color: #ff6b6b;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(255, 107, 107, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-logout:hover {
            background-color: #ee5253;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 107, 107, 0.4);
        }

        /* GRID MENU */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Responsif */
            gap: 25px;
        }

        /* KARTU MENU */
        .menu-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: 0.3s;
            border: 1px solid #f0f0f0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .menu-card::before {
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 5px;
            background: #4FB6C7; transition: 0.3s;
        }
        .menu-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .menu-card:hover::before { height: 8px; }

        .icon-wrapper {
            width: 70px; height: 70px;
            background: #eef4fc;
            color: #4FB6C7;
            border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            font-size: 28px;
            margin: 0 auto 20px;
            transition: 0.3s;
        }
        .menu-card:hover .icon-wrapper { background: #4FB6C7; color: white; transform: scale(1.1); }

        .menu-card h3 { font-size: 18px; color: #333; margin-bottom: 10px; }
        .menu-card p { font-size: 13px; color: #888; margin-bottom: 25px; line-height: 1.5; }

        .btn-enter {
            display: inline-block; width: 100%;
            padding: 12px;
            background: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn-enter:hover { background: #4FB6C7; }

        .footer-admin {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #aaa;
        }

        /* [BARU] Style untuk Toast Notification (Pesan Melayang) */
        #toast-box {
            visibility: hidden;
            min-width: 300px;
            background-color: #4FB6C7; /* Warna Teal */
            color: #fff;
            text-align: center;
            border-radius: 50px;
            padding: 15px 25px;
            position: fixed;
            z-index: 9999;
            left: 50%;
            bottom: 30px;
            transform: translateX(-50%);
            font-size: 15px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            opacity: 0;
            transition: opacity 0.5s, bottom 0.5s;
        }

        /* Class untuk memunculkan toast */
        #toast-box.show {
            visibility: visible;
            opacity: 1;
            bottom: 50px; /* Efek naik sedikit */
        }
    </style>
</head>
<body>

    <div id="toast-box">Pesan Disini</div>

    <div class="dashboard-header">
        <div class="welcome-text">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang kembali, <b><?= htmlspecialchars($_SESSION['admin']['username'] ?? 'Admin'); ?></b>!</p>
        </div>
        <a href="/kp-sd2-dukuhbenda/public/admin/logout" class="btn-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <div class="menu-grid">
        
        <div class="menu-card">
            <div>
                <div class="icon-wrapper"><i class="fas fa-chart-pie"></i></div>
                <h3>Info Sekolah</h3>
                <p>Update jumlah siswa, guru, rombel, dan prestasi.</p>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/info" class="btn-enter">Masuk</a>
        </div>

        <div class="menu-card">
            <div>
                <div class="icon-wrapper"><i class="fas fa-chalkboard-teacher"></i></div>
                <h3>Kelola Guru</h3>
                <p>Tambah, edit, atau hapus data guru dan staf pengajar.</p>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/guru" class="btn-enter">Masuk</a>
        </div>

        <div class="menu-card">
            <div>
                <div class="icon-wrapper"><i class="fas fa-sitemap"></i></div>
                <h3>Struktur Organisasi</h3>
                <p>Atur susunan Kepala Sekolah, Komite, dan jajaran staf.</p>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/struktur" class="btn-enter">Masuk</a>
        </div>

        <div class="menu-card">
            <div>
                <div class="icon-wrapper"><i class="fas fa-newspaper"></i></div>
                <h3>Kelola Berita</h3>
                <p>Posting artikel, pengumuman, dan informasi terbaru sekolah.</p>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/berita" class="btn-enter">Masuk</a>
        </div>

        <div class="menu-card">
            <div>
                <div class="icon-wrapper"><i class="fas fa-images"></i></div>
                <h3>Kelola Galeri</h3>
                <p>Upload foto kegiatan dan dokumentasi acara sekolah.</p>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/galeri" class="btn-enter">Masuk</a>
        </div>

        <div class="menu-card">
            <div>
                <div class="icon-wrapper"><i class="fas fa-building"></i></div>
                <h3>Kelola Fasilitas</h3>
                <p>Data sarana dan prasarana penunjang kegiatan belajar.</p>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/fasilitas" class="btn-enter">Masuk</a>
        </div>

    </div>

    <div class="footer-admin">
        &copy; <?= date('Y'); ?> SD Negeri 2 Dukuhbenda. All Rights Reserved.
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cek apakah ada parameter 'pesan' di URL
            const urlParams = new URLSearchParams(window.location.search);
            const pesan = urlParams.get('pesan');

            if (pesan === 'info_updated') {
                showToast("✅ Info Sekolah Berhasil Diperbarui!");
                // Hapus parameter URL agar bersih
                window.history.replaceState(null, null, window.location.pathname);
            }
        });

        // Fungsi menampilkan Toast
        function showToast(text) {
            var x = document.getElementById("toast-box");
            x.innerText = text;
            x.className = "show";
            
            // Hilangkan otomatis setelah 3 detik (3000ms)
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>

</body>
</html>