<?php
/**
 * Layout guru — topbar + sidebar offcanvas (mobile-first).
 *
 * Menu: Dashboard, Pembelajaran, Data Siswa, Hasil Nilai, Profil, Keluar.
 *
 * Variabel yang dapat dikirim view anak:
 *  - $judulHalaman (string)
 *  - $isiKonten    (string) HTML konten (sudah di-esc() oleh view pengirim).
 */
$judulHalaman = $judulHalaman ?? 'Dashboard';
$namaGuru     = session()->get('nama_pengguna') ?? 'Guru Mata Pelajaran';
?> <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= esc(csrf_hash(), 'attr') ?>">
    <title><?= esc($judulHalaman) ?> — Guru | Jurnal Umum</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/vendor/datatables/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/animasi.css">
</head>
<body class="layout-guru">

    <!-- ================= TOPBAR ================= -->
    <nav class="topbar navbar fixed-top" aria-label="Bar navigasi atas">
        <div class="container-fluid px-3">
            <button class="btn btn-topbar-toggler d-lg-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#sidebarGuru"
                    aria-controls="sidebarGuru" aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand fw-semibold" href="/">
                <i class="bi bi-journal-check me-1"></i>Jurnal Umum
                <span class="badge text-bg-light ms-1">Guru</span>
            </a>
            <div class="dropdown ms-auto">
                <button class="btn btn-topbar-user dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-1"></i><?= esc($namaGuru) ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/guru/profil"><i class="bi bi-person me-2"></i>Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="/logout"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ================= SIDEBAR (offcanvas di layar kecil) ================= -->
    <div class="offcanvas offcanvas-start sidebar-offcanvas" tabindex="-1"
         id="sidebarGuru" aria-label="Menu navigasi guru">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title"><i class="bi bi-menu-button-wide me-2"></i>Menu Guru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="nav flex-column sidebar-menu">
                <li class="nav-item">
                    <a class="nav-link" href="/guru/dashboard">
                        <i class="bi bi-speedometer2"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/guru/pembelajaran">
                        <i class="bi bi-book"></i><span>Pembelajaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/guru/siswa">
                        <i class="bi bi-people"></i><span>Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/guru/nilai">
                        <i class="bi bi-bar-chart-line"></i><span>Hasil Nilai</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/guru/profil">
                        <i class="bi bi-person"></i><span>Profil</span>
                    </a>
                </li>
                <li class="nav-item mt-2 border-top pt-2">
                    <a class="nav-link text-danger" href="/logout">
                        <i class="bi bi-box-arrow-right"></i><span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- ================= KONTEN ================= -->
    <div class="konten-wrapper">
        <main class="konten-utama container-fluid py-4 px-3 px-lg-4" id="kontenUtama">
            <?= $isiKonten ?? '' ?>
        </main>
        <footer class="app-footer text-center small text-muted py-3">
            &copy; <?= date('Y') ?> SMK 17 Agustus 1945 Genteng — Media Pembelajaran Jurnal Umum
        </footer>
    </div>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/js/ajax-csrf.js"></script>
    <script src="/assets/js/validasi.js"></script>
    <script src="/assets/js/datatable-init.js"></script>
</body>
</html>
