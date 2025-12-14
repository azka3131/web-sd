<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berita - Admin</title>
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
        .btn-save { background: #28a745; }
        .btn-back { background: #6c757d; text-decoration: none; display: inline-block; margin-right: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Berita Baru</h2>

    <form action="/kp-sd2-dukuhbenda/public/admin/berita/simpan" method="POST" enctype="multipart/form-data">
        
        <label>Judul Berita</label>
        <input type="text" name="judul" required placeholder="Masukkan judul berita...">

        <label>Gambar Utama</label>
        <input type="file" name="gambar" accept=".jpg, .jpeg, .png">
        <small style="color: grey; display:block; margin-top:-15px; margin-bottom:20px;">*Format: JPG/PNG, Maksimal 2MB</small>

        <label>Isi Berita</label>
        <textarea name="isi" required placeholder="Tulis isi berita di sini..."></textarea>

        <br>
        <a href="/kp-sd2-dukuhbenda/public/admin/berita" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">Simpan Berita</button>
    </form>
</div>

</body>
</html>