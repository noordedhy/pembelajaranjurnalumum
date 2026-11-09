<?php
/**
 * Layout kosong — beranda sementara fondasi proyek.
 * Menampilkan identitas aplikasi tanpa menu bisnis.
 *
 * @var string $judulHalaman
 */
?> <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= esc(csrf_hash(), 'attr') ?>">
    <title><?= esc($judulHalaman ?? 'Beranda') ?> — Media Pembelajaran Jurnal Umum</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/animasi.css">
</head>
<body class="layout-kosong">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">
                <h1 class="app-judul"><?= esc($judulHalaman ?? 'Media Pembelajaran Jurnal Umum') ?></h1>
                <p class="text-secondary">
                    SMK 17 Agustus 1945 Genteng &mdash; Kelas X AKL
                </p>
                <p class="small text-muted mb-4">
                    Fondasi proyek telah siap. Modul pembelajaran (Video &rarr; Ringkasan &rarr;
                    Simulasi &rarr; Mini Game &rarr; Kuis) akan menyusul.
                </p>
                <a href="/login" class="btn btn-primary">Ke Halaman Masuk</a>
            </div>
        </div>
    </main>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/ajax-csrf.js"></script>
</body>
</html>
