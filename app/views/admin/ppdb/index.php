<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Brosur PPDB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* GLOBAL STYLE */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 30px;
        }

        /* HEADER SECTION */
        .page-header {
            margin-bottom: 30px;
        }
        .page-header h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .back-link {
            text-decoration: none;
            color: #4FB6C7;
            font-size: 14px;
            font-weight: 600;
        }
        .back-link:hover { text-decoration: underline; }

        /* GRID LAYOUT */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        /* CARD STYLE */
        .card-box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .card-title {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            margin-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        /* IMAGE PREVIEW */
        .brosur-preview {
            width: 100%;
            border-radius: 10px;
            border: 2px dashed #ddd;
            padding: 10px;
            background: #fafafa;
        }
        .brosur-preview img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            display: block;
        }

        /* UPLOAD FORM */
        .upload-area {
            text-align: center;
            padding: 40px;
            border: 2px dashed #4FB6C7;
            border-radius: 10px;
            background-color: #eef9fb;
            color: #4FB6C7;
            margin-bottom: 20px;
            transition: 0.3s;
        }
        .upload-area:hover { background-color: #dff2f6; }
        
        input[type="file"] {
            display: none; /* Sembunyikan input file asli */
        }

        .custom-file-upload {
            display: inline-block;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-save {
            background-color: #4FB6C7;
            color: white;
            border: none;
            width: 100%;
            padding: 15px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(79, 182, 199, 0.3);
        }
        .btn-save:hover {
            background-color: #3da0b0;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="page-header">
        <h2>Kelola Brosur PPDB</h2>
        <a href="/kp-sd2-dukuhbenda/public/admin/dashboard" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="content-grid">
        
        <div class="card-box">
            <h3 class="card-title">📷 Brosur Saat Ini</h3>
            <div class="brosur-preview">
                <?php if(!empty($data['file_brosur'])): ?>
                    <img src="/kp-sd2-dukuhbenda/public/assets/img/ppdb/<?= $data['file_brosur'] ?>" alt="Brosur PPDB">
                <?php else: ?>
                    <div style="text-align: center; padding: 50px; color: #aaa;">
                        <i class="fas fa-image" style="font-size: 40px;"></i><br>
                        Belum ada brosur yang diupload.
                    </div>
                <?php endif; ?>
            </div>
            <p style="margin-top: 15px; font-size: 13px; color: #888; text-align: center;">
                Pastikan brosur berformat JPG/PNG dan ukurannya tidak terlalu besar.
            </p>
        </div>

        <div class="card-box">
            <h3 class="card-title">📤 Ganti Brosur</h3>
            
            <form action="/kp-sd2-dukuhbenda/public/admin/ppdb/update" method="POST" enctype="multipart/form-data">
                
                <label for="file-upload" class="custom-file-upload" style="width: 100%;">
                    <div class="upload-area">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 40px; margin-bottom: 10px;"></i><br>
                        Klik di sini untuk memilih file brosur baru
                    </div>
                </label>
                <input id="file-upload" type="file" name="brosur" required onchange="previewFilename()">
                
                <div id="filename-display" style="text-align: center; margin-bottom: 20px; font-weight: bold; color: #555;"></div>

                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>

    </div>

    <script>
        // Script sederhana untuk menampilkan nama file setelah dipilih
        function previewFilename() {
            const input = document.getElementById('file-upload');
            const display = document.getElementById('filename-display');
            if (input.files && input.files[0]) {
                display.innerHTML = "File terpilih: " + input.files[0].name;
            }
        }
    </script>

</body>
</html>