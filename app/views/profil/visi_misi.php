<?php include __DIR__ . '/../../views/header.php'; ?>

<div class="container">
    <h1>Visi dan Misi Sekolah</h1>

    <div class="content-box">
        <div class="visi-section" style="margin-bottom: 30px;">
            <h3>Visi</h3>
            <p><?= !empty($data['visi']) ? nl2br($data['visi']) : 'Belum ada data visi.'; ?></p>
        </div>

        <div class="misi-section">
            <h3>Misi</h3>
            <p><?= !empty($data['misi']) ? nl2br($data['misi']) : 'Belum ada data misi.'; ?></p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../views/footer.php'; ?>