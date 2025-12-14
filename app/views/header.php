<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 2 Dukuhbenda</title>
    <link rel="stylesheet" href="/kp-sd2-dukuhbenda/public/assets/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 2 Dukuhbenda</title>
    
    <link rel="shortcut icon" href="/kp-sd2-dukuhbenda/public/assets/img/logo_tel.png" type="image/x-icon">

    <link rel="stylesheet" href="/kp-sd2-dukuhbenda/public/assets/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>

<body>

    <div class="menu-overlay" onclick="toggleMenu()"></div>

    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="left-info">
                <a href="https://maps.google.com/?cid=4154025381396008849&g_mp=Cidnb29nbGUubWFwcy5wbGFjZXMudjEuUGxhY2VzLlNlYXJjaFRleHQ" target="_blank" class="info-item">
                    <i class="fas fa-map-marker-alt"></i> Jl. Raya, Siketi Tengah
                </a>
                
                <a href="tel:087830153654" class="info-item">
                    <i class="fas fa-phone"></i> 0878-3015-3654
                </a>
            </div>
            <div class="right-info">
                <a href="mailto:dukuhbenda02@gmail.com" class="info-item">
                    <i class="fas fa-envelope"></i> dukuhbenda02@gmail.com
                </a>
            </div>
        </div>
    </div>

    <header>
        <div class="container navbar">
            <div class="logo-area">
                <img src="/kp-sd2-dukuhbenda/public/assets/img/logo.jpg" alt="Logo">
                <div class="logo-text">
                    <h2>SDN DUKUHBENDA 02</h2>
                    <small>Bumijawa, Kab. Tegal</small>
                </div>
            </div>

            <div class="burger-menu" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="nav-menu" id="nav-menu">
                <div class="close-btn" onclick="toggleMenu()">
                    <i class="fas fa-times"></i>
                </div>

                <div class="nav-links">
                    <a href="/kp-sd2-dukuhbenda/public/"><i class="fas fa-home"></i> Beranda</a>

                    <div class="dropdown-mobile-wrap">
                        <a href="#" class="dropbtn" onclick="toggleDropdown(this, event)">
                            <span><i class="fas fa-user-tie"></i> Profil</span>
                            <i class="fas fa-chevron-down arrow-icon"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="/kp-sd2-dukuhbenda/public/profil/visi-misi">Visi & Misi</a>
                            <a href="/kp-sd2-dukuhbenda/public/profil/sejarah">Sejarah Sekolah</a>
                            <a href="/kp-sd2-dukuhbenda/public/profil/struktur">Struktur Organisasi</a>
                        </div>
                    </div>

                    <div class="dropdown-mobile-wrap">
                        <a href="#" class="dropbtn" onclick="toggleDropdown(this, event)">
                            <span><i class="fas fa-layer-group"></i> Sumber Daya</span>
                            <i class="fas fa-chevron-down arrow-icon"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="/kp-sd2-dukuhbenda/public/guru">Guru & Staf</a>
                            <a href="/kp-sd2-dukuhbenda/public/fasilitas">Fasilitas</a>
                        </div>
                    </div>

                    <a href="/kp-sd2-dukuhbenda/public/berita"><i class="fas fa-newspaper"></i> Berita</a>
                    <a href="/kp-sd2-dukuhbenda/public/galeri"><i class="fas fa-images"></i> Galeri</a>
                </div>

                <div class="nav-buttons">
                    <a href="/kp-sd2-dukuhbenda/public/admin/login" class="btn-block btn-login-mobile">Login</a>
                </div>
            </nav>
        </div>
    </header>

    <script>
        // Fungsi Buka Tutup Menu Utama
        function toggleMenu() {
            const nav = document.getElementById('nav-menu');
            const overlay = document.querySelector('.menu-overlay');
            nav.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Fungsi Buka Tutup Dropdown di Mobile
        function toggleDropdown(element, event) {
            // Cek jika layar <= 900px (Mobile)
            if (window.innerWidth <= 900) {
                event.preventDefault(); // Mencegah link pindah halaman
                const parent = element.parentElement;
                
                // Toggle class 'active' pada parent wrapper
                parent.classList.toggle('active');
            }
        }
    </script>

    <div class="container">
        <main>