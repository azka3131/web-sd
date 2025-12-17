<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Info Sekolah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; margin: 0; padding: 30px; }
        .admin-container { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        h1 { font-size: 24px; color: #2c3e50; margin-bottom: 30px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; }
        input[type="number"] { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; transition: 0.3s; box-sizing: border-box; }
        input:focus { border-color: #4FB6C7; outline: none; box-shadow: 0 0 5px rgba(79, 182, 199, 0.3); }
        .btn-save { width: 100%; background: #4FB6C7; color: white; padding: 12px; border: none; border-radius: 30px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        .btn-save:hover { background: #3da0b0; transform: translateY(-2px); }
        .back-link { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #888; font-size: 14px; }
    </style>
</head>
<body>

<div class="admin-container">
    <h1>Kelola Info Statistik</h1>

    <form action="<?= BASEURL ?>/admin/info/update" method="POST">
        <div class="form-group">
            <label><i class="fas fa-user-graduate"></i> Jumlah Siswa</label>
            <input type="number" name="siswa" value="<?= $data['jumlah_siswa']; ?>" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-chalkboard-teacher"></i> Jumlah Guru & Staf</label>
            <input type="number" name="guru" value="<?= $data['jumlah_guru']; ?>" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-school"></i> Jumlah Rombel (Kelas)</label>
            <input type="number" name="rombel" value="<?= $data['jumlah_rombel']; ?>" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-trophy"></i> Jumlah Prestasi</label>
            <input type="number" name="prestasi" value="<?= $data['jumlah_prestasi']; ?>" required>
        </div>

        <button type="submit" class="btn-save">Simpan Perubahan</button>
    </form>

    <a href="<?= BASEURL ?>/admin/dashboard" class="back-link">&larr; Kembali ke Dashboard</a>
</div>

</body>
</html>