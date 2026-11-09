<?php
/**
 * Layout auth — khusus halaman login (tanpa sidebar/topbar).
 *
 * Variabel yang dapat dikirim view anak:
 *  - $judulHalaman (string)
 *  - $isiKonten    (string) HTML konten; seluruhnya sudah di-esc() oleh view pengirim.
 */
$judulHalaman = $judulHalaman ?? 'Masuk';
?> <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= esc(csrf_hash(), 'attr') ?>">
    <title><?= esc($judulHalaman) ?> — Media Pembelajaran Jurnal Umum</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/animasi.css">
</head>
<body class="layout-auth d-flex align-items-center justify-content-center min-vh-100">
    <main class="auth-wrapper w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                    <div class="text-center mb-4">
                        <span class="auth-logo d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-journal-check"></i>
                        </span>
                        <h1 class="h4 mt-3 mb-1">Jurnal Umum</h1>
                        <p class="text-secondary small mb-0">
                            Media Pembelajaran &mdash; SMK 17 Agustus 1945 Genteng
                        </p>
                    </div>

                    <?php if ($notifikasi = session()->getFlashdata('notifikasi')): ?>
                        <div class="alert alert-<?= esc($notifikasi['tipe'] ?? 'info') ?> alert-dismissible fade show" role="alert">
                            <?= esc($notifikasi['pesan'] ?? '') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                        </div>
                    <?php endif; ?>

                    <?= $isiKonten ?? '' ?>

                    <p class="text-center text-muted small mt-4 mb-0">
                        &copy; <?= date('Y') ?> SMK 17 Agustus 1945 Genteng
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/ajax-csrf.js"></script>
</body>
</html>
