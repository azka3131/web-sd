<?php include __DIR__ . '/../header.php'; ?>

<div class="container">
    <div class="card-content" style="margin-top: 20px; padding: 30px; background: white; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 20px; color: #4FB6C7;">Sejarah Sekolah</h1>
        
        <div class="sejarah-text" style="line-height: 1.8; font-size: 16px; color: #444;">
            <p><?= !empty($data['sejarah']) ? nl2br($data['sejarah']) : 'Belum ada data sejarah yang ditulis.'; ?></p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>