<?php include 'header.php'; ?>

<div class="container" style="text-align: center;">
    <h1>Informasi PPDB</h1>
    <p>Berikut adalah informasi Penerimaan Peserta Didik Baru tahun ini.</p>
    
    <?php if (!empty($data['file_brosur'])): ?>
        <img src="/kp-sd2-dukuhbenda/public/assets/img/ppdb/<?= $data['file_brosur']; ?>" 
             alt="Brosur PPDB" 
             style="max-width: 100%; height: auto; border: 1px solid #ddd; margin-top: 20px;">
    <?php else: ?>
        <p>Belum ada informasi brosur.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>