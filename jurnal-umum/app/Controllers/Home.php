<?php

namespace App\Controllers;

/**
 * Controller placeholder — BUKAN controller bisnis.
 *
 * Menampilkan halaman beranda sementara memakai layout kosong
 * sampai modul pembelajaran (5 tahap per bab) dibangun.
 */
class Home extends BaseController
{
    public function index(): string
    {
        return view('layouts/kosong', [
            'judulHalaman' => 'Beranda',
        ]);
    }
}
