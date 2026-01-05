<?php include 'header.php'; ?>

<div class="container" style="padding: 60px 0;">

    <div class="section-header" style="text-align: center; margin-bottom: 80px;">
        <h1 style="font-size: 2.8em; color: #333; font-weight: 800; letter-spacing: -1px;">Fasilitas Sekolah</h1>
        <p style="color: #666; font-size: 1.1em; max-width: 600px; margin: 10px auto;">Sarana dan prasarana penunjang kegiatan belajar mengajar yang nyaman, aman, ve dan memadai.</p>
        <div style="width: 60px; height: 5px; background: #0057b3; margin: 25px auto; border-radius: 50px;"></div>
    </div>

    <div class="fasilitas-wrapper">
        <?php if (empty($data)): ?>
            <div style="text-align:center; padding: 50px; background: #f9f9f9; border-radius: 10px;">
                <p style="color:#999; font-size: 1.2em;">Data fasilitas belum tersedia saat ini.</p>
            </div>
        <?php else: ?>

            <?php foreach ($data as $index => $row) : ?>
                <div class="fasilitas-item <?= ($index % 2 != 0) ? 'reverse' : ''; ?>">

                    <div class="fasilitas-img">
                        <div class="img-frame">
                            <?php if (!empty($row['gambar'])): ?>
                                <img src="/kp-sd2-dukuhbenda/public/assets/img/fasilitas/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/600x400?text=No+Image" alt="Placeholder">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="fasilitas-info">
                        <h2 class="fasilitas-title"><?= $row['nama']; ?></h2>
                        <div class="fasilitas-line"></div>
                        <p class="fasilitas-desc">
                            <?= nl2br($row['deskripsi']); ?>
                        </p>
                    </div>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

</div>

<style>
    .fasilitas-wrapper {
        display: flex;
        flex-direction: column;
        gap: 100px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .fasilitas-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 60px;
    }

    .fasilitas-item.reverse {
        flex-direction: row-reverse;
    }

    .fasilitas-img {
        flex: 1;
        position: relative;
    }

    .img-frame {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        transform: rotate(-2deg);
        transition: all 0.4s ease;
    }

    .fasilitas-item.reverse .img-frame {
        transform: rotate(2deg);
    }

    .fasilitas-item:hover .img-frame {
        transform: rotate(0deg) scale(1.02);
        box-shadow: 0 30px 60px rgba(0, 87, 179, 0.2);
    }

    .img-frame img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        display: block;
    }

    .fasilitas-info {
        flex: 1;
        padding: 20px;
    }

    .fasilitas-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .fasilitas-line {
        width: 80px;
        height: 4px;
        background: #ffc107;
        margin-bottom: 25px;
        border-radius: 2px;
    }

    .fasilitas-desc {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
        text-align: justify;
    }

    @media (max-width: 992px) {
        .fasilitas-item {
            flex-direction: column !important;
            gap: 30px;
            text-align: center;
        }

        .fasilitas-item.reverse {
            flex-direction: column !important;
        }

        .img-frame,
        .fasilitas-item.reverse .img-frame {
            transform: rotate(0deg);
            margin: 0 20px;
        }

        .img-frame img {
            height: 250px;
        }

        .fasilitas-line {
            margin: 20px auto;
        }

        .fasilitas-desc {
            text-align: center;
        }

        .fasilitas-wrapper {
            gap: 60px;
        }
    }
</style>
<?php include 'footer.php'; ?>