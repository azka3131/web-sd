<!DOCTYPE html>
<html>
<head>
    <title>Edit Fasilitas - Admin</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .container { background: white; padding: 30px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, input[type="file"] {
            width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: white; font-size: 16px; }
        .btn-save { background: #ffc107; color: black; }
        .btn-back { background: #6c757d; text-decoration: none; display: inline-block; margin-right: 10px; }
        .img-preview { display: block; margin-bottom: 15px; border: 1px solid #ddd; padding: 5px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Fasilitas</h2>

    <form action="<?= BASEURL ?>/admin/fasilitas/update" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <input type="hidden" name="foto_lama" value="<?= $data['gambar']; ?>">

        <label>Nama Fasilitas</label>
        <input type="text" name="nama" required value="<?= $data['nama']; ?>">

        <label>Foto Saat Ini</label>
        <?php if($data['gambar']): ?>
            <img src="<?= BASEURL ?>/assets/img/fasilitas/<?= $data['gambar']; ?>" class="img-preview" width="150">
        <?php else: ?>
            <small>Tidak ada foto</small>
        <?php endif; ?>

        <label>Ganti Foto (Opsional)</label>
        <input type="file" name="gambar" accept=".jpg, .jpeg, .png">
        <small style="display:block; margin-top:-10px; margin-bottom:15px; color:grey;">Biarkan kosong jika tidak ingin mengganti foto.</small>

        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="4"><?= $data['deskripsi']; ?></textarea>

        <br>
        <a href="<?= BASEURL ?>/admin/fasilitas" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">Update Fasilitas</button>
    </form>
</div>

</body>
</html>