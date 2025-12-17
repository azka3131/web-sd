<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita - Admin</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .container { background: white; padding: 30px; border-radius: 8px; max-width: 800px; margin: auto; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, input[type="file"] {
            width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        textarea { height: 200px; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: white; font-size: 16px; }
        .btn-save { background: #ffc107; color: black; }
        .btn-back { background: #6c757d; text-decoration: none; display: inline-block; margin-right: 10px; }
        .img-preview { margin-bottom: 15px; border: 1px solid #ddd; padding: 5px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Berita</h2>

    <form action="<?= BASEURL ?>/admin/berita/update" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <input type="hidden" name="gambar_lama" value="<?= $data['gambar']; ?>">

        <label>Judul Berita</label>
        <input type="text" name="judul" required value="<?= $data['judul']; ?>">

        <label>Gambar Saat Ini</label>
        <?php if($data['gambar']): ?>
            <img src="<?= BASEURL ?>/assets/img/berita/<?= $data['gambar']; ?>" class="img-preview" width="150">
            <br>
        <?php else: ?>
            <p><small>Belum ada gambar</small></p>
        <?php endif; ?>

        <label>Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar" accept=".jpg, .jpeg, .png">
        
        <label>Isi Berita</label>
        <textarea name="isi" required><?= $data['isi']; ?></textarea>

        <br>
        <a href="<?= BASEURL ?>/admin/berita" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">Update Berita</button>
    </form>
</div>

</body>
</html>