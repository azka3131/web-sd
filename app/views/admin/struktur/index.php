<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Struktur Organisasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Global Style */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; margin: 0; padding: 30px; }
        
        /* Layout Container */
        .main-wrapper { max-width: 1200px; margin: 0 auto; }

        /* HEADER SECTION (Judul & Tombol di Luar Kotak Putih) */
        .page-header { 
            display: flex; justify-content: space-between; align-items: flex-start; 
            margin-bottom: 20px; 
        }
        
        .page-title h1 { 
            font-size: 28px; color: #2c3e50; margin: 0 0 5px 0; font-weight: 800; 
        }
        
        .back-link { 
            color: #4FB6C7; text-decoration: none; font-size: 14px; 
            display: inline-flex; align-items: center; gap: 5px; font-weight: 600; 
        }
        .back-link:hover { color: #3da0b0; }

        /* Tombol Tambah (Teal, Pill Shape, Shadow) */
        .btn-add { 
            background-color: #4FB6C7; color: white; padding: 12px 30px; 
            border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 14px;
            display: inline-flex; align-items: center; gap: 8px; 
            box-shadow: 0 4px 15px rgba(79, 182, 199, 0.4); 
            transition: 0.3s;
        }
        .btn-add:hover { background-color: #3da0b0; transform: translateY(-2px); }

        /* CARD TABLE (Kotak Putih Hanya untuk Tabel) */
        .table-card {
            background: white;
            border-radius: 15px; /* Sudut membulat */
            box-shadow: 0 5px 20px rgba(0,0,0,0.03); /* Shadow halus */
            padding: 20px;
            overflow: hidden;
        }

        /* Styling Tabel */
        table { width: 100%; border-collapse: collapse; }
        
        th { 
            text-align: left; padding: 20px; 
            color: #adb5bd; /* Abu-abu soft */
            font-size: 12px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px; 
            border-bottom: 1px solid #f0f0f0;
        }
        
        td { 
            padding: 20px; 
            border-bottom: 1px solid #f9f9f9; 
            vertical-align: middle; 
            font-size: 15px; color: #525f7f; 
        }
        
        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #fafafa; }

        /* Foto */
        .thumb { 
            width: 70px; height: 50px; 
            object-fit: cover; border-radius: 6px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
        }

        /* Tombol Aksi (Warna Soft) */
        .btn-action { 
            padding: 8px 15px; border-radius: 6px; 
            text-decoration: none; font-size: 12px; font-weight: 700; 
            display: inline-flex; align-items: center; gap: 6px; 
            transition: 0.2s;
        }
        
        /* Warna Tombol Edit (Kuning Soft) */
        .btn-edit { background-color: #fff8dd; color: #f1c40f; }
        .btn-edit:hover { background-color: #f1c40f; color: white; }
        
        /* Warna Tombol Hapus (Merah Soft) */
        .btn-delete { background-color: #fee2e2; color: #e74c3c; margin-left: 8px; }
        .btn-delete:hover { background-color: #e74c3c; color: white; }

        /* Teks Nama & Jabatan */
        .text-nama { font-weight: 700; color: #2d3436; }
        .text-jabatan { color: #636e72; }
    </style>
</head>
<body>

<div class="main-wrapper">
    
    <div class="page-header">
        <div class="page-title">
            <h1>Kelola Struktur Organisasi</h1>
            <a href="/kp-sd2-dukuhbenda/public/admin/dashboard" class="back-link">
                &larr; Kembali ke Dashboard
            </a>
        </div>
        <a href="/kp-sd2-dukuhbenda/public/admin/struktur/create" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Pengurus
        </a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th width="50">NO</th>
                    <th width="100">FOTO</th>
                    <th>NAMA LENGKAP</th>
                    <th>JABATAN</th>
                    <th width="200">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $s) : ?>
                    <tr>
                        <td><?= $s['urutan']; ?></td>
                        <td>
                            <img src="/kp-sd2-dukuhbenda/public/assets/img/struktur/<?= !empty($s['foto']) ? $s['foto'] : 'default.png'; ?>" class="thumb" alt="Foto">
                        </td>
                        <td><span class="text-nama"><?= $s['nama']; ?></span></td>
                        <td><span class="text-jabatan"><?= $s['jabatan']; ?></span></td>
                        <td>
                            <a href="/kp-sd2-dukuhbenda/public/admin/struktur/edit?id=<?= $s['id']; ?>" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="/kp-sd2-dukuhbenda/public/admin/struktur/delete?id=<?= $s['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" style="text-align:center; padding: 50px; color: #999;">
                            Belum ada data. Silakan tambah data baru.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>