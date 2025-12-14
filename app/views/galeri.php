<?php include 'header.php'; ?>

<div class="container" style="padding: 60px 0;">

    <div class="section-header" style="text-align: center; margin-bottom: 70px;">
        <h1 style="font-size: 2.8em; color: #333; font-weight: 800; letter-spacing: -1px; margin-bottom: 15px;">
            Galeri Kegiatan
        </h1>
        <p style="color: #666; font-size: 1.1em; max-width: 600px; margin: 0 auto; line-height: 1.6;">
            Rekaman jejak aktivitas, prestasi, dan momen berharga keluarga besar SD Negeri 2 Dukuhbenda.
        </p>
        <div style="width: 60px; height: 5px; background: #0057b3; margin: 30px auto; border-radius: 50px;"></div>
    </div>

    <div class="gallery-container">
        <?php if(empty($data)): ?>
            <div class="empty-state">
                <div class="icon-box"><i class="fas fa-camera"></i></div>
                <h3>Belum ada dokumentasi</h3>
                <p>Dokumentasi kegiatan sekolah akan segera diunggah di sini.</p>
            </div>
        <?php else: ?>
            
            <?php foreach ($data as $foto) : ?>
                <div class="gallery-card">
                    <div class="gallery-thumb">
                        <?php if(!empty($foto['filename'])): ?>
                            <img src="/kp-sd2-dukuhbenda/public/assets/img/galeri/<?= $foto['filename']; ?>" alt="<?= $foto['judul']; ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/800x600?text=No+Image" alt="Placeholder">
                        <?php endif; ?>
                    </div>

                    <div class="gallery-content">
                        <h3 class="gallery-title"><?= $foto['judul']; ?></h3>
                        
                        <?php if($foto['deskripsi']): ?>
                            <div class="gallery-scroll-area">
                                <p class="gallery-desc">
                                    <?= nl2br($foto['deskripsi']); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($foto['link_drive'])): ?>
                            <div style="margin-top: auto; padding-top: 15px;">
                                <a href="<?= $foto['link_drive']; ?>" target="_blank" class="btn-album">
                                    <span>Lihat Album Lengkap</span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

</div>

<style>
    /* --- GRID SYSTEM (YANG DIUBAH) --- */
    .gallery-container {
        display: grid;
        /* Ubah 320px jadi 400px agar kartu lebih lebar */
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); 
        gap: 40px; /* Jarak antar kartu diperlebar sedikit */
        padding: 0 10px;
    }

    /* --- CARD STYLE --- */
    .gallery-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        display: flex;
        flex-direction: column;
        height: 100%; 
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 35px rgba(0, 87, 179, 0.15);
        border-color: #e0efff;
    }

    /* --- IMAGE WRAPPER (YANG DIUBAH) --- */
    .gallery-thumb {
        /* Ubah tinggi dari 220px jadi 300px agar foto besar & jelas */
        height: 300px; 
        width: 100%;
        overflow: hidden;
    }

    .gallery-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-thumb img {
        transform: scale(1.08);
    }

    /* --- CONTENT AREA --- */
    .gallery-content {
        padding: 30px; /* Padding diperbesar agar teks lebih lega */
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .gallery-title {
        font-size: 1.5rem; /* Font judul dibesarkan sedikit */
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    /* --- SCROLLABLE DESCRIPTION --- */
    .gallery-scroll-area {
        max-height: 120px;
        overflow-y: auto;
        margin-bottom: 20px;
        padding-right: 5px;
    }

    .gallery-scroll-area::-webkit-scrollbar { width: 4px; }
    .gallery-scroll-area::-webkit-scrollbar-track { background: #f1f1f1; }
    .gallery-scroll-area::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
    .gallery-scroll-area::-webkit-scrollbar-thumb:hover { background: #bbb; }

    .gallery-desc {
        font-size: 1rem; /* Font deskripsi diperjelas */
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    /* --- BUTTON STYLE --- */
    .btn-album {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 0; /* Tombol lebih tebal sedikit */
        width: 100%;
        background-color: #f4f9ff;
        color: #0057b3;
        font-weight: 600;
        font-size: 0.95rem;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .btn-album:hover {
        background-color: #0057b3;
        color: #fff;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px;
        background: #f8f9fa;
        border-radius: 15px;
        color: #888;
    }
    .icon-box { font-size: 40px; margin-bottom: 15px; color: #cbd5e0; }

    /* --- RESPONSIVE --- */
    @media (max-width: 768px) {
        /* Di HP tetap 1 kolom tapi gambarnya tinggi */
        .gallery-container { grid-template-columns: 1fr; } 
        .gallery-thumb { height: 250px; }
    }
</style>

<?php include 'footer.php'; ?>