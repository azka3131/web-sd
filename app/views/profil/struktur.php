<?php include '../app/views/header.php'; ?>

<?php
// [FIX] Pengecekan agar fungsi tidak dideklarasikan ulang (Anti-Error)
if (!function_exists('getFoto')) {
    function getFoto($data) {
        if (isset($data['foto']) && !empty($data['foto'])) {
            return "/kp-sd2-dukuhbenda/public/assets/img/struktur/" . $data['foto'];
        }
        return "/kp-sd2-dukuhbenda/public/assets/img/default-user.png";
    }
}
?>

<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    
    <div class="profil-header">
        <h1>Struktur Organisasi</h1>
        <p>SD NEGERI DUKUHBENDA 02</p>
        <div class="line-bar-center"></div>
    </div>

    <div class="chart-container">
        
        <div class="chart-spine-lower"></div>

        <div class="chart-level pimpinan-level">
            <?php if (!empty($komite)): ?>
                <div class="node-card komite-card">
                    <img src="<?= getFoto($komite); ?>" alt="Komite">
                    <strong><?= $komite['nama']; ?></strong>
                    <span>Ketua Komite</span>
                </div>
            <?php endif; ?>

            <div class="connector-horizontal"></div>

            <div class="node-card kepsek-card">
                <img src="<?= getFoto($kepsek); ?>" alt="Kepsek">
                <strong><?= $kepsek['nama'] ?? '-'; ?></strong>
                <span>Kepala Sekolah</span>
            </div>
        </div>

        <div class="chart-level">
            <div class="chart-grid-wrapper">
                <span class="chart-label">DEWAN GURU</span>
                
                <div class="chart-grid">
                    <?php 
                        // Gabungkan Wali Kelas & Guru Mapel
                        $allTeachers = array_merge($waliKelas ?? [], $guruMapel ?? []);
                        if (!empty($allTeachers)): 
                            foreach ($allTeachers as $guru): 
                    ?>
                        <div class="node-card" style="width: 100%; border-top-color: #4FB6C7;">
                            <img src="<?= getFoto($guru); ?>" alt="<?= $guru['nama']; ?>">
                            <strong><?= $guru['nama']; ?></strong>
                            <span><?= $guru['jabatan']; ?></span>
                        </div>
                    <?php 
                            endforeach; 
                        else:
                    ?>
                        <p style="grid-column: 1/-1; color: #999;">Belum ada data guru.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if (!empty($staf)): ?>
        <div class="chart-level">
            <div class="chart-grid-wrapper" style="border-style: solid; border-color: #eef4fc; background: #fff;">
                <span class="chart-label" style="background: #6c757d;">STAF & TATA USAHA</span>
                
                <div class="chart-grid">
                    <?php foreach ($staf as $s): ?>
                        <div class="node-card" style="width: 100%; border-top-color: #6c757d;">
                            <img src="<?= getFoto($s); ?>" alt="<?= $s['nama']; ?>">
                            <strong><?= $s['nama']; ?></strong>
                            <span><?= $s['jabatan']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="chart-level" style="margin-bottom: 0;">
            <div class="siswa-box">SISWA - SISWI</div>
        </div>

    </div>
</div>

<?php include '../app/views/footer.php'; ?>