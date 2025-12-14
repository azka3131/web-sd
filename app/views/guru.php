<?php include 'header.php'; ?>

<div class="container" style="padding: 50px 0;">

    <div class="section-header" style="text-align: center; margin-bottom: 50px;">
        <h1 style="font-size: 2.5em; color: #3F4C52; font-weight: 800;">Daftar Guru & Staf</h1>
        <p style="color: #888;">Tenaga pendidik profesional SD Negeri 2 Dukuhbenda.</p>
        <div style="width: 80px; height: 4px; background: #4FB6C7; margin: 25px auto; border-radius: 2px;"></div>
    </div>

    <div class="guru-grid">
        <?php foreach ($data as $g) : ?>
            <div class="guru-card">
                <?php if (!empty($g['foto'])): ?>
                    <img src="/kp-sd2-dukuhbenda/public/assets/img/guru/<?= $g['foto']; ?>" alt="<?= $g['nama']; ?>">
                <?php else: ?>
                    <img src="/kp-sd2-dukuhbenda/public/assets/img/default-user.png" alt="Default">
                <?php endif; ?>

                <h3><?= $g['nama']; ?></h3>
                <span class="badge-jabatan"><?= $g['jabatan']; ?></span>

                <?php if (!empty($g['pendidikan'])): ?>
                    <p class="pendidikan"><i class="fas fa-graduation-cap"></i> <?= $g['pendidikan']; ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<style>
    .guru-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 30px;
    }

    .guru-card {
        background: white;
        padding: 30px 20px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
        transition: transform 0.3s;
    }

    .guru-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(79, 182, 199, 0.15);
        border-color: #4FB6C7;
    }

    .guru-card img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        /* Membuat foto bulat */
        margin-bottom: 15px;
        border: 3px solid #eef4fc;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .guru-card h3 {
        color: #3F4C52;
        font-size: 1.1em;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .badge-jabatan {
        display: inline-block;
        background: #eef4fc;
        color: #4FB6C7;
        font-size: 0.85em;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .pendidikan {
        color: #888;
        font-size: 0.9em;
        margin-top: 10px;
    }

    .pendidikan i {
        color: #4FB6C7;
        margin-right: 5px;
    }
</style>

<?php include 'footer.php'; ?>