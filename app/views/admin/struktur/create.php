<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengurus</title>
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
        textarea,
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
        input[type="number"]:focus,
        textarea:focus {
            border-color: #46b5c1;
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="file"] {
            padding: 10px;
            background: #fafafa;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #46b5c1;
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
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Tambah Pengurus</h2>

        <form action="<?= BASEURL ?>/admin/struktur/store" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Contoh: Budi Santoso, S.Pd" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" placeholder="Contoh: Ketua Komite" required>
            </div>

            <div class="form-group">
                <label>Nomor Urut Tampil (1 = Paling Atas)</label>
                <input type="number" name="urutan" value="1" required>
            </div>

            <div class="form-group">
                <label>Foto Profil</label>
                <input type="file" name="foto">
            </div>

            <button type="submit" class="btn-submit">Simpan Data</button>
            
            <a href="<?= BASEURL ?>/admin/dashboard" class="btn-cancel">Batal & Kembali</a>
        </form>
    </div>
</div>

</body>
</html>