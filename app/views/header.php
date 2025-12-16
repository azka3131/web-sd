<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 2 Dukuhbenda</title>
    
    <link rel="shortcut icon" href="/kp-sd2-dukuhbenda/public/assets/img/logo_tel.png" type="image/x-icon">

    <link rel="stylesheet" href="/kp-sd2-dukuhbenda/public/assets/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* CSS Tambahan Khusus Navbar */
        a.nav-ppdb-highlight {
            color: #ffc107 !important;
            font-weight: 800;
            text-shadow: 0 0 5px rgba(255, 193, 7, 0.3);
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        a.nav-ppdb-highlight:hover {
            color: #fff !important;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
            transform: scale(1.05);
        }

        .navbar .nav-links {
            align-items: center;
        }
        
        @media (max-width: 900px) {
            a.nav-ppdb-highlight {
                background-color: rgba(255, 193, 7, 0.1);
                padding: 10px;
                border-radius: 5px;
                justify-content: center;
                margin-top: 10px;
            }
        }
    </style>
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
                <img src="/kp-sd2-dukuhbenda/public/assets/img/logo_tel.png" alt="Logo">
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

                    <a href="/kp-sd2-dukuhbenda/public/guru"><i class="fas fa-chalkboard-teacher"></i> Guru & Staf</a>

                    <a href="/kp-sd2-dukuhbenda/public/berita"><i class="fas fa-newspaper"></i> Berita</a>

                    <a href="/kp-sd2-dukuhbenda/public/ppdb" class="nav-ppdb-highlight">
                        <i class="fas fa-star"></i> PPDB ONLINE
                    </a>
                </div>

                <div class="nav-buttons">
                    <a href="/kp-sd2-dukuhbenda/public/admin/login" class="btn-block btn-login-mobile">Login</a>
                </div>
            </nav>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const nav = document.getElementById('nav-menu');
            const overlay = document.querySelector('.menu-overlay');
            nav.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        function toggleDropdown(element, event) {
            if (window.innerWidth <= 900) {
                event.preventDefault(); 
                const parent = element.parentElement;
                parent.classList.toggle('active');
            }
        }
    </script>