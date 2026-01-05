<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sejarah Sekolah</title>
    <link rel="stylesheet" href="/kp-sd2-dukuhbenda/public/assets/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #333;
        }
        .page-header { margin-bottom: 20px; }
        .page-header h1 { font-size: 24px; color: #2c3e50; margin: 0; font-weight: 700; }
        .back-link { display: inline-block; margin-top: 5px; text-decoration: none; color: #4FB6C7; font-size: 14px; font-weight: 500; }
        .back-link:hover { text-decoration: underline; }
        .card-content { background: #ffffff; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); padding: 30px; border: none; }
        label { display: block; font-weight: 600; color: #555; margin-bottom: 8px; font-size: 15px; }
        .form-group { margin-bottom: 25px; }
        textarea { width: 100%; height: 300px; /* Lebih tinggi untuk sejarah */ padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #fcfcfc; font-size: 14px; line-height: 1.6; resize: vertical; }
        textarea:focus { outline: none; border-color: #4FB6C7; background-color: #fff; box-shadow: 0 0 0 3px rgba(0, 74, 173, 0.1); }
        .btn-save { background-color: #4FB6C7; color: white; border: none; padding: 12px 30px; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer; transition: background 0.3s, transform 0.2s; display: inline-flex; align-items: center; gap: 8px; }
        .btn-save:hover { background-color: #4FB6C7; transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Kelola Sejarah Sekolah</h1>
        <a href="/kp-sd2-dukuhbenda/public/admin/dashboard" class="back-link">← Kembali ke Dashboard</a>
    </div>
    <div class="card-content">
        <form action="/kp-sd2-dukuhbenda/public/admin/sejarah/update" method="POST">
            <div class="form-group">
                <label for="sejarah">Cerita Sejarah</label>
                <textarea name="sejarah" id="sejarah" placeholder="Tuliskan sejarah lengkap sekolah di sini..." required><?= htmlspecialchars($data['sejarah'] ?? '') ?></textarea>
            </div>
            <button type="submit" class="btn-save">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                </svg>
                Simpan Sejarah
            </button>
        </form>
    </div>
</body>
</html>