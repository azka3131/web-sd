<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 2 Dukuhbenda</title>

    <link rel="shortcut icon" href="<?= BASEURL ?>/assets/img/logo_tel.png" type="image/x-icon">

    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
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

            .dropdown-mobile-wrap {
                width: 100%;
                display: block;
            }

            .dropdown-mobile-wrap .dropbtn {
                display: flex;
                align-items: center;
                justify-content: flex-start;
                width: 100%;
                padding: 10px 20px;
                text-align: left;
                background: none;
                border: none;

                font-size: 15px;
                font-weight: bold;
                font-family: inherit;
                color: #333;
                cursor: pointer;
            }

            .dropdown-mobile-wrap .dropbtn span {
                display: flex;
                align-items: center;
                gap: 10px;
                flex-grow: 1;
            }

            .dropdown-mobile-wrap .dropbtn .arrow-icon {
                margin-left: auto;
            }

            .nav-links>a {
                display: flex;
                width: 100%;
                justify-content: flex-start;
                align-items: center;
                gap: 10px;
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
                <img src="<?= BASEURL ?>/assets/img/logo_tel.png" alt="Logo">
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
                    <a href="<?= BASEURL ?>"><i class="fas fa-home"></i> Beranda</a>

                    <div class="dropdown-mobile-wrap">
                        <a href="#" class="dropbtn" onclick="toggleDropdown(this, event)">
                            <span><i class="fas fa-user-tie"></i> Profil</span>
                            <i class="fas fa-chevron-down arrow-icon"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="<?= BASEURL ?>/profil/visi-misi">Visi & Misi</a>
                            <a href="<?= BASEURL ?>/profil/sejarah">Sejarah Sekolah</a>
                            <a href="<?= BASEURL ?>/profil/struktur">Struktur Organisasi</a>
                        </div>
                    </div>

                    <a href="<?= BASEURL ?>/guru"><i class="fas fa-chalkboard-teacher"></i> Guru & Staf</a>

                    <a href="<?= BASEURL ?>/berita"><i class="fas fa-newspaper"></i> Berita</a>

                    <a href="<?= BASEURL ?>/ppdb" class="nav-ppdb-highlight">
                        <i class="fas fa-star"></i> PPDB
                    </a>
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
</body>

</html>