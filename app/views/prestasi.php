<?php include 'header.php'; ?>

<div class="page-header-section" style="background: #4FB6C7; padding: 60px 0; color: white; text-align: center; margin-bottom: 40px;">
    <div class="container">
        <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;">Prestasi Siswa</h1>
        <p style="opacity: 0.9; font-size: 1.1rem;">Daftar pencapaian gemilang siswa-siswi SD Negeri 2 Dukuhbenda</p>
    </div>
</div>

<div class="container">

    <div class="filter-container">
        <form action="" method="GET" class="filter-form">
            
            <div class="search-group">
                <input type="text" name="q" placeholder="Cari nama lomba atau siswa..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>

            <select name="tahun" onchange="this.form.submit()">
                <option value="">Semua Tahun</option>
                <?php 
                if(isset($listTahun)) {
                    foreach ($listTahun as $thn) : ?>
                        <option value="<?= $thn ?>" <?= (isset($_GET['tahun']) && $_GET['tahun'] == $thn) ? 'selected' : '' ?>>
                            Tahun <?= $thn ?>
                        </option>
                    <?php endforeach; 
                } ?>
            </select>

            <select name="tingkat" onchange="this.form.submit()">
                <option value="">Semua Tingkat</option>
                <?php 
                if(isset($listTingkat)) {
                    foreach ($listTingkat as $tkt) : ?>
                        <option value="<?= $tkt ?>" <?= (isset($_GET['tingkat']) && $_GET['tingkat'] == $tkt) ? 'selected' : '' ?>>
                            <?= $tkt ?>
                        </option>
                    <?php endforeach;
                } ?>
            </select>
            
            <?php if(!empty($_GET['q']) || !empty($_GET['tahun']) || !empty($_GET['tingkat'])): ?>
                <a href="<?= BASEURL ?>/prestasi" class="btn-reset">Reset Filter</a>
            <?php endif; ?>

        </form>
    </div>

    <?php if (empty($data)): ?>
        <div class="empty-state">
            <h3 style="font-size: 3rem;">🏆</h3>
            <h3>Data Prestasi Tidak Ditemukan</h3>
            <p>Coba gunakan kata kunci atau filter yang berbeda.</p>
        </div>
    <?php else: ?>

        <div class="prestasi-grid">
            <?php foreach ($data as $p) : ?>
                <div class="prestasi-card">
                    
                    <div class="prestasi-img-wrapper">
                        <?php 
                            // Logika Warna Badge
                            $badgeColor = '#ffc107'; // Default Emas
                            $juaraText = strtolower($p['jenis_juara']);
                            if (strpos($juaraText, '2') !== false || strpos($juaraText, 'perak') !== false) $badgeColor = '#C0C0C0'; 
                            elseif (strpos($juaraText, '3') !== false || strpos($juaraText, 'perunggu') !== false) $badgeColor = '#cd7f32'; 
                        ?>
                        
                        <span class="badge-juara" style="background-color: <?= $badgeColor ?>;">
                            <i class="fas fa-medal"></i> <?= htmlspecialchars($p['jenis_juara']); ?>
                        </span>

                        <img src="<?= BASEURL ?>/assets/img/prestasi/<?= $p['foto'] ?: 'default.png'; ?>" 
                             alt="<?= htmlspecialchars($p['judul']); ?>">
                    </div>

                    <div class="prestasi-content">
                        <div class="prestasi-meta-top">
                             <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($p['tanggal'])); ?>
                        </div>

                        <h3><?= htmlspecialchars($p['judul']); ?></h3>
                        
                        <div class="prestasi-meta">
                            <div class="meta-item">
                                <i class="fas fa-user-graduate" style="color: #4FB6C7;"></i> 
                                <strong><?= htmlspecialchars($p['nama_siswa']); ?></strong>
                            </div>
                            
                            <div class="meta-item" style="color: #777;">
                                <i class="fas fa-map-marker-alt" style="color: #dc3545;"></i> 
                                <?= htmlspecialchars($p['tingkat']); ?>
                            </div>

                            <p class="deskripsi-singkat">
                                <?= substr($p['deskripsi'], 0, 80) . '...'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<style>
/* --- STYLE SEARCH & FILTER --- */
.filter-container {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    margin-bottom: 50px;
    margin-top: -80px; /* Efek menumpuk ke header */
    position: relative;
    z-index: 10;
}

.filter-form {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
}

.search-group {
    flex-grow: 1;
    position: relative;
    min-width: 250px;
}

.search-group input {
    width: 100%;
    padding: 12px 45px 12px 15px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
    transition: 0.3s;
}

/* Warna Focus Input diganti jadi #4FB6C7 */
.search-group input:focus {
    border-color: #4FB6C7;
    outline: none;
    box-shadow: 0 0 0 3px rgba(79, 182, 199, 0.1);
}

/* Warna Tombol Search diganti jadi #4FB6C7 */
.search-group button {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #4FB6C7;
    cursor: pointer;
    padding: 10px;
}

.filter-form select {
    padding: 12px 15px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    cursor: pointer;
    min-width: 150px;
    color: #555;
}

.btn-reset {
    text-decoration: none;
    color: #dc3545;
    font-weight: 600;
    font-size: 14px;
    padding: 0 10px;
}

/* --- STYLE GRID KARTU --- */
.prestasi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.prestasi-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s, box-shadow 0.3s;
    border: 1px solid #f0f0f0;
    display: flex;
    flex-direction: column;
}

.prestasi-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.prestasi-img-wrapper {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.prestasi-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}

.prestasi-card:hover .prestasi-img-wrapper img {
    transform: scale(1.1);
}

.badge-juara {
    position: absolute;
    top: 15px;
    left: 15px;
    color: white;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    z-index: 2;
}

.prestasi-content {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.prestasi-meta-top {
    font-size: 13px;
    color: #999;
    margin-bottom: 10px;
}

.prestasi-content h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
    line-height: 1.4;
}

.prestasi-meta {
    margin-top: auto;
}

.meta-item {
    margin-bottom: 8px;
    font-size: 0.95rem;
    color: #555;
    display: flex;
    align-items: center;
    gap: 8px;
}

.deskripsi-singkat {
    font-size: 0.9rem;
    color: #888;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #f0f0f0;
    line-height: 1.6;
}

/* --- EMPTY STATE --- */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #888;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* --- RESPONSIVE --- */
@media (max-width: 768px) {
    .filter-container { margin-top: 0; }
    .filter-form { flex-direction: column; align-items: stretch; }
    .page-header-section { padding: 40px 0; margin-bottom: 20px; }
}
</style>

<?php include 'footer.php'; ?>