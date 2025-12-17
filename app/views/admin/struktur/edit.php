<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengurus</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #46b5c1;
            outline: none;
        }

        input[type="file"] {
            padding: 10px;
            background: #fafafa;
        }

        .text-muted {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
            display: block;
        }

        /* Tombol Simpan (Teal) */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #46b5c1; /* Warna Teal */
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background-color: #3aa0ac;
        }

        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #888;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-cancel:hover {
            color: #555;
        }
        
        /* Preview Image kecil jika diperlukan */
        .img-preview {
            margin-top: 10px;
            max-width: 100px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 3px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit Pengurus</h2>

        <form action="<?= BASEURL ?>/admin/struktur/update" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="<?= $data['jabatan']; ?>" required>
            </div>

            <div class="form-group">
                <label>Nomor Urut</label>
                <input type="number" name="urutan" value="<?= $data['urutan']; ?>" required>
            </div>

            <div class="form-group">
                <label>Ganti Foto</label>
                <input type="file" name="foto">
                <span class="text-muted">*Biarkan kosong jika tidak ingin mengganti foto.</span>
                
                <?php if (!empty($data['foto'])): ?>
                    <br>
                    <small>Foto saat ini:</small><br>
                    <img src="<?= BASEURL ?>/assets/img/struktur/<?= $data['foto']; ?>" class="img-preview" alt="Foto Lama">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            
            <a href="<?= BASEURL ?>/admin/dashboard" class="btn-cancel">Batal & Kembali</a>
        </form>
    </div>
</div>

</body>
</html>