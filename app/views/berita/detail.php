<?php include '../app/views/header.php'; ?>

<h1><?= $detail['judul']; ?></h1>
<small><?= $detail['tanggal']; ?></small>

<p><?= nl2br($detail['isi']); ?></p>

<a href="/kp-sd2-dukuhbenda/public/berita">← Kembali</a>

<?php include '../app/views/footer.php'; ?>
