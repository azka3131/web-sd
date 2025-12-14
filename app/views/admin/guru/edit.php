<!DOCTYPE html>
<html>
<head>
    <title>Edit Guru - Admin</title>
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
        .img-preview { margin-bottom: 15px; border: 1px solid #ddd; padding: 5px; border-radius: 4px; display: block;}
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Guru</h2>

    <form action="/kp-sd2-dukuhbenda/public/admin/guru/update" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

        <label>Nama Lengkap</label>
        <input type="text" name="nama" required value="<?= $data['nama']; ?>">

        <label>Jabatan</label>
        <input type="text" name="jabatan" required value="<?= $data['jabatan']; ?>">

        <label>Pendidikan Terakhir</label>
        <input type="text" name="pendidikan" value="<?= $data['pendidikan']; ?>">

        <label>Foto Saat Ini</label>
        <?php if($data['foto']): ?>
            <img src="/kp-sd2-dukuhbenda/public/assets/img/guru/<?= $data['foto']; ?>" class="img-preview" width="100">
        <?php else: ?>
            <p><small>Belum ada foto</small></p>
        <?php endif; ?>

        <label>Ganti Foto (Opsional)</label>
        <input type="file" name="foto" accept=".jpg, .jpeg, .png">

        <label>Bio Singkat</label>
        <textarea name="bio" rows="4" style="width:100%; margin-bottom:15px;"><?= $data['bio']; ?></textarea>

        <br>
        <a href="/kp-sd2-dukuhbenda/public/admin/guru" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">Update Data</button>
    </form>
</div>

</body>
</html>