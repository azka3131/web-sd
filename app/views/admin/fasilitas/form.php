<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Fasilitas - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* STYLE GLOBAL (Sama untuk semua form) */
        body { background-color: #f0f2f5; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; }
        .form-container { background: white; padding: 40px 50px; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); width: 100%; max-width: 800px; }
        .form-header { margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 20px; display: flex; justify-content: space-between; align-items: center; }
        .form-header h2 { margin: 0; color: #333; font-weight: 600; font-size: 24px; }
        .close-btn { color: #999; font-size: 20px; text-decoration: none; transition: 0.3s; }
        .close-btn:hover { color: #e74c3c; transform: rotate(90deg); }
        .form-group { margin-bottom: 25px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; font-size: 14px; }
        input[type="text"], textarea { width: 100%; padding: 14px 18px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 15px; font-family: inherit; background-color: #fcfcfc; box-sizing: border-box; transition: 0.3s; }
        input:focus, textarea:focus { background-color: #fff; border-color: #4FB6C7; box-shadow: 0 0 0 4px rgba(79, 182, 199, 0.15); outline: none; }
        
        .file-upload-box { border: 2px dashed #ddd; padding: 30px; text-align: center; border-radius: 10px; background: #fafafa; cursor: pointer; transition: 0.3s; position: relative; }
        .file-upload-box:hover { background: #f0f8ff; border-color: #4FB6C7; }
        .file-upload-box input[type="file"] { position: absolute; width: 100%; height: 100%; top: 0; left: 0; opacity: 0; cursor: pointer; }
        .upload-icon { font-size: 30px; color: #4FB6C7; margin-bottom: 10px; }
        
        .img-preview { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; background: #f9f9f9; padding: 10px; border-radius: 8px; border: 1px solid #eee; }
        .img-preview img { width: 80px; height: 60px; object-fit: cover; border-radius: 6px; }
        
        .form-actions { display: flex; gap: 15px; margin-top: 40px; }
        .btn { padding: 14px 30px; border-radius: 50px; font-weight: 600; font-size: 15px; cursor: pointer; text-decoration: none; text-align: center; transition: 0.3s; display: inline-flex; align-items: center; justify-content: center; gap: 8px; }
        .btn-save { background: #4FB6C7; color: white; border: none; flex: 2; box-shadow: 0 5px 15px rgba(79, 182, 199, 0.3); }
        .btn-save:hover { background: #3da0b0; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(79, 182, 199, 0.4); }
        .btn-cancel { background: white; color: #666; border: 1px solid #ddd; flex: 1; }
        .btn-cancel:hover { background: #f5f5f5; color: #333; }
        @media (max-width: 600px) { .form-container { padding: 25px; } .form-actions { flex-direction: column; } }
    </style>
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h2><?= isset($fasilitas) ? 'Edit Fasilitas' : 'Tambah Fasilitas'; ?></h2>
        <a href="<?= BASEURL ?>/admin/fasilitas" class="close-btn" title="Tutup"><i class="fas fa-times"></i></a>
    </div>

    <form action="<?= isset($fasilitas) ? BASEURL . '/admin/fasilitas/update' : BASEURL . '/admin/fasilitas/store'; ?>" method="POST" enctype="multipart/form-data">
        
        <?php if(isset($fasilitas)): ?>
            <input type="hidden" name="id" value="<?= $fasilitas['id']; ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Nama Fasilitas</label>
            <input type="text" name="nama" value="<?= $fasilitas['nama'] ?? ''; ?>" required placeholder="Contoh: Perpustakaan...">
        </div>

        <div class="form-group">
            <label>Foto Fasilitas</label>
            <?php if(isset($fasilitas) && !empty($fasilitas['gambar'])): ?>
                <div class="img-preview">
                    <img src="<?= BASEURL ?>/assets/img/fasilitas/<?= $fasilitas['gambar']; ?>">
                    <div><small>Gambar Saat Ini</small></div>
                </div>
            <?php endif; ?>
            <div class="file-upload-box">
                <i class="fas fa-camera upload-icon"></i>
                <p class="upload-text">Klik atau Tarik foto ke sini</p>
                <input type="file" name="gambar" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="form-group">
            <label>Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="4" required placeholder="Jelaskan fasilitas ini..."><?= $fasilitas['deskripsi'] ?? ''; ?></textarea>
        </div>

        <div class="form-actions">
            <a href="<?= BASEURL ?>/admin/fasilitas" class="btn btn-cancel">Batal</a>
            <button type="submit" class="btn btn-save"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </form>
</div>
</body>
</html>