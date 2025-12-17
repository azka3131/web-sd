<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($guru) ? 'Edit Guru' : 'Tambah Guru'; ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f6f9; padding: 40px; display: flex; justify-content: center; }
        
        .form-container {
            background: white; width: 100%; max-width: 600px;
            padding: 40px; border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        h2 { color: #3F4C52; margin-bottom: 25px; text-align: center; }

        .form-group { margin-bottom: 20px; }
        label { display: block; color: #666; font-size: 14px; margin-bottom: 8px; font-weight: 600; }
        
        input[type="text"], textarea {
            width: 100%; padding: 12px; border: 1px solid #ddd;
            border-radius: 8px; font-size: 14px; transition: 0.3s;
        }
        input[type="text"]:focus, textarea:focus { border-color: #4FB6C7; outline: none; }

        input[type="file"] {
            width: 100%; padding: 10px; border: 1px dashed #ccc; border-radius: 8px; background: #fafafa;
        }

        .btn-submit {
            width: 100%; padding: 12px; background: #4FB6C7; color: white;
            border: none; border-radius: 50px; font-weight: bold; font-size: 16px;
            cursor: pointer; transition: 0.3s; margin-top: 10px;
        }
        .btn-submit:hover { background: #3da0b0; }

        .btn-back {
            display: block; text-align: center; margin-top: 15px;
            color: #888; text-decoration: none; font-size: 14px;
        }
        .btn-back:hover { color: #333; }

        .preview-img { width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin-top: 10px; border: 2px solid #eee; }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?= isset($guru) ? 'Edit Data Guru' : 'Tambah Guru Baru'; ?></h2>

    <form action="<?= isset($guru) ? BASEURL . '/admin/guru/update' : BASEURL . '/admin/guru/simpan'; ?>" method="POST" enctype="multipart/form-data">
        
        <?php if(isset($guru)): ?>
            <input type="hidden" name="id" value="<?= $guru['id']; ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $guru['nama'] ?? ''; ?>" placeholder="Contoh: Budi Santoso, S.Pd" required>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="<?= $guru['jabatan'] ?? ''; ?>" placeholder="Contoh: Guru Kelas 1 / Kepala Sekolah" required>
        </div>

        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <input type="text" name="pendidikan" value="<?= $guru['pendidikan'] ?? ''; ?>" placeholder="Contoh: S1 PGSD">
        </div>

        <div class="form-group">
            <label>Foto Profil</label>
            <?php if(isset($guru) && $guru['foto']): ?>
                <img src="<?= BASEURL ?>/assets/img/guru/<?= $guru['foto']; ?>" class="preview-img">
                <br><small style="color: #999;">Biarkan kosong jika tidak ingin mengubah foto</small>
            <?php endif; ?>
            <input type="file" name="foto">
        </div>

        <div class="form-group">
            <label>Bio Singkat (Opsional)</label>
            <textarea name="bio" rows="4" placeholder="Tulis sedikit tentang guru ini..."><?= $guru['bio'] ?? ''; ?></textarea>
        </div>

        <button type="submit" class="btn-submit">Simpan Data</button>
        <a href="<?= BASEURL ?>/admin/guru" class="btn-back">Batal & Kembali</a>
    </form>
</div>

</body>
</html>