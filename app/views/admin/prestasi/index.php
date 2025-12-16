<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Prestasi Sekolah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* GLOBAL STYLE */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 40px 20px; /* Padding body agar konten tidak nempel di layar kecil */
        }

        /* CONTAINER AGAR KE TENGAH (KUNCI UTAMA) */
        .container-center {
            max-width: 1100px; /* Batasi lebar agar seperti contoh Kelola Berita */
            margin: 0 auto;    /* Posisikan di tengah */
        }

        /* HEADER SECTION */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title h2 {
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

        .btn-add {
            background-color: #4FB6C7; /* Warna Teal */
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(79, 182, 199, 0.3);
            transition: 0.3s;
        }
        .btn-add:hover {
            background-color: #3da0b0;
            transform: translateY(-2px);
        }

        /* CARD CONTAINER TABLE */
        .card-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            padding: 10px; /* Sedikit padding di dalam card */
        }

        /* TABLE STYLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: white; /* Header putih bersih */
            color: #999;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 20px;
            text-align: left;
            border-bottom: 2px solid #f0f0f0;
        }

        td {
            padding: 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f9f9f9;
            color: #555;
            font-size: 14px;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #fafafa; }

        /* IMAGE THUMBNAIL */
        .thumb-img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* BADGE */
        .badge {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-juara { background: #fff8e1; color: #fbc02d; border: 1px solid #fff3cd; }

        /* ACTION BUTTONS */
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
            margin-right: 5px;
        }

        .btn-edit { background-color: #fff3cd; color: #856404; }
        .btn-edit:hover { background-color: #ffeeba; }

        .btn-delete { background-color: #f8d7da; color: #721c24; }
        .btn-delete:hover { background-color: #f5c6cb; }

        /* EMPTY STATE */
        .empty-data {
            text-align: center;
            padding: 60px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="container-center">

        <div class="page-header">
            <div class="page-title">
                <h2>Kelola Data Prestasi</h2>
                <a href="/kp-sd2-dukuhbenda/public/admin/dashboard" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
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
                        <th width="15%">Foto</th>
                        <th width="30%">Judul & Tanggal</th>
                        <th width="30%">Siswa & Juara</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="5" class="empty-data">
                                <i class="fas fa-trophy" style="font-size: 40px; margin-bottom: 15px; color: #ddd;"></i><br>
                                Belum ada data prestasi. Silakan tambah data baru.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($data as $i => $row): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td>
                                <?php if($row['foto']): ?>
                                    <img src="/kp-sd2-dukuhbenda/public/assets/img/prestasi/<?= $row['foto'] ?>" class="thumb-img">
                                <?php else: ?>
                                    <div style="width:80px; height:60px; background:#eee; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#ccc; font-size:10px;">No IMG</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong style="color: #333; font-size: 15px;"><?= $row['judul'] ?></strong><br>
                                <span style="color: #999; font-size: 12px;">
                                    <i class="far fa-calendar-alt"></i> <?= date('d F Y', strtotime($row['tanggal'])) ?>
                                </span>
                            </td>
                            <td>
                                <div style="margin-bottom: 4px; font-weight:600; color:#555;"><?= $row['nama_siswa'] ?></div>
                                <span class="badge badge-juara">
                                    <i class="fas fa-medal"></i> <?= $row['jenis_juara'] ?>
                                </span>
                            </td>
                            <td>
                                <a href="/kp-sd2-dukuhbenda/public/admin/prestasi/edit?id=<?= $row['id'] ?>" class="action-btn btn-edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="/kp-sd2-dukuhbenda/public/admin/prestasi/hapus?id=<?= $row['id'] ?>" class="action-btn btn-delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div> </body>
</html>