<?php include 'header.php'; ?>

<div class="container">
    
    <h1 class="section-title">Prestasi Siswa</h1>
    <p class="section-subtitle">Daftar pencapaian gemilang siswa-siswi SD Negeri 2 Dukuhbenda.</p>

    <?php if (empty($data)): ?>
        <div class="empty-state">
            <h3 style="font-size: 3rem;">🏆</h3>
            <h3>Belum Ada Data Prestasi</h3>
            <p>Data akan segera diupdate oleh admin.</p>
        </div>
    <?php else: ?>

        <div class="prestasi-grid">
            <?php foreach ($data as $p) : ?>
                <div class="prestasi-card">
                    
                    <div class="prestasi-img-wrapper">
                        <?php 
                            // Logika Warna Badge
                            $badgeColor = '#ffc107'; 
                            $juaraText = strtolower($p['jenis_juara']);
                            if (strpos($juaraText, '2') !== false || strpos($juaraText, 'perak') !== false) $badgeColor = '#C0C0C0'; 
                            elseif (strpos($juaraText, '3') !== false || strpos($juaraText, 'perunggu') !== false) $badgeColor = '#cd7f32'; 
                        ?>
                        
                        <span class="badge-juara" style="background-color: <?= $badgeColor ?>;">
                            <?= htmlspecialchars($p['jenis_juara']); ?>
                        </span>

                        <img src="/kp-sd2-dukuhbenda/public/assets/img/prestasi/<?= $p['foto'] ?: 'default.png'; ?>" 
                             alt="<?= htmlspecialchars($p['judul']); ?>">
                    </div>

                    <div class="prestasi-content">
                        <h3><?= htmlspecialchars($p['judul']); ?></h3>
                        
                        <div class="prestasi-meta">
                            <div style="margin-bottom: 5px;">
                                👤 <strong><?= htmlspecialchars($p['nama_siswa']); ?></strong>
                            </div>
                            
                            <div style="font-size: 0.85rem; color: #777;">
                                📅 <?= date('d F Y', strtotime($p['tanggal'])); ?>
                            </div>

                            <div style="font-size: 0.85rem; color: #777;">
                                📍 <?= htmlspecialchars($p['tingkat']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>