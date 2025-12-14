<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto - Admin</title>
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
    <h2>Upload Foto Galeri</h2>

    <form action="/kp-sd2-dukuhbenda/public/admin/galeri/simpan" method="POST" enctype="multipart/form-data">
        
        <label>Judul Foto</label>
        <input type="text" name="judul" required placeholder="Contoh: Upacara Bendera Senin">

        <label>Pilih Foto</label>
        <input type="file" name="foto" required accept=".jpg, .jpeg, .png">
        <small style="display:block; margin-top:-10px; margin-bottom:15px; color:grey;">Format: JPG/PNG</small>

        <label>Deskripsi Singkat</label>
        <textarea name="deskripsi" rows="3" placeholder="Keterangan foto..."></textarea>

        <label>Link Google Drive (Opsional)</label>
        <input type="text" name="link_drive" placeholder="Contoh: https://drive.google.com/drive/folders/...">
        <small style="display:block; margin-top:-10px; margin-bottom:15px; color:grey;">Isi jika ingin mengarahkan ke album foto lengkap.</small>
        <br>
        <a href="/kp-sd2-dukuhbenda/public/admin/galeri" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">Upload Foto</button>
    </form>
</div>

</body>
</html>