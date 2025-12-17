<?php include '../app/views/header.php'; ?>

<div class="container" style="padding: 50px 0;">

    <div class="section-header" style="text-align: center; margin-bottom: 50px;">
        <h1 style="font-size: 2.5em; color: #3F4C52; font-weight: 800;">Berita</h1>
        <p style="color: #888;">Informasi terkini seputar kegiatan akademik dan non-akademik.</p>
        <div style="width: 80px; height: 4px; background: #4FB6C7; margin: 25px auto; border-radius: 2px;"></div>
    </div>

    <div class="grid-container">
        <?php foreach ($data as $b) : ?>
            <div class="card-item">
                
                <div class="img-wrapper">
                    <?php if(!empty($b['gambar'])): ?>
                        <img src="/kp-sd2-dukuhbenda/public/assets/img/berita/<?= $b['gambar']; ?>" alt="<?= $b['judul']; ?>">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/400x250?text=Berita" alt="No Image">
                    <?php endif; ?>
                    
                    <div class="date-badge">
                        <span style="font-weight:800; font-size:1.2em; display:block;"><?= date('d', strtotime($b['tanggal'])); ?></span>
                        <span style="font-size:0.8em; text-transform:uppercase;"><?= date('M', strtotime($b['tanggal'])); ?></span>
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

</div>

<style>
    /* Gunakan Style yang sama + Tambahan Badge */
    .grid-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; }
    .card-item { background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid #f0f0f0; position: relative; top: 0; display:flex; flex-direction:column;}
    .card-item:hover { top: -10px; box-shadow: 0 20px 40px rgba(79, 182, 199, 0.15); border-color: #4FB6C7; }
    .img-wrapper { height: 200px; overflow: hidden; position: relative; }
    .img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .card-item:hover .img-wrapper img { transform: scale(1.1); }
    
    /* Badge Tanggal Pojok Kiri */
    .date-badge {
        position: absolute; top: 15px; left: 15px;
        background: #fff; color: #3F4C52;
        padding: 5px 12px; border-radius: 8px;
        text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        z-index: 2;
    }

    .card-content { padding: 25px; flex-grow:1; display:flex; flex-direction:column; }
    .card-title { color: #3F4C52; font-size: 1.3em; font-weight: 700; margin-bottom: 10px; line-height:1.4; }
    .card-desc { color: #7f8c8d; margin-bottom: 20px; flex-grow:1; }
    
    .btn-read {
        text-decoration: none; color: #4FB6C7; font-weight: 700; 
        display: inline-flex; align-items: center; gap: 5px; transition: 0.3s;
    }
    .btn-read:hover { gap: 10px; color: #2c3e50; }
</style>

<?php include '../app/views/footer.php'; ?>