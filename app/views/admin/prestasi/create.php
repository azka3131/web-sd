<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Prestasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 40px 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Form Container (Card) */
        .form-card {
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
            background-color: #fafafa;
            box-sizing: border-box; /* Agar padding tidak merusak width */
        }

        .form-control:focus {
            border-color: #4FB6C7;
            background-color: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 182, 199, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Tombol Simpan */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #4FB6C7; /* Warna Teal sesuai referensi */
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #3da0b0;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 182, 199, 0.3);
        }

        /* Tombol Kembali */
        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #888;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-cancel:hover { color: #555; }

        .row-group {
            display: flex;
            gap: 15px;
        }
        .row-group .form-group {
            flex: 1;
        }
    </style>
</head>
<body>

    <div class="form-card">
        <div class="form-header">
            <h2>Tambah Data Prestasi</h2>
            <p style="color: #999; font-size: 14px;">Isi detail prestasi siswa di bawah ini</p>
        </div>

        <form action="<?= BASEURL ?>/admin/prestasi/simpan" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Judul Prestasi / Lomba</label>
                <input type="text" name="judul" class="form-control" placeholder="Contoh: Juara 1 Lomba Matematika" required>
            </div>

            <div class="row-group">
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Nama siswa..." required>
                </div>
                <div class="form-group">
                    <label>Tanggal Perolehan</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
            </div>

            <div class="row-group">
                <div class="form-group">
                    <label>Peringkat / Juara</label>
                    <input type="text" name="jenis_juara" class="form-control" placeholder="Cth: Juara 1, Emas..." required>
                </div>
                <div class="form-group">
                    <label>Tingkat</label>
                    <select name="tingkat" class="form-control">
                        <option value="Kecamatan">Kecamatan</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Nasional">Nasional</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Foto Kegiatan / Penyerahan Piala</label>
                <input type="file" name="foto" class="form-control" style="padding: 10px;">
                <small style="color: #999; font-size: 12px;">Format: JPG, PNG. Maks 2MB.</small>
            </div>

            <div class="form-group">
                <label>Deskripsi Singkat (Opsional)</label>
                <textarea name="deskripsi" class="form-control" placeholder="Ceritakan sedikit tentang prestasi ini..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan Data Prestasi</button>
            <a href="<?= BASEURL ?>/admin/prestasi" class="btn-cancel">Batal & Kembali</a>
        </form>
    </div>

</body>
</html>