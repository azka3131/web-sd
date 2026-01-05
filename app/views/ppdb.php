<?php include 'header.php'; ?>

<div class="container">
    
    <div class="ppdb-wrapper">
        
        <div class="ppdb-header-text">
            <h1>Informasi PPDB</h1>
            <p>Penerimaan Peserta Didik Baru Tahun Ajaran 2025/2026</p>
            <div class="line-bar-center"></div>
        </div>

        <?php if (!empty($data['file_brosur'])): ?>
            <div class="poster-container">
                <img src="<?= BASEURL ?>/assets/img/ppdb/<?= $data['file_brosur']; ?>" 
                     alt="Brosur PPDB" 
                     class="ppdb-poster">
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-info-circle"></i>
                <p>Saat ini brosur informasi belum tersedia / sedang diperbarui.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<style>
    .ppdb-wrapper {
        background: #ffffff;
        max-width: 900px;       
        margin: 40px auto;      
        padding: 50px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05); 
        text-align: center;
        border: 1px solid #f0f0f0;
    }

    /* 2. Judul & Garis */
    .ppdb-header-text h1 {
        font-size: 2rem;
        color: #0057b3;
        margin-bottom: 10px;
        font-weight: 800;
    }

    .ppdb-header-text p {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    .line-bar-center {
        width: 60px;
        height: 4px;
        background: #ffc107;
        margin: 0 auto 40px auto;
        border-radius: 2px;
    }


    .poster-container {
        margin-bottom: 40px;
    }

    .ppdb-poster {
        width: 100%;           
        max-width: 600px;      
        height: auto;           
        border-radius: 15px;    
        box-shadow: 0 15px 30px rgba(0,0,0,0.15); 
        transition: transform 0.3s ease;
        border: 1px solid #eee;
    }

    .ppdb-poster:hover {
        transform: scale(1.02); 
    }

    .empty-state {
        padding: 40px;
        background: #f8f9fa;
        border-radius: 10px;
        color: #888;
        margin-bottom: 30px;
    }
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #ccc;
    }

    
    .ppdb-action-area p {
        margin-bottom: 15px;
        color: #555;
        font-weight: 500;
    }

    .btn-wa-ppdb {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: linear-gradient(45deg, #25D366, #128C7E);
        color: #fff !important;
        padding: 15px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
        transition: all 0.3s ease;
    }

    .btn-wa-ppdb:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(37, 211, 102, 0.5);
    }
    
    .btn-wa-ppdb i {
        font-size: 1.4rem;
    }

    /* Responsif untuk HP */
    @media (max-width: 600px) {
        .ppdb-wrapper {
            padding: 30px 20px;
            margin: 20px auto;
        }
        .ppdb-header-text h1 {
            font-size: 1.5rem;
        }
        .btn-wa-ppdb {
            width: 100%;
        }
    }
</style>

<?php include 'footer.php'; ?>