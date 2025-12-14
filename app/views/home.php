<?php include 'header.php'; ?>

<?php
// Data Dummy / Fallback
$foto_def = "/kp-sd2-dukuhbenda/public/assets/img/default-user.png";
$foto_kepsek = $foto_def;
$nama_kepsek = "Kepala Sekolah";
$jabatan_kepsek = "Kepala Sekolah";
$sambutan_kepsek = "Assalamu'alaikum Warahmatullahi Wabarakatuh.\n\nSelamat datang di website resmi SD Negeri Dukuhbenda 02. Kami berkomitmen mencetak generasi cerdas dan berakhlak mulia.";

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
    <div class="slide-item active" style="background-image: url('/kp-sd2-dukuhbenda/public/assets/img/slider1.jpg');">
        <div class="slide-overlay">
            <img src="/kp-sd2-dukuhbenda/public/assets/img/logo.jpg" alt="Logo Sekolah" class="slide-logo-img">
            <div class="slide-text">
                <h1>SD NEGERI DUKUHBENDA 02</h1>
                <p>Membentuk Generasi Cerdas, Berkarakter, dan Berakhlak Mulia di Era Digital.</p>
            </div>
        </div>
    </div>
    <div class="slide-item" style="background-image: url('/kp-sd2-dukuhbenda/public/assets/img/slider2.jpg');">
        <div class="slide-overlay">
            <div class="slide-text">
                <h1>Fasilitas Lengkap</h1>
                <p>Menunjang kegiatan belajar mengajar dengan sarana terbaik dan lingkungan yang nyaman.</p>
            </div>
        </div>
    </div>
    <div class="slide-item" style="background-image: url('/kp-sd2-dukuhbenda/public/assets/img/slider3.jpg');">
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

<section id="sambutan" class="sambutan-section reveal">
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

<<section class="stats-section reveal">
    <div class="wave-top">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <i class="fas fa-user-graduate stat-icon"></i>
                <span class="stat-number" data-target="<?= $info['jumlah_siswa']; ?>">0</span>
                <span class="stat-label">Siswa</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-chalkboard-teacher stat-icon"></i>
                <span class="stat-number" data-target="<?= $info['jumlah_guru']; ?>">0</span>
                <span class="stat-label">Guru & Staf</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-school stat-icon"></i>
                <span class="stat-number" data-target="<?= $info['jumlah_rombel']; ?>">0</span>
                <span class="stat-label">Rombel</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-trophy stat-icon"></i>
                <span class="stat-number" data-target="<?= $info['jumlah_prestasi']; ?>">0</span>
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
                                <a href="/kp-sd2-dukuhbenda/public/berita/detail?id=<?= $b['id']; ?>">
                                    <?= substr($b['judul'], 0, 60); ?>...
                                </a>
                            </h3>
                            <a href="/kp-sd2-dukuhbenda/public/berita/detail?id=<?= $b['id']; ?>" class="read-more">Baca Selengkapnya →</a>
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
            <a href="/kp-sd2-dukuhbenda/public/berita" class="btn-teal">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<section class="contact-section reveal">
    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-form-side">
                <h2 class="contact-title">Hubungi Kami</h2>
                
                <form action="https://formsubmit.co/azkahehe22@gmail.com" method="POST">
                    <input type="hidden" name="_next" value="http://localhost/kp-sd2-dukuhbenda/public/?pesan=sukses">
                    <input type="hidden" name="_subject" value="Pesan Baru dari Website Sekolah">
                    <input type="hidden" name="_captcha" value="false">

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
                    
                    <p class="form-note">*NB: Anda tidak perlu login untuk mengirim pesan.</p>
                    
                    <button type="submit" class="btn-teal" style="width: 100%;">Kirim Pesan</button>
                </form>
            </div>

            <div class="contact-info-side">
                <h3 class="info-school-name">SD Negeri 2 Dukuhbenda</h3>
                <div class="info-details">
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Raya, Siketi Tengah, Dukuh Benda, Kec. Bumijawa</p>
                    <p><i class="fas fa-phone-alt"></i> (0283) 123456</p>
                    <p><i class="fas fa-envelope"></i> dukuhbenda02@gmail.com</p>
                </div>
                <div class="map-container-clean">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q=SDN+DUKUHBENDA+02,+Bumijawa&t=&z=15&ie=UTF8&iwloc=&output=embed">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. Slider Otomatis
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

        // 2. Animasi Scroll (Reveal)
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
        checkReveal(); // Trigger sekali saat load

        // 3. Animasi Angka Statistik
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

        // 4. Notifikasi Pesan Terkirim
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('pesan') === 'sukses') {
            alert("✅ Pesan berhasil dikirim!\nTerima kasih telah menghubungi kami.");
            const newUrl = window.location.pathname;
            window.history.replaceState(null, null, newUrl);
        }
    });
</script>