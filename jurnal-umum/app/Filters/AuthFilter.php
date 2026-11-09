<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Filter autentikasi & otorisasi berbasis session.
 *
 * Penggunaan pada Routes:
 *   $routes->get('/guru/...', 'Guru\...', ['filter' => 'auth:guru']);
 *   $routes->get('/siswa/...', 'Siswa\...', ['filter' => 'auth:siswa']);
 *
 * Catatan: filter ini adalah placeholder fondasi. Logika otorisasi
 * lengkap (cek peran, status akun) akan dikembangkan pada modul auth.
 */
class AuthFilter implements FilterInterface
{
    /**
     * Alihkan pengguna yang belum login ke halaman login.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->has('id_pengguna')) {
            return redirect()->to('/login')->with(
                'notifikasi',
                ['tipe' => 'warning', 'pesan' => 'Silakan masuk terlebih dahulu.']
            );
        }

        // Cek peran bila diberikan sebagai argumen, contoh: auth:guru
        if ($arguments !== null && $arguments !== []) {
            $peranDiizinkan = $arguments;
            $peranSaatIni   = (string) $session->get('peran');

            if (! in_array($peranSaatIni, $peranDiizinkan, true)) {
                return service('response')
                    ->setStatusCode(403)
                    ->setBody('Akses ditolak.');
            }
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
