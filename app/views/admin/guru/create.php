<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru - Admin</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .container { background: white; padding: 30px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, input[type="file"] {
            width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: white; font-size: 16px; }
        .btn-save { background: #28a745; }
        .btn-back { background: #6c757d; text-decoration: none; display: inline-block; margin-right: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Data Guru</h2>

    <form action="/kp-sd2-dukuhbenda/public/admin/guru/simpan" method="POST" enctype="multipart/form-data">
        
        <label>Nama Lengkap (dengan gelar)</label>
        <input type="text" name="nama" required placeholder="Contoh: Budi Santoso, S.Pd.">

        <label>Jabatan</label>
        <input type="text" name="jabatan" required placeholder="Contoh: Guru Kelas 1">

        <label>Pendidikan Terakhir</label>
        <input type="text" name="pendidikan" placeholder="Contoh: S1 PGSD">

        <label>Foto Profil</label>
        <input type="file" name="foto" accept=".jpg, .jpeg, .png">

        <label>Bio Singkat (Opsional)</label>
        <textarea name="bio" rows="4" style="width:100%; margin-bottom:15px;" placeholder="Deskripsi singkat tentang guru..."></textarea>

        <br>
        <a href="/kp-sd2-dukuhbenda/public/admin/guru" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">Simpan Data</button>
    </form>
</div>

</body>
</html>