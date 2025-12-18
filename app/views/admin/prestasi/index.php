<?php
// Cek session admin
if(!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Prestasi Sekolah</title>
    <link rel="stylesheet" href="/kp-sd2-dukuhbenda/public/assets/css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9; /* Background abu muda seperti contoh */
            color: #333;
            margin: 0;
            padding: 30px 20px; /* Padding atas-bawah 30, kiri-kanan 20 */
        }

        /* REVISI UKURAN DI SINI */
        .container-admin {
            max-width: 1200px; /* Lebar pas (mirip contoh Kelola Berita) */
            width: 95%;        /* Responsif di layar kecil */
            margin: 0 auto;    /* Posisi Tengah */
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title h2 {
            font-size: 26px; /* Judul sedikit lebih besar */
            color: #2c3e50;
            margin: 0 0 5px 0;
            font-weight: 700;
        }

        .back-link {
            text-decoration: none;
            color: #4FB6C7; /* Warna Teal sesuai contoh */
            font-size: 14px;
            font-weight: 600;
        }
        .back-link:hover { text-decoration: underline; }

        .btn-add {
            background-color: #4FB6C7; /* Warna Teal tombol tambah */
            color: white;
            padding: 12px 25px;
            border-radius: 50px; /* Tombol bulat seperti contoh */
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(79, 182, 199, 0.3);
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-add:hover {
            background-color: #3aa0b0;
            transform: translateY(-2px);
        }

        /* CARD PUTIH */
        .card-container {
            background: white;
            border-radius: 15px; /* Sudut lebih membulat */
            box-shadow: 0 5px 20px rgba(0,0,0,0.03); /* Shadow halus */
            overflow: hidden;
            padding: 10px; /* Padding tipis di dalam card */
            width: 100%; 
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #ffffff;
            color: #888;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #eee;
            white-space: nowrap; 
        }

        td {
            padding: 20px;
            vertical-align: middle;
            border-bottom: 1px solid #fcfcfc; /* Garis sangat halus */
            font-size: 14px;
            color: #444;
        }

        tr:hover td { background-color: #fcfcfc; }

        /* GAMBAR */
        .thumb-img {
            width: 80px; height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .no-img {
            width: 80px; height: 60px;
            background: #f4f6f9; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: #ccc; font-size: 10px;
        }

        /* LABEL/BADGE */
        .badge {
            padding: 4px 10px;
            border-radius: 6px; /* Kotak rounded */
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }
        .badge-juara { background: #fff8e1; color: #fbc02d; }
        .date-tag {
            background: #e3f2fd; color: #1976d2; 
            padding: 4px 10px; border-radius: 4px; 
            font-size: 11px; font-weight: 600;
        }

        /* TOMBOL AKSI */
        .action-btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
            margin-right: 5px;
            border: none;
            cursor: pointer;
            gap: 5px;
        }

        .btn-edit { background-color: #fff3cd; color: #856404; }
        .btn-edit:hover { background-color: #ffeeba; }

        .btn-delete { background-color: #f8d7da; color: #721c24; }
        .btn-delete:hover { background-color: #f5c6cb; }

        .empty-data { text-align: center; padding: 60px; color: #aaa; }
    </style>
</head>
<body>

    <div class="container-admin">

        <div class="page-header">
            <div class="page-title">
                <h2>Kelola Berita</h2> <a href="/kp-sd2-dukuhbenda/public/admin/dashboard" class="back-link">
                    ← Kembali ke Dashboard
                </a>
            </div>
            <a href="/kp-sd2-dukuhbenda/public/admin/prestasi/tambah" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Prestasi Baru
            </a>
        </div>

        <div class="card-container">
            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="12%">Gambar</th>
                        <th width="35%">Judul Prestasi</th>
                        <th width="20%">Tanggal</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="5" class="empty-data">
                                <i class="fas fa-folder-open" style="font-size: 30px; margin-bottom: 10px; opacity: 0.5;"></i><br>
                                Belum ada data ditemukan.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($data as $i => $row): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td>
                                <?php if(!empty($row['foto'])): ?>
                                    <img src="/kp-sd2-dukuhbenda/public/assets/img/prestasi/<?= $row['foto'] ?>" class="thumb-img" alt="Foto">
                                <?php else: ?>
                                    <div class="no-img">No IMG</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong style="color: #333; font-size: 14px; display:block; margin-bottom: 5px;">
                                    <?= htmlspecialchars($row['judul']) ?>
                                </strong>
                                <div style="font-size: 12px; color: #777;">
                                    <?= htmlspecialchars($row['nama_siswa']) ?> • <span style="color:#fbc02d; font-weight:600;"><?= htmlspecialchars($row['jenis_juara']) ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="date-tag">
                                    <?= date('d M Y', strtotime($row['tanggal'])) ?>
                                </span>
                            </td>
                            <td style="white-space: nowrap;">
                                <a href="/kp-sd2-dukuhbenda/public/admin/prestasi/edit?id=<?= $row['id'] ?>" class="action-btn btn-edit">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a href="/kp-sd2-dukuhbenda/public/admin/prestasi/hapus?id=<?= $row['id'] ?>" class="action-btn btn-delete" onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>