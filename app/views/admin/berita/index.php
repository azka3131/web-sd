<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* RESET & GLOBAL */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; padding: 40px 20px; }

        /* CONTAINER UTAMA */
        .container { max-width: 1100px; margin: 0 auto; }

        /* HEADER PAGE */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header-title h1 {
            font-size: 28px;
            font-weight: 800;
            color: #3F4C52;
            margin-bottom: 5px;
        }

        .header-title p {
            color: #888;
            font-size: 14px;
        }

        .header-title p a {
            color: #4FB6C7;
            text-decoration: none;
            font-weight: 600;
        }
        .header-title p a:hover { text-decoration: underline; }

        /* TOMBOL TAMBAH */
        .btn-add {
            background-color: #4FB6C7;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(79, 182, 199, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-add:hover {
            background-color: #3da0b0;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(79, 182, 199, 0.4);
        }

        /* CARD TABLE */
        .card-box {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden; /* Biar sudut tabel ikut rounded */
            border: 1px solid #eee;
        }

        /* TABEL STYLING */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th {
            background-color: #fcfcfc;
            color: #888;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 20px;
            text-align: left;
            border-bottom: 2px solid #eee;
        }

        .custom-table td {
            padding: 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
            font-size: 15px;
        }

        .custom-table tr:last-child td { border-bottom: none; }
        .custom-table tr:hover { background-color: #fafafa; }

        /* GAMBAR THUMBNAIL */
        .thumb-img {
            width: 70px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #eee;
        }

        /* TOMBOL AKSI (EDIT & HAPUS) */
        .action-btn-group {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-edit {
            background-color: #FFF8E1; /* Kuning muda */
            color: #FBC02D;
            border: 1px solid #FFF8E1;
        }
        .btn-edit:hover {
            background-color: #FBC02D;
            color: white;
            border-color: #FBC02D;
        }

        .btn-delete {
            background-color: #FFEBEE; /* Merah muda */
            color: #E53935;
            border: 1px solid #FFEBEE;
        }
        .btn-delete:hover {
            background-color: #E53935;
            color: white;
            border-color: #E53935;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-header { flex-direction: column; align-items: flex-start; gap: 15px; }
            .btn-add { width: 100%; justify-content: center; }
            .card-box { overflow-x: auto; } /* Scroll samping kalau tabel kepanjangan */
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="page-header">
            <div class="header-title">
                <h1>Kelola Berita</h1>
                <p><a href="<?= BASEURL ?>/admin/dashboard"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a></p>
            </div>
            <a href="<?= BASEURL ?>/admin/berita/tambah" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Berita Baru
            </a>
        </div>

        <div class="card-box">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Gambar</th>
                        <th width="45%">Judul Berita</th>
                        <th width="15%">Tanggal</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center; padding: 40px; color:#999;">
                                Belum ada berita. Silakan tambah berita baru.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($data as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if($row['gambar']): ?>
                                    <img src="<?= BASEURL ?>/assets/img/berita/<?= $row['gambar']; ?>" class="thumb-img" alt="Thumb">
                                <?php else: ?>
                                    <span style="font-size:12px; color:#ccc;">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td style="font-weight: 600; color: #333;"><?= $row['judul']; ?></td>
                            <td><span style="background:#eef4fc; color:#4FB6C7; padding:4px 10px; border-radius:15px; font-size:12px; font-weight:bold;"><?= date('d M Y', strtotime($row['tanggal'])); ?></span></td>
                            <td>
                                <div class="action-btn-group">
                                    <a href="<?= BASEURL ?>/admin/berita/edit?id=<?= $row['id']; ?>" class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= BASEURL ?>/admin/berita/hapus?id=<?= $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </div>
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