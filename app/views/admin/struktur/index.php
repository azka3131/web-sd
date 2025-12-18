<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Struktur Organisasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Global Style */
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f6f9; color: #333; padding: 30px; }
        .main-wrapper { max-width: 1200px; margin: 0 auto; }

        /* Header */
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .page-title h1 { font-size: 28px; color: #2c3e50; margin: 0; font-weight: 800; }
        .back-link { color: #4FB6C7; text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 5px; }
        .btn-add { background-color: #4FB6C7; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: bold; display: inline-flex; gap: 8px; box-shadow: 0 4px 15px rgba(79, 182, 199, 0.4); transition: 0.3s; }
        .btn-add:hover { background-color: #3da0b0; transform: translateY(-2px); }

        /* === SECTIONS (PEMISAH ANTAR LEVEL) === */
        .org-section { margin-bottom: 50px; position: relative; }
        .section-title { text-align: center; margin-bottom: 20px; color: #aaa; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 15px; }
        .section-title::before, .section-title::after { content: ""; height: 1px; background: #e0e0e0; width: 50px; }
        
        /* === GRID LAYOUTS === */
        
        /* Level 1: Pimpinan (Flexbox Center) */
        .leaders-row {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        /* Level 2 & 3: Grid Biasa */
        .grid-regular {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 30px;
        }

        /* === CARD STYLE === */
        .org-card {
            background: white; border-radius: 15px; overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;
            display: flex; flex-direction: column; transition: 0.3s;
        }
        .org-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(79, 182, 199, 0.15); border-color: #4FB6C7; }

        .card-body { padding: 30px 20px; text-align: center; flex-grow: 1; }
        
        .img-wrapper { width: 110px; height: 110px; margin: 0 auto 15px auto; border-radius: 50%; padding: 4px; border: 2px dashed #e0e0e0; }
        .img-wrapper img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }

        .card-name { font-size: 1.1em; font-weight: 700; color: #2c3e50; margin: 0 0 5px 0; }
        
        /* Warna Badge Berbeda Tiap Level */
        .role-badge { display: inline-block; padding: 5px 15px; border-radius: 20px; font-size: 0.8em; font-weight: 700; }
        .role-pimpinan { background: #e3f2fd; color: #1565c0; } /* Biru Tua */
        .role-guru { background: #e8f5e9; color: #2e7d32; } /* Hijau */
        .role-staff { background: #fff3e0; color: #ef6c00; } /* Oranye */

        /* Footer Aksi */
        .card-footer { display: flex; border-top: 1px solid #f0f0f0; }
        .action-btn { flex: 1; padding: 12px 0; text-align: center; text-decoration: none; font-size: 13px; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 6px; transition: 0.2s; }
        .btn-edit { background: #fff; color: #f1c40f; border-right: 1px solid #f0f0f0; }
        .btn-edit:hover { background: #fff9db; color: #f39c12; }
        .btn-delete { background: #fff; color: #e74c3c; }
        .btn-delete:hover { background: #fee2e2; color: #c0392b; }

        /* Garis Konektor Visual (Opsional) */
        .connector-vertical { width: 2px; height: 30px; background: #ddd; margin: 0 auto; margin-bottom: 20px; }
    </style>
</head>
<body>

<?php
// === LOGIC PHP: MEMISAHKAN KELOMPOK ===
$pimpinan = [];
$guru = [];
$staff = [];
$siswa = []; // Jika ada data siswa

if (!empty($data)) {
    foreach ($data as $s) {
        $jabatan = strtolower($s['jabatan']);
        
        // Cek Kata Kunci Jabatan
        if (strpos($jabatan, 'kepala sekolah') !== false || strpos($jabatan, 'komite') !== false) {
            $pimpinan[] = $s;
        } elseif (strpos($jabatan, 'guru') !== false) {
            $guru[] = $s;
        } elseif (strpos($jabatan, 'siswa') !== false) { 
            // Opsional: jika ada data siswa masuk sini
            $siswa[] = $s;
        } else {
            // Sisanya masuk Staff (TU, Penjaga, dll)
            $staff[] = $s;
        }
    }
}
?>

<div class="main-wrapper">
    
    <div class="page-header">
        <div>
            <h1>Kelola Struktur Organisasi</h1>
            <a href="<?= BASEURL ?>/admin/dashboard" class="back-link">&larr; Dashboard</a>
        </div>
        <a href="<?= BASEURL ?>/admin/struktur/create" class="btn-add"><i class="fas fa-plus"></i> Tambah</a>
    </div>

    <?php if (!empty($pimpinan)): ?>
        <div class="org-section">
            <div class="section-title">Pimpinan Sekolah</div>
            <div class="leaders-row">
                <?php foreach ($pimpinan as $p): ?>
                    <div class="org-card" style="width: 280px;"> <div class="card-body">
                            <div class="img-wrapper" style="border-color: #4FB6C7;">
                                <img src="<?= BASEURL ?>/assets/img/struktur/<?= $p['foto'] ?: 'default.png'; ?>">
                            </div>
                            <h3 class="card-name"><?= $p['nama']; ?></h3>
                            <span class="role-badge role-pimpinan"><?= $p['jabatan']; ?></span>
                        </div>
                        <div class="card-footer">
                            <a href="<?= BASEURL ?>/admin/struktur/edit?id=<?= $p['id']; ?>" class="action-btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= BASEURL ?>/admin/struktur/delete?id=<?= $p['id']; ?>" class="action-btn btn-delete" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="connector-vertical"></div>
        </div>
    <?php endif; ?>

    <?php if (!empty($guru)): ?>
        <div class="org-section">
            <div class="section-title">Dewan Guru</div>
            <div class="grid-regular">
                <?php foreach ($guru as $g): ?>
                    <div class="org-card">
                        <div class="card-body">
                            <div class="img-wrapper">
                                <img src="<?= BASEURL ?>/assets/img/struktur/<?= $g['foto'] ?: 'default.png'; ?>">
                            </div>
                            <h3 class="card-name"><?= $g['nama']; ?></h3>
                            <span class="role-badge role-guru"><?= $g['jabatan']; ?></span>
                        </div>
                        <div class="card-footer">
                            <a href="<?= BASEURL ?>/admin/struktur/edit?id=<?= $g['id']; ?>" class="action-btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= BASEURL ?>/admin/struktur/delete?id=<?= $g['id']; ?>" class="action-btn btn-delete" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="connector-vertical" style="margin-top: 20px;"></div>
        </div>
    <?php endif; ?>

    <?php if (!empty($staff)): ?>
        <div class="org-section">
            <div class="section-title">Staff & Karyawan</div>
            <div class="grid-regular">
                <?php foreach ($staff as $s): ?>
                    <div class="org-card">
                        <div class="card-body">
                            <div class="img-wrapper">
                                <img src="<?= BASEURL ?>/assets/img/struktur/<?= $s['foto'] ?: 'default.png'; ?>">
                            </div>
                            <h3 class="card-name"><?= $s['nama']; ?></h3>
                            <span class="role-badge role-staff"><?= $s['jabatan']; ?></span>
                        </div>
                        <div class="card-footer">
                            <a href="<?= BASEURL ?>/admin/struktur/edit?id=<?= $s['id']; ?>" class="action-btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= BASEURL ?>/admin/struktur/delete?id=<?= $s['id']; ?>" class="action-btn btn-delete" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (empty($data)): ?>
        <div style="text-align: center; padding: 50px; color: #999;">
            <i class="fas fa-sitemap" style="font-size: 3em; margin-bottom: 20px;"></i>
            <p>Belum ada data struktur organisasi.</p>
        </div>
    <?php endif; ?>

</div>

</body>
</html>