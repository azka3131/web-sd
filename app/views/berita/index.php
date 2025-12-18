<?php include '../app/views/header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container" style="padding: 50px 0;">

    <div class="section-header" style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.5em; color: #3F4C52; font-weight: 800;">Jelajahi Berita</h1>
        <p style="color: #888;">Temukan informasi kegiatan sekolah terbaru di sini.</p>
        <div style="width: 80px; height: 4px; background: #4FB6C7; margin: 25px auto; border-radius: 2px;"></div>
    </div>

    <div class="search-wrapper">
        <form action="/kp-sd2-dukuhbenda/public/berita" method="GET" class="modern-search-bar">
            
            <div class="search-group text-group">
                <div class="icon-box">
                    <i class="fas fa-search"></i>
                </div>
                <div class="input-box">
                    <label>Kata Kunci</label>
                    <input type="text" name="q" placeholder="Contoh: Lomba, Juara..." 
                           value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" autocomplete="off">
                </div>
            </div>

            <div class="search-divider"></div>

            <div class="search-group date-group">
                <div class="icon-box">
                    <i class="far fa-calendar-alt"></i>
                </div>
                <div class="input-box">
                    <label>Tanggal</label>
                    <input type="date" name="date" 
                           value="<?= isset($_GET['date']) ? htmlspecialchars($_GET['date']) : '' ?>">
                </div>
            </div>

            <button type="submit" class="search-submit-btn">
                Cari
            </button>

        </form>

        <?php if((isset($_GET['q']) && $_GET['q'] != '') || (isset($_GET['date']) && $_GET['date'] != '')): ?>
            <div style="text-align: center; margin-top: 15px;">
                <a href="/kp-sd2-dukuhbenda/public/berita" class="reset-link">
                    <i class="fas fa-times-circle"></i> Hapus Filter Pencarian
                </a>
            </div>
        <?php endif; ?>
    </div>
    <?php if (empty($data)): ?>
        
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-search-minus"></i>
            </div>
            <h3>Oops, Berita tidak ditemukan!</h3>
            <p>Sepertinya tidak ada berita dengan kata kunci atau tanggal tersebut.</p>
            <a href="/kp-sd2-dukuhbenda/public/berita" class="btn-back-all">Lihat Semua Berita</a>
        </div>

    <?php else: ?>

        <div class="grid-container">
            <?php foreach ($data as $b) : ?>
                <div class="card-item">
                    
                    <div class="img-wrapper">
                        <?php if(!empty($b['gambar'])): ?>
                            <img src="/kp-sd2-dukuhbenda/public/assets/img/berita/<?= $b['gambar']; ?>" alt="<?= $b['judul']; ?>">
                        <?php else: ?>
                            <img src="https://source.unsplash.com/random/400x250?school" alt="Berita Sekolah">
                        <?php endif; ?>
                        
                        <div class="date-badge">
                            <span class="d-day"><?= date('d', strtotime($b['tanggal'])); ?></span>
                            <span class="d-month"><?= date('M', strtotime($b['tanggal'])); ?></span>
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="card-title"><?= $b['judul']; ?></h3>
                        <p class="card-desc"><?= substr(strip_tags($b['isi']), 0, 90) . "..."; ?></p>
                        
                        <a href="/kp-sd2-dukuhbenda/public/berita/detail?id=<?= $b['id']; ?>" class="btn-read">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

</div>

<style>
    /* Wrapper Utama Search */
    .search-wrapper {
        max-width: 800px;
        margin: 0 auto 60px auto;
        position: relative;
    }

    /* Bar Kapsul Putih */
    .modern-search-bar {
        display: flex;
        align-items: center;
        background: #ffffff;
        padding: 10px;
        border-radius: 50px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08); /* Bayangan lembut */
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .modern-search-bar:hover, .modern-search-bar:focus-within {
        box-shadow: 0 15px 50px rgba(79, 182, 199, 0.15); /* Glow tosca saat hover */
        border-color: #4FB6C7;
        transform: translateY(-2px);
    }

    /* Group Input (Kiri & Kanan) */
    .search-group {
        display: flex;
        align-items: center;
        flex: 1;
        padding: 5px 15px;
        position: relative;
    }

    .icon-box {
        font-size: 1.2rem;
        color: #4FB6C7; /* Warna Ikon Tosca */
        margin-right: 15px;
        display: flex;
        align-items: center;
    }

    .input-box {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .input-box label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #aaa;
        margin-bottom: 2px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-box input {
        border: none;
        outline: none;
        width: 100%;
        font-size: 1rem;
        color: #333;
        font-weight: 600;
        background: transparent;
        padding: 0;
    }
    
    /* Styling khusus date picker agar ikon bawaan hilang/rapi */
    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0; /* Sembunyikan ikon bawaan jelek, kita pakai ikon FontAwesome di kiri */
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    /* Garis Pemisah Vertikal */
    .search-divider {
        width: 1px;
        height: 40px;
        background-color: #e0e0e0;
        margin: 0 5px;
    }

    /* Tombol Cari Bulat Besar */
    .search-submit-btn {
        background: #4FB6C7;
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(79, 182, 199, 0.4);
        margin-left: 10px;
    }

    .search-submit-btn:hover {
        background: #38a3b5;
        transform: scale(1.05);
    }

    /* Reset Link */
    .reset-link {
        color: #ff6b6b;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: 0.3s;
    }
    .reset-link:hover { color: #d63031; text-decoration: underline; }


    /* === STYLE UNTUK GRID (SAMA SEPERTI SEBELUMNYA) === */
    .grid-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; }
    .card-item { background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid #f0f0f0; position: relative; top: 0; display:flex; flex-direction:column;}
    .card-item:hover { top: -10px; box-shadow: 0 20px 40px rgba(79, 182, 199, 0.15); border-color: #4FB6C7; }
    
    .img-wrapper { height: 200px; overflow: hidden; position: relative; }
    .img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .card-item:hover .img-wrapper img { transform: scale(1.1); }
    
    .date-badge {
        position: absolute; top: 15px; left: 15px;
        background: #fff; color: #3F4C52;
        padding: 8px 15px; border-radius: 12px;
        text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        z-index: 2;
    }
    .d-day { font-weight:800; font-size:1.4em; display:block; line-height: 1; color: #4FB6C7; }
    .d-month { font-size:0.75em; text-transform:uppercase; font-weight: 700; color: #aaa; }

    .card-content { padding: 25px; flex-grow:1; display:flex; flex-direction:column; }
    .card-title { color: #3F4C52; font-size: 1.3em; font-weight: 700; margin-bottom: 10px; line-height:1.4; }
    .card-desc { color: #7f8c8d; margin-bottom: 20px; flex-grow:1; font-size: 0.95rem; line-height: 1.6; }
    
    .btn-read {
        text-decoration: none; color: #4FB6C7; font-weight: 700; 
        display: inline-flex; align-items: center; gap: 5px; transition: 0.3s;
        margin-top: auto; /* Dorong ke bawah */
    }
    .btn-read:hover { gap: 10px; color: #2c3e50; }

    /* Empty State */
    .empty-state { text-align: center; padding: 60px 20px; color: #888; }
    .empty-icon { font-size: 4em; color: #eee; margin-bottom: 20px; }
    .btn-back-all {
        display: inline-block; margin-top: 20px; padding: 10px 25px;
        background: #3F4C52; color: white; text-decoration: none;
        border-radius: 30px; font-weight: bold; transition: 0.3s;
    }
    .btn-back-all:hover { background: #2c3e50; transform: translateY(-2px); }

    /* Responsive untuk HP */
    @media (max-width: 768px) {
        .modern-search-bar { flex-direction: column; border-radius: 20px; padding: 20px; gap: 15px; }
        .search-divider { display: none; }
        .search-group { width: 100%; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .search-submit-btn { width: 100%; margin-left: 0; margin-top: 10px; }
    }
</style>

<?php include '../app/views/footer.php'; ?>