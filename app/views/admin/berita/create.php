<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita Baru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Reset sederhana khusus halaman ini */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9; /* Warna background abu-abu muda lembut */
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Kartu Form (Kotak Putih di Tengah) */
        .form-card {
            background: white;
            width: 100%;
            max-width: 700px; /* Lebar maksimal form */
            padding: 40px;
            border-radius: 15px; /* Sudut melengkung */
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); /* Bayangan halus */
        }

        /* Header Form */
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-header p {
            color: #999;
            font-size: 14px;
            margin: 0;
        }

        /* Styling Input Form */
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
            box-sizing: border-box; /* Agar padding tidak melebarkan elemen */
        }

        /* Efek saat diklik/fokus */
        .form-control:focus {
            border-color: #4FB6C7; /* Warna Teal Utama */
            background-color: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 182, 199, 0.1);
        }

        textarea.form-control {
            resize: vertical; /* Bisa ditarik ke bawah */
            min-height: 150px;
            line-height: 1.5;
        }

        /* Helper Layout (Dua Kolom Sejajar) */
        .row-group {
            display: flex;
            gap: 20px;
        }
        .row-group .form-group {
            flex: 1; /* Membagi lebar sama rata */
        }

        /* Tombol Simpan (Warna Teal) */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #4FB6C7; 
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            box-shadow: 0 4px 10px rgba(79, 182, 199, 0.3);
        }

        .btn-submit:hover {
            background-color: #3da0b0; /* Warna lebih gelap saat hover */
            transform: translateY(-2px); /* Efek naik sedikit */
            box-shadow: 0 6px 15px rgba(79, 182, 199, 0.4);
        }

        /* Tombol Batal/Kembali */
        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #888;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
        .btn-cancel:hover { 
            color: #555; 
            text-decoration: underline;
        }
        
        /* Responsif untuk HP */
        @media (max-width: 600px) {
            .row-group { flex-direction: column; gap: 0; }
        }
    </style>
</head>
<body>

    <div class="form-card">
        <div class="form-header">
            <h2>Tambah Berita Baru</h2>
            <p>Publikasikan informasi terbaru seputar sekolah</p>
        </div>

        <form action="<?= BASEURL ?>/admin/berita/simpan" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" name="judul" class="form-control" placeholder="Contoh: Kegiatan Upacara Bendera..." required>
            </div>

            <div class="row-group">
                <div class="form-group">
                    <label>Tanggal Posting</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Gambar Utama</label>
                    <input type="file" name="gambar" class="form-control" style="padding: 9px;" required>
                    <small style="color: #999; font-size: 11px; margin-top: 5px; display:block;">Format JPG/PNG, Maks 2MB.</small>
                </div>
            </div>

            <div class="form-group">
                <label>Isi Berita Lengkap</label>
                <textarea name="isi" class="form-control" placeholder="Tuliskan detail berita di sini..."></textarea>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Simpan Berita
            </button>
            
            <a href="<?= BASEURL ?>//admin/berita" class="btn-cancel">Batal & Kembali</a>
        </form>
    </div>

</body>
</html>