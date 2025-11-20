<?php include 'header.php'; ?>

<h1>Data Guru</h1>

<div class="guru-grid">
    <?php foreach ($data as $g) : ?>
        <div class="guru-card">
            <img src="/kp-sd2-dukuhbenda/public/assets/img/<?= $g['foto'] ?: 'default.png'; ?>" alt="<?= $g['nama']; ?>">
            <h3><?= $g['nama']; ?></h3>
            <p><?= $g['jabatan']; ?></p>
            <small><?= $g['pendidikan']; ?></small>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>
