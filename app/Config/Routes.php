<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Admin
$routes->setAutoRoute(false);
$routes->get('/login', 'User\LoginController::index');
$routes->post('/login/auth', 'User\LoginController::auth');
$routes->get('/logout', 'User\LoginController::logout');

// lupa password
$routes->get('/lupa-password', 'User\LupaPwdController::lupaPassword');
$routes->post('/send-email', 'User\LupaPwdController::send_email');

// reset password
$routes->get('/reset-password', 'User\LupaPwdController::resetPwd');
$routes->post('resetpassword', 'User\LupaPwdController::resetProcess');

$routes->group('', ['filter' => 'auth'], function ($routes) {

    // $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('/admin/dashboard', 'Admin\DashboardController::index');

    // Admin-ProfilPerusahaan
    $routes->get('admin/profil-perusahaan', 'Admin\ProfilPerusahaanController::index');
    $routes->get('admin/profil-perusahaan/tambah', 'Admin\ProfilPerusahaanController::v_tambah');
    $routes->post('admin/profil-perusahaan/tambah', 'Admin\ProfilPerusahaanController::store');
    $routes->get('admin/profil-perusahaan/edit', 'Admin\ProfilPerusahaanController::v_edit');
    $routes->post('admin/profil-perusahaan/edit', 'Admin\ProfilPerusahaanController::updateAll');

    //route admin-produk
    $routes->get('admin/kategori-produk', 'Admin\ProdukController::v_katProduk');
    $routes->post('admin/kategori-produk/tambah', 'Admin\ProdukController::tambah');
    $routes->put('admin/kategori-produk/ubah/(:num)', 'Admin\ProdukController::update/$1');
    $routes->delete('admin/kategori-produk/hapus/(:num)', 'Admin\ProdukController::destroy/$1');

    $routes->get('admin/daftar-produk', 'Admin\ProdukController::v_produk');
    $routes->get('admin/daftar-produk/tambah', 'Admin\ProdukController::v_tambah');
    $routes->post('admin/daftar-produk/tambah', 'Admin\ProdukController::p_tambah');
    $routes->get('admin/daftar-produk/edit/(:num)', 'Admin\ProdukController::v_edit/$1');
    $routes->put('admin/daftar-produk/ubah/(:num)', 'Admin\ProdukController::p_edit/$1');
    $routes->delete('admin/daftar-produk/hapus/(:num)', 'Admin\ProdukController::p_hapus/$1');

    // route admin-jasa
    $routes->get('admin/daftar-jasa', 'Admin\JasaController::v_jasa');
    $routes->post('admin/daftar-jasa/tambah', 'Admin\JasaController::p_tambah');
    $routes->put('admin/daftar-jasa/ubah/(:num)', 'Admin\JasaController::p_edit/$1');
    $routes->delete('admin/daftar-jasa/hapus/(:num)', 'Admin\JasaController::p_hapus/$1');

    $routes->get('admin/daftar-jasa/sampel/(:num)', 'Admin\JasaController::v_sampel/$1');
    $routes->post('admin/daftar-jasa/sampel/tambah', 'Admin\JasaController::p_tambahSampel');
    $routes->delete('admin/daftar-jasa/sampel/hapus/(:num)', 'Admin\JasaController::p_hapusSampel/$1');

    $routes->get('admin/daftar-jasa/komponen/(:num)', 'Admin\JasaController::v_komponen/$1');
    $routes->post('admin/daftar-jasa/komponen/tambah', 'Admin\JasaController::p_tambahKomponen');
    $routes->put('admin/daftar-jasa/komponen/ubah/(:num)', 'Admin\JasaController::p_editKomponen/$1');
    $routes->delete('admin/daftar-jasa/komponen/hapus/(:num)', 'Admin\JasaController::p_hapusKomponen/$1');

    // // route admin-Dokumentasi
    $routes->get('admin/dokumentasi', 'Admin\DokumentasiController::v_dokumentasi');
    $routes->post('admin/dokumentasi/tambah', 'Admin\DokumentasiController::p_tambah');
    $routes->put('admin/dokumentasi/ubah/(:num)', 'Admin\DokumentasiController::p_edit/$1');
    $routes->delete('admin/dokumentasi/hapus/(:num)', 'Admin\DokumentasiController::p_hapus/$1');

    // route admin-kontak
    $routes->get('admin/kontak', 'Admin\KontakController::v_kontak');
    $routes->post('admin/kontak/tambah', 'Admin\KontakController::p_tambahKontak');
    $routes->put('admin/kontak/ubah', 'Admin\KontakController::p_editKontak');

    $routes->post('admin/kontak/sosmed/tambah', 'Admin\KontakController::p_tambahSosmed');
    $routes->put('admin/kontak/sosmed/ubah/(:num)', 'Admin\KontakController::p_edit/$1');
    $routes->delete('admin/kontak/sosmed/hapus/(:num)', 'Admin\KontakController::p_hapusSosmed/$1');


    // route admin-kerjasama
    $routes->get('admin/distributor', 'Admin\KerjasamaController::v_kerjasama');
    $routes->post('admin/distributor/tambah', 'Admin\KerjasamaController::p_tambah');
    $routes->put('admin/distributor/ubah/(:num)', 'Admin\KerjasamaController::p_edit/$1');
    $routes->delete('admin/distributor/hapus/(:num)', 'Admin\KerjasamaController::p_hapus/$1');


    // route admin-kelola-pengguna
    $routes->get('admin/kelola-pengguna', 'Admin\KelolaPenggunaController::v_kelolaPengguna');
    $routes->post('admin/kelola-pengguna/tambah', 'Admin\KelolaPenggunaController::p_tambah');
    $routes->put('admin/kelola-pengguna/ubah/(:num)', 'Admin\KelolaPenggunaController::p_edit/$1');
    $routes->delete('admin/kelola-pengguna/hapus/(:num)', 'Admin\KelolaPenggunaController::p_hapus/$1');

    // route admin-profil-pengguna
    $routes->get('admin/profil-pengguna', 'Admin\UserController::v_profilPengguna');
    $routes->put('admin/profil-pengguna/ubah/(:num)', 'Admin\UserController::p_edit/$1');
});

// End Admin


// Pengunjung
$routes->get('/', 'Pengunjung\PagesController::index');
$routes->get('/beranda', 'Pengunjung\PagesController::v_beranda');
$routes->get('/tentang-kami', 'Pengunjung\PagesController::v_profil');
$routes->get('/produk', 'Pengunjung\PagesController::v_produk');
$routes->get('/produk/(:num)', 'Pengunjung\PagesController::v_produkDetail/$1');
$routes->get('/jasa', 'Pengunjung\PagesController::v_jasa');
$routes->get('/jasa/(:num)', 'Pengunjung\PagesController::v_jasaDetail/$1');
$routes->get('/dokumentasi', 'Pengunjung\PagesController::v_dokumentasi');
$routes->get('/kontak', 'Pengunjung\PagesController::v_kontak');
$routes->get('/distributor', 'Pengunjung\PagesController::v_kerjasama');






