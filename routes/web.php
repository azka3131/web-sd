<?php

$routes = [
    // === ROUTES PUBLIK (PENGUNJUNG) ===
    '/' => 'HomeController@index',

    // --- PROFIL (DIPISAH MENJADI 3) ---
    '/profil/visi-misi' => 'ProfilController@visiMisi',
    '/profil/sejarah'   => 'ProfilController@sejarah',
    '/profil/struktur'  => 'ProfilController@struktur',

    '/guru' => 'GuruController@index',
    '/berita' => 'BeritaController@index',
    '/berita/detail' => 'BeritaController@show',
    '/galeri' => 'GaleriController@index',
    '/fasilitas' => 'FasilitasController@index',

    // === ROUTES ADMIN AUTH ===
    '/admin/login' => 'Admin\AuthController@loginForm',
    '/admin/login-process' => 'Admin\AuthController@login',
    '/admin/logout' => 'Admin\AuthController@logout',

    // === ROUTES ADMIN DASHBOARD ===
    '/admin/dashboard' => 'Admin\DashboardController@index',

    // === ROUTES ADMIN BERITA ===
    '/admin/berita' => 'Admin\BeritaController@index',
    '/admin/berita/tambah' => 'Admin\BeritaController@create',
    '/admin/berita/simpan' => 'Admin\BeritaController@store',
    '/admin/berita/edit' => 'Admin\BeritaController@edit',
    '/admin/berita/update' => 'Admin\BeritaController@update',
    '/admin/berita/hapus' => 'Admin\BeritaController@delete',
    '/admin/berita/status' => 'Admin\BeritaController@setStatus',

    // === ROUTES ADMIN GURU ===
    '/admin/guru' => 'Admin\GuruController@index',
    '/admin/guru/tambah' => 'Admin\GuruController@create',
    '/admin/guru/simpan' => 'Admin\GuruController@store',
    '/admin/guru/edit' => 'Admin\GuruController@edit',
    '/admin/guru/update' => 'Admin\GuruController@update',
    '/admin/guru/hapus' => 'Admin\GuruController@delete',

    // === ROUTES ADMIN GALERI ===
    '/admin/galeri' => 'Admin\GaleriController@index',
    '/admin/galeri/tambah' => 'Admin\GaleriController@create',
    '/admin/galeri/simpan' => 'Admin\GaleriController@store',
    '/admin/galeri/hapus' => 'Admin\GaleriController@delete',
    '/admin/galeri/edit' => 'Admin\GaleriController@edit',
    '/admin/galeri/update' => 'Admin\GaleriController@update',

    // === ROUTES ADMIN FASILITAS ===
    '/admin/fasilitas' => 'Admin\FasilitasController@index',
    '/admin/fasilitas/tambah' => 'Admin\FasilitasController@create',
    '/admin/fasilitas/simpan' => 'Admin\FasilitasController@store',
    '/admin/fasilitas/hapus' => 'Admin\FasilitasController@delete',
    '/admin/fasilitas/edit' => 'Admin\FasilitasController@edit',
    '/admin/fasilitas/update' => 'Admin\FasilitasController@update',

    // === ROUTES ADMIN STRUKTUR ORGANISASI ===
    '/admin/struktur' => 'Admin\StrukturController@index',
    '/admin/struktur/create' => 'Admin\StrukturController@create', 
    '/admin/struktur/simpan' => 'Admin\StrukturController@store',
    '/admin/struktur/edit'   => 'Admin\StrukturController@edit',
    '/admin/struktur/update' => 'Admin\StrukturController@update',
    '/admin/struktur/delete'  => 'Admin\StrukturController@delete',

    // ADMIN INFO SEKOLAH (STATISTIK)
    '/admin/info' => 'Admin\InfoController@index',
    '/admin/info/update' => 'Admin\InfoController@update',

    // ... (Kode sebelumnya)

    // === ROUTES PUBLIK BARU ===
    '/ppdb'     => 'PpdbController@index',
    '/prestasi' => 'PrestasiController@index',

// ... (Di bagian Admin, tambahkan ini)

    // === ROUTES ADMIN PPDB ===
    '/admin/ppdb'        => 'Admin\PpdbController@index',
    '/admin/ppdb/update' => 'Admin\PpdbController@update',

    // === ROUTES ADMIN PRESTASI ===
    '/admin/prestasi'        => 'Admin\PrestasiController@index',
    '/admin/prestasi/tambah' => 'Admin\PrestasiController@create',
    '/admin/prestasi/simpan' => 'Admin\PrestasiController@store',
    '/admin/prestasi/edit'   => 'Admin\PrestasiController@edit',
    '/admin/prestasi/update' => 'Admin\PrestasiController@update',
    '/admin/prestasi/hapus'  => 'Admin\PrestasiController@delete',

    // ... route yang sudah ada ...
    
    // Route Admin Visi Misi
    '/admin/visi-misi' => 'Admin\VisiMisiController@index',
    '/admin/visi-misi/update' => 'Admin\VisiMisiController@update',
    
    // Route Admin Sejarah
    '/admin/sejarah' => 'Admin\SejarahController@index',
    '/admin/sejarah/update' => 'Admin\SejarahController@update',

// ... (Kode sesudahnya)

];

