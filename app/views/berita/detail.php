<?php include '../app/views/header.php'; ?>

<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    
    <h1 style="text-align: left; margin-bottom: 10px;"><?= $detail['judul']; ?></h1>
    
    <small style="color: #666; display: block; margin-bottom: 30px;">
        <i class="fas fa-calendar-alt"></i> Diposting pada: <?= date('d F Y', strtotime($detail['tanggal'])); ?>
    </small>

    <?php if (!empty($detail['gambar'])) : ?>
        <img src="/kp-sd2-dukuhbenda/public/assets/img/berita/<?= $detail['gambar']; ?>" 
             alt="<?= $detail['judul']; ?>" 
             style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
    <?php endif; ?>

    <div class="berita-content-full" style="line-height: 1.8; font-size: 1.1rem; color: #444; text-align: justify;">
        <?= nl2br($detail['isi']); ?>
    </div>

    <a href="/kp-sd2-dukuhbenda/public/berita" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Berita
    </a>

</div>

<?php include '../app/views/footer.php'; ?>