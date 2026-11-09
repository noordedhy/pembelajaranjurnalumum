<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Beranda (sementara menampilkan layout kosong)
$routes->get('/', 'Home::index');

// Autentikasi (placeholder — logika login akan pindah ke app/Libraries/AuthService)
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::cobaLogin');
$routes->get('logout', 'Auth::logout');
