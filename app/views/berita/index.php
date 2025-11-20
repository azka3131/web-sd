<?php include '../app/views/header.php'; ?>

<h1>Daftar Berita</h1>

<div class="berita-list">
    <?php foreach ($data as $b) : ?>
        <div class="berita-card">
            <h3><?= $b['judul']; ?></h3>
            <small><?= $b['tanggal']; ?></small>
            <p><?= substr($b['isi'], 0, 100) . "..."; ?></p>
            <a href="/kp-sd2-dukuhbenda/public/berita/detail?id=<?= $b['id']; ?>">Baca selengkapnya →</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include '../app/views/footer.php'; ?>
