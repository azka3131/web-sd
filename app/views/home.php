<?php include 'header.php'; ?>

<div class="container">
    <main>

<?php
// Cek data kepsek
if (isset($kepsek) && !empty($kepsek)) {
    if (!empty($kepsek['foto'])) {
        $foto_kepsek = "/kp-sd2-dukuhbenda/public/assets/img/guru/" . $kepsek['foto'];
    }
    $nama_kepsek = $kepsek['nama'];
    $jabatan_kepsek = $kepsek['jabatan'];
    $sambutan_kepsek = !empty($kepsek['bio']) ? $kepsek['bio'] : $sambutan_kepsek;
}
?>

<div class="hero-slider-wrapper">
    <div class="slide-item active" style="background-image: url('<?= BASEURL ?>/assets/img/slider1.jpg');">
        <div class="slide-overlay">
            <img src="<?= BASEURL ?>/assets/img/logo_tel.png" alt="Logo Sekolah" class="slide-logo-img">
            <div class="slide-text">
                <h1>SD NEGERI DUKUHBENDA 02</h1>
                <p>Membentuk Generasi Cerdas, Berkarakter, dan Berakhlak Mulia di Era Digital.</p>
            </div>
        </div>
    </div>
    <div class="slide-item" style="background-image: url('<?= BASEURL ?>/assets/img/slider2.jpg');">
        <div class="slide-overlay">
            <div class="slide-text">
                <h1>Fasilitas Lengkap</h1>
                <p>Menunjang kegiatan belajar mengajar dengan sarana terbaik dan lingkungan yang nyaman.</p>
            </div>
        </div>
    </div>
    <div class="slide-item" style="background-image: url('<?= BASEURL ?>/assets/img/slider3.jpg');">
        <div class="slide-overlay">
            <div class="slide-text">
                <h1>Guru Berkompeten</h1>
                <p>Dididik oleh tenaga pengajar profesional, berpengalaman, dan penuh dedikasi.</p>
            </div>
        </div>
    </div>
    <div class="wave-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="scroll-indicator" onclick="document.getElementById('sambutan').scrollIntoView({behavior: 'smooth'})">
        <span>↓</span>
    </div>
</div>

<section id="sambutan" class="sambutan-section reveal" style="padding-top: 50px;">
    <div class="container">
        <div class="sambutan-card">
            <div class="sambutan-img">
                <img src="<?= $foto_kepsek; ?>" alt="<?= $nama_kepsek; ?>">
            </div>
            <div class="sambutan-text">
                <h3>Sambutan Kepala Sekolah</h3>
                <h4><?= $nama_kepsek; ?></h4>
                <span class="badge-jabatan"><?= $jabatan_kepsek; ?></span>
                <div class="sambutan-isi">
                    <?= nl2br($sambutan_kepsek); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stats-section reveal">
    <div class="wave-top">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <i class="fas fa-user-graduate stat-icon"></i>
                <span class="stat-number" data-target="<?= isset($info['jumlah_siswa']) ? $info['jumlah_siswa'] : 0; ?>">0</span>
                <span class="stat-label">Siswa</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-chalkboard-teacher stat-icon"></i>
                <span class="stat-number" data-target="<?= isset($info['jumlah_guru']) ? $info['jumlah_guru'] : 0; ?>">0</span>
                <span class="stat-label">Guru & Staf</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-school stat-icon"></i>
                <span class="stat-number" data-target="<?= isset($info['jumlah_rombel']) ? $info['jumlah_rombel'] : 0; ?>">0</span>
                <span class="stat-label">Rombel</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-trophy stat-icon"></i>
                <span class="stat-number" data-target="<?= isset($info['jumlah_prestasi']) ? $info['jumlah_prestasi'] : 0; ?>">0</span>
                <span class="stat-label">Prestasi</span>
            </div>
        </div>
    </div>

    <div class="wave-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</section>

<section id="akses-cepat" class="quick-menu-section reveal">
    <div class="container">
        <div class="section-header" style="margin-bottom: 40px;">
            <h2>JELAJAHI SEKOLAH</h2>
            <div class="line-bar"></div>
        </div>
        
        <div class="quick-menu-grid three-cols-centered">
            <a href="<?= BASEURL ?>/galeri" class="quick-card card-galeri">
                <div class="card-content-wrapper">
                    <div class="icon-circle">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3>Galeri Foto</h3>
                    <p>Dokumentasi kegiatan siswa</p>
                    <div class="btn-action">Lihat Galeri <i class="fas fa-arrow-right"></i></div>
                </div>
            </a>

            <a href="<?= BASEURL ?>/prestasi" class="quick-card card-prestasi">
                <div class="card-content-wrapper">
                    <div class="icon-circle">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Prestasi</h3>
                    <p>Daftar kejuaraan sekolah</p>
                    <div class="btn-action">Lihat Prestasi <i class="fas fa-arrow-right"></i></div>
                </div>
            </a>

            <a href="<?= BASEURL ?>/fasilitas" class="quick-card card-fasilitas">
                <div class="card-content-wrapper">
                    <div class="icon-circle">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Fasilitas</h3>
                    <p>Sarana penunjang belajar</p>
                    <div class="btn-action">Lihat Fasilitas <i class="fas fa-arrow-right"></i></div>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="home-berita reveal">
    <div class="container">
        <div class="section-header">
            <h2>BERITA SEKOLAH</h2>
            <div class="line-bar"></div>
        </div>

        <div class="berita-grid">
            <?php if (isset($beritaTerbaru) && !empty($beritaTerbaru)): ?>
                <?php foreach ($beritaTerbaru as $b): ?>
                    <div class="berita-card-home">
                        <div class="berita-thumb">
                            <?php $imgSrc = !empty($b['gambar']) ? "/kp-sd2-dukuhbenda/public/assets/img/berita/" . $b['gambar'] : "/kp-sd2-dukuhbenda/public/assets/img/logo.jpg"; ?>
                            <img src="<?= $imgSrc; ?>" alt="<?= $b['judul']; ?>">
                            <div class="date-badge">
                                <span><?= date('d', strtotime($b['tanggal'])); ?></span>
                                <small><?= date('M', strtotime($b['tanggal'])); ?></small>
                            </div>
                        </div>
                        <div class="berita-content">
                            <h3>
                                <a href="<?= BASEURL ?>/berita/detail?id=<?= $b['id']; ?>">
                                    <?= substr($b['judul'], 0, 60); ?>...
                                </a>
                            </h3>
                            <a href="<?= BASEURL ?>/berita/detail?id=<?= $b['id']; ?>" class="read-more">Baca Selengkapnya →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="text-align:center; width:100%; grid-column:1/-1;">
                    <p>Belum ada berita terbaru.</p>
                </div>
            <?php endif; ?>
        </div>

        <div style="text-align: center; margin-top: 50px;">
            <a href="<?= BASEURL ?>/berita" class="btn-teal">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<section class="contact-section reveal">
    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-form-side">
                <h2 class="contact-title">Hubungi Kami</h2>
                <p style="margin-bottom: 20px; color: #666;">Silakan pilih metode di bawah ini:</p>
                
                <form action="https://formsubmit.co/azkahehe22@gmail.com" method="POST">
                    <input type="hidden" name="_next" value="http://localhost<?= BASEURL ?>/?pesan=sukses">
                    <div class="form-row-inputs">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="input-line" placeholder="Nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="email" name="email" class="input-line" placeholder="Email Anda" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="pesan" rows="4" class="input-line" placeholder="Tulis pesan Anda..." required></textarea>
                    </div>
                    
                    <button type="submit" class="btn-teal" style="width: 100%;">Kirim Pesan</button>
                </form>
                    
                <div class="wa-wrapper" style="margin-top: 25px;">
                    <a href="https://wa.me/6287830153654?text=Halo%20Admin%20SD%20Negeri%202%20Dukuhbenda" target="_blank" class="btn-wa-fancy">
                        <div class="wa-icon-box">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <span>Hubungi via WhatsApp</span>
                    </a>
                </div>

            </div>

            <div class="contact-info-side">
                <h3 class="info-school-name">SD Negeri 2 Dukuhbenda</h3>
                <div class="info-details">
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Raya, Siketi Tengah, Dukuh Benda</p>
                    <p><i class="fas fa-phone-alt"></i> 0878-3015-3654</p>
                    <p><i class="fas fa-envelope"></i> dukuhbenda02@gmail.com</p>
                </div>
                <div class="map-container-clean">
                    <iframe width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" src="https://maps.google.com/maps?q=SDN+DUKUHBENDA+02,+Bumijawa&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="visitor-float">
    <span class="icon">👀</span>
    <div class="text">
        <small>Total Pengunjung</small>
        <strong><?= number_format($totalPengunjung ?? 0, 0, ',', '.'); ?></strong>
    </div>
</div>

<style>
/* [BARU] CSS VISITOR COUNTER */
.visitor-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: linear-gradient(135deg, #004aad, #007bff);
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 9999;
    font-family: Arial, sans-serif;
    transition: transform 0.3s ease;
    cursor: default;
}
.visitor-float:hover { transform: scale(1.05); }
.visitor-float .icon { font-size: 24px; }
.visitor-float .text { display: flex; flex-direction: column; line-height: 1.2; }
.visitor-float .text small { font-size: 10px; opacity: 0.9; text-transform: uppercase; letter-spacing: 1px; }
.visitor-float .text strong { font-size: 18px; font-weight: bold; }


/* --- FOTO KEPALA SEKOLAH (BIAR GANTENG & TIDAK GEPENG) --- */
.sambutan-section { padding: 60px 0; }
.sambutan-card { display: flex; align-items: center; gap: 40px; background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.05); }
.sambutan-img { flex-shrink: 0; }
.sambutan-img img { width: 280px; height: 350px; object-fit: cover; object-position: top center; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); border: 5px solid #fff; transition: transform 0.3s ease; }
.sambutan-img img:hover { transform: scale(1.02) rotate(1deg); }
.sambutan-text { flex-grow: 1; }

@media (max-width: 900px) {
    .sambutan-card { flex-direction: column; text-align: center; padding: 30px 20px; gap: 25px; }
    .sambutan-img { margin: 0 auto; width: 100%; display: flex; justify-content: center; }
    .sambutan-img img { width: 200px; height: 250px; max-width: none; border-radius: 20px 5px 20px 5px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
    .sambutan-text h3 { font-size: 1.2rem; }
    .sambutan-text h4 { font-size: 1.5rem; margin-top: 5px; }
}

/* --- CSS LAINNYA --- */
.quick-menu-section { padding: 60px 0; position: relative; z-index: 10; }
.quick-menu-grid { display: grid; gap: 30px; }
.three-cols-centered { grid-template-columns: repeat(3, 1fr); max-width: 1100px; margin: 0 auto; }
.quick-card { background: #fff; border-radius: 20px; padding: 40px 20px; text-align: center; text-decoration: none; color: #444; position: relative; overflow: hidden; border: 1px solid #f0f0f0; box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); display: flex; flex-direction: column; justify-content: center; }
.quick-card:hover { transform: translateY(-15px); box-shadow: 0 25px 50px rgba(0,0,0,0.1); border-color: transparent; }
.quick-card .icon-circle { width: 80px; height: 80px; margin: 0 auto 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: #fff; transition: transform 0.5s ease; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
.quick-card:hover .icon-circle { transform: scale(1.1) rotate(10deg); }
.quick-card h3 { font-size: 1.4rem; font-weight: 700; margin-bottom: 10px; color: #2c3e50; }
.quick-card p { font-size: 0.95rem; color: #888; margin-bottom: 25px; line-height: 1.6; }
.btn-action { display: inline-block; padding: 10px 25px; border-radius: 50px; background: #f4f6f9; color: #555; font-weight: 600; font-size: 0.9rem; transition: 0.3s; }
.quick-card:hover .btn-action { color: #fff; padding-left: 35px; }
.card-galeri .icon-circle { background: linear-gradient(135deg, #FF9966, #FF5E62); box-shadow: 0 10px 20px rgba(255, 94, 98, 0.3); }
.card-galeri:hover .btn-action { background: linear-gradient(135deg, #FF9966, #FF5E62); box-shadow: 0 5px 15px rgba(255, 94, 98, 0.4); }
.card-prestasi .icon-circle { background: linear-gradient(135deg, #F2994A, #F2C94C); box-shadow: 0 10px 20px rgba(242, 201, 76, 0.3); }
.card-prestasi:hover .btn-action { background: linear-gradient(135deg, #F2994A, #F2C94C); box-shadow: 0 5px 15px rgba(242, 201, 76, 0.4); }
.card-fasilitas .icon-circle { background: linear-gradient(135deg, #11998e, #38ef7d); box-shadow: 0 10px 20px rgba(56, 239, 125, 0.3); }
.card-fasilitas:hover .btn-action { background: linear-gradient(135deg, #11998e, #38ef7d); box-shadow: 0 5px 15px rgba(56, 239, 125, 0.4); }
.wa-wrapper { display: flex; justify-content: center; }
.btn-wa-fancy { display: inline-flex; align-items: center; gap: 15px; background: linear-gradient(45deg, #25D366, #128C7E); color: #fff !important; text-decoration: none; padding: 12px 30px 12px 12px; border-radius: 50px; font-weight: 700; font-size: 1rem; box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3); transition: all 0.3s ease; border: 2px solid rgba(255,255,255,0.2); }
.wa-icon-box { width: 40px; height: 40px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #25D366; font-size: 20px; transition: 0.3s; }
.btn-wa-fancy:hover { transform: translateY(-5px) scale(1.02); box-shadow: 0 15px 30px rgba(37, 211, 102, 0.5); filter: brightness(1.1); }
.btn-wa-fancy:hover .wa-icon-box { transform: rotate(360deg); }
@media (max-width: 900px) {
    .three-cols-centered { grid-template-columns: 1fr; padding: 0 20px; }
    .quick-card { padding: 30px; margin-bottom: 15px; }
    .btn-wa-fancy { width: 100%; justify-content: center; }
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Slider
        const slides = document.querySelectorAll('.slide-item');
        let currentSlide = 0;
        const slideInterval = 3000;
        function nextSlide() {
            if (slides.length > 0) {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }
        }
        if (slides.length > 0) setInterval(nextSlide, slideInterval);

        // Scroll Reveal
        const reveals = document.querySelectorAll('.reveal');
        const windowHeight = window.innerHeight;
        function checkReveal() {
            reveals.forEach(reveal => {
                const elementTop = reveal.getBoundingClientRect().top;
                const elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) {
                    reveal.classList.add('active');
                }
            });
        }
        window.addEventListener('scroll', checkReveal);
        checkReveal();

        // Counter Animation
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const inc = target / 100;
            const updateCount = () => {
                const count = +counter.innerText;
                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 30);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });

        // Form Alert
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('pesan') === 'sukses') {
            alert("✅ Pesan berhasil dikirim!\nTerima kasih telah menghubungi kami.");
            const newUrl = window.location.pathname;
            window.history.replaceState(null, null, newUrl);
        }
    });
</script>

<?php include 'footer.php'; ?>