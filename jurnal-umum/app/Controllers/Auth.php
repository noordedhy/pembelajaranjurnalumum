<?php

namespace App\Controllers;

/**
 * Controller placeholder autentikasi.
 *
 * Menampilkan halaman login (layout auth) dan menangani keluar.
 * Proses login sesungguhnya (verifikasi kredensial, session hardening)
 * akan diimplementasikan pada modul auth bersama app/Libraries/AuthService.
 */
class Auth extends BaseController
{
    /**
     * Tampilkan halaman login.
     */
    public function login(): string
    {
        return view('auth/login', [
            'judulHalaman' => 'Masuk',
        ]);
    }

    /**
     * Placeholder proses login — belum memverifikasi kredensial.
     * TODO (modul auth): validasi + AuthService::attempt() via Libraries.
     */
    public function cobaLogin()
    {
        return redirect()->to('/login')->with(
            'notifikasi',
            ['tipe' => 'info', 'pesan' => 'Modul autentikasi belum diaktifkan.']
        );
    }

    /**
     * Hancurkan session lalu kembali ke halaman login.
     */
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
