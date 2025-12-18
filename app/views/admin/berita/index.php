<?php if(!isset($_SESSION)) session_start(); ?>

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
        .container { max-width: 1200px; margin: 0 auto; } /* Sedikit diperlebar agar muat kolom status */

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

        .header-title p { color: #888; font-size: 14px; }
        .header-title p a { color: #4FB6C7; text-decoration: none; font-weight: 600; }
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
            overflow: hidden;
            border: 1px solid #eee;
        }

        /* TABEL STYLES */
        .custom-table { width: 100%; border-collapse: collapse; }

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
            width: 70px; height: 50px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #eee;
        }

        /* [BARU] STYLE BADGE STATUS */
        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; display: inline-block; }
        .status-published { background: #E0F2F1; color: #00695C; border: 1px solid #B2DFDB; } /* Hijau Teal */
        .status-archived { background: #ECEFF1; color: #546E7A; border: 1px solid #CFD8DC; }   /* Abu-abu */

        /* TOMBOL AKSI GROUP */
        .action-btn-group { display: flex; gap: 8px; flex-wrap: wrap; }

        .btn-action {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border: 1px solid transparent;
        }

        .btn-edit { background-color: #FFF8E1; color: #FBC02D; border-color: #FFF8E1; }
        .btn-edit:hover { background-color: #FBC02D; color: white; border-color: #FBC02D; }

        .btn-delete { background-color: #FFEBEE; color: #E53935; border-color: #FFEBEE; }
        .btn-delete:hover { background-color: #E53935; color: white; border-color: #E53935; }

        /* [BARU] TOMBOL ARSIP & TERBIT */
        .btn-archive { background-color: #ECEFF1; color: #546E7A; border-color: #CFD8DC; }
        .btn-archive:hover { background-color: #607D8B; color: white; border-color: #607D8B; }

        .btn-publish { background-color: #E8F5E9; color: #2E7D32; border-color: #C8E6C9; }
        .btn-publish:hover { background-color: #4CAF50; color: white; border-color: #4CAF50; }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-header { flex-direction: column; align-items: flex-start; gap: 15px; }
            .btn-add { width: 100%; justify-content: center; }
            .card-box { overflow-x: auto; }
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
                        <th width="10%">Gambar</th>
                        <th width="35%">Judul Berita</th>
                        <th width="15%">Tanggal</th>
                        <th width="10%">Status</th> <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="6" style="text-align:center; padding: 40px; color:#999;">
                                <i class="fas fa-newspaper" style="font-size: 30px; margin-bottom: 10px; opacity: 0.5;"></i><br>
                                Belum ada berita. Silakan tambah berita baru.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($data as $row): ?>
                        <tr style="<?= ($row['status'] ?? 'published') == 'archived' ? 'opacity: 0.6; background-color: #f9f9f9;' : '' ?>">
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if(!empty($row['gambar'])): ?>
                                    <img src="<?= BASEURL ?>/assets/img/berita/<?= $row['gambar']; ?>" class="thumb-img" alt="Thumb">
                                <?php else: ?>
                                    <div style="width:70px; height:50px; background:#eee; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:10px; color:#aaa;">No Img</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong style="color: #333; font-size: 15px;"><?= htmlspecialchars($row['judul']); ?></strong>
                            </td>
                            <td>
                                <span style="font-size:13px; color:#666;">
                                    <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($row['tanggal'])); ?>
                                </span>
                            </td>
                            
                            <td>
                                <?php if(($row['status'] ?? 'published') == 'published'): ?>
                                    <span class="status-badge status-published">Tayang</span>
                                <?php else: ?>
                                    <span class="status-badge status-archived">Diarsipkan</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="action-btn-group">
                                    
                                    <?php if(($row['status'] ?? 'published') == 'published'): ?>
                                        <a href="<?= BASEURL ?>/admin/berita/status?id=<?= $row['id']; ?>&action=archive" 
                                           class="btn-action btn-archive" title="Sembunyikan dari publik">
                                            <i class="fas fa-archive"></i> Arsip
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= BASEURL ?>/admin/berita/status?id=<?= $row['id']; ?>&action=publish" 
                                           class="btn-action btn-publish" title="Tampilkan kembali">
                                            <i class="fas fa-upload"></i> Terbit
                                        </a>
                                    <?php endif; ?>

                                    <a href="<?= BASEURL ?>/admin/berita/edit?id=<?= $row['id']; ?>" class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= BASEURL ?>/admin/berita/hapus?id=<?= $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini secara permanen?')">
                                        <i class="fas fa-trash"></i>
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