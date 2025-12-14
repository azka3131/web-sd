<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($galeri) ? 'Edit Galeri' : 'Upload Galeri'; ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f6f9; padding: 40px; display: flex; justify-content: center; }
        .form-container { background: white; width: 100%; max-width: 600px; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        h2 { color: #3F4C52; margin-bottom: 25px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; color: #666; font-size: 14px; margin-bottom: 8px; font-weight: 600; }
        input[type="text"], textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; transition: 0.3s; }
        input[type="text"]:focus, textarea:focus { border-color: #4FB6C7; outline: none; }
        input[type="file"] { width: 100%; padding: 10px; border: 1px dashed #ccc; border-radius: 8px; background: #fafafa; }
        .btn-submit { width: 100%; padding: 12px; background: #4FB6C7; color: white; border: none; border-radius: 50px; font-weight: bold; font-size: 16px; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        .btn-submit:hover { background: #3da0b0; }
        .btn-back { display: block; text-align: center; margin-top: 15px; color: #888; text-decoration: none; font-size: 14px; }
        .btn-back:hover { color: #333; }
        .preview-img { width: 100px; height: 70px; object-fit: cover; border-radius: 8px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?= isset($galeri) ? 'Edit Foto Kegiatan' : 'Upload Foto Kegiatan'; ?></h2>

    <form action="<?= isset($galeri) ? '/kp-sd2-dukuhbenda/public/admin/galeri/update' : '/kp-sd2-dukuhbenda/public/admin/galeri/simpan'; ?>" method="POST" enctype="multipart/form-data">
        
        <?php if(isset($galeri)): ?>
            <input type="hidden" name="id" value="<?= $galeri['id']; ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Judul Kegiatan</label>
            <input type="text" name="judul" value="<?= $galeri['judul'] ?? ''; ?>" placeholder="Contoh: Upacara Hari Senin" required>
        </div>

        <div class="form-group">
            <label>Foto Kegiatan</label>
            <?php if(isset($galeri) && $galeri['filename']): ?>
                <img src="/kp-sd2-dukuhbenda/public/assets/img/galeri/<?= $galeri['filename']; ?>" class="preview-img">
                <br><small style="color: #999;">Biarkan kosong jika tidak ingin mengubah foto</small>
            <?php endif; ?>
            
            <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg">
        </div>

        <div class="form-group">
            <label>Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" placeholder="Keterangan foto..."><?= $galeri['deskripsi'] ?? ''; ?></textarea>
        </div>

        <div class="form-group">
            <label>Link Google Drive (Opsional)</label>
            <input type="text" name="link_drive" value="<?= $galeri['link_drive'] ?? ''; ?>" placeholder="https://drive.google.com/...">
            <small style="color: #999; font-size: 12px;">Isi jika ada album foto lengkap di Google Drive.</small>
        </div>

        <button type="submit" class="btn-submit">Simpan Data</button>
        <a href="/kp-sd2-dukuhbenda/public/admin/galeri" class="btn-back">Batal & Kembali</a>
    </form>
</div>

</body>
</html>