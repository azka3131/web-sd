<!DOCTYPE html>
<html>
<head>
    <title>Form Berita</title>
    <link rel="stylesheet" href="/kp-sd2-dukuhbenda/public/assets/css/style.css">
    <style>
        body { padding: 30px; background: #f4f6f9; }
        .form-box { background: white; padding: 30px; border-radius: 10px; max-width: 800px; margin: auto; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { background: #4FB6C7; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #3da0b0; }
    </style>
</head>
<body>

<div class="form-box">
    <h2><?= isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru'; ?></h2>
    
    <form action="<?= isset($berita) ? '/kp-sd2-dukuhbenda/public/admin/berita/update' : '/kp-sd2-dukuhbenda/public/admin/berita/simpan'; ?>" method="POST" enctype="multipart/form-data">
        
        <?php if(isset($berita)): ?>
            <input type="hidden" name="id" value="<?= $berita['id']; ?>">
        <?php endif; ?>

        <label>Judul Berita</label>
        <input type="text" name="judul" value="<?= $berita['judul'] ?? ''; ?>" required>

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $berita['tanggal'] ?? date('Y-m-d'); ?>" required>

        <label>Gambar Utama</label>
        <?php if(isset($berita) && $berita['gambar']): ?>
            <br><img src="/kp-sd2-dukuhbenda/public/assets/img/berita/<?= $berita['gambar']; ?>" style="width: 100px; margin: 10px 0;">
            <p style="font-size: 12px; color: #666;">Biarkan kosong jika tidak ingin mengganti gambar.</p>
        <?php endif; ?>
        
        <input type="file" name="gambar" accept="image/png, image/jpeg, image/jpg">

        <label>Isi Berita</label>
        <textarea name="isi" rows="10" required><?= $berita['isi'] ?? ''; ?></textarea>

        <div style="margin-top: 20px;">
            <button type="submit">Simpan Berita</button>
            <a href="/kp-sd2-dukuhbenda/public/admin/berita" style="margin-left: 15px; color: #666; text-decoration: none;">Batal</a>
        </div>
    </form>
</div>

</body>
</html>