<?php

$routes = [
    // === HOME & PUBLIC ===
    '/' => 'HomeController@index',
    '/profil' => 'ProfilController@index',
    '/profil/visi-misi' => 'ProfilController@visiMisi',
    '/profil/sejarah'   => 'ProfilController@sejarah',
    '/profil/struktur'  => 'ProfilController@struktur',
    '/guru' => 'GuruController@index',
    '/berita' => 'BeritaController@index',
    '/berita/detail' => 'BeritaController@show',
    '/galeri' => 'GaleriController@index',
    '/fasilitas' => 'FasilitasController@index',
    '/ppdb'     => 'PpdbController@index',
    '/prestasi' => 'PrestasiController@index',

    // === ADMIN AUTH ===
    '/admin/login' => 'Admin\AuthController@loginForm',
    '/admin/login-process' => 'Admin\AuthController@login',
    '/admin/logout' => 'Admin\AuthController@logout',

    // === ADMIN DASHBOARD ===
    '/admin/dashboard' => 'Admin\DashboardController@index',

    // === ADMIN BERITA ===
    '/admin/berita'         => 'Admin\BeritaController@index',
    '/admin/berita/tambah'  => 'Admin\BeritaController@create', // Link tombol View
    '/admin/berita/create'  => 'Admin\BeritaController@create', // Backup
    '/admin/berita/store'   => 'Admin\BeritaController@store',  // Action Form baru
    '/admin/berita/simpan'  => 'Admin\BeritaController@store',  // Action Form lama (jaga-jaga)
    '/admin/berita/edit'    => 'Admin\BeritaController@edit',
    '/admin/berita/update'  => 'Admin\BeritaController@update',
    '/admin/berita/hapus'   => 'Admin\BeritaController@delete', // <--- INI PERBAIKANNYA (Sesuai error)
    '/admin/berita/delete'  => 'Admin\BeritaController@delete', // Backup
    '/admin/berita/status'  => 'Admin\BeritaController@setStatus',

    // === ADMIN GURU ===
    '/admin/guru'         => 'Admin\GuruController@index',
    '/admin/guru/tambah'  => 'Admin\GuruController@create',
    '/admin/guru/create'  => 'Admin\GuruController@create',
    '/admin/guru/store'   => 'Admin\GuruController@store',
    '/admin/guru/simpan'  => 'Admin\GuruController@store',
    '/admin/guru/edit'    => 'Admin\GuruController@edit',
    '/admin/guru/update'  => 'Admin\GuruController@update',
    '/admin/guru/hapus'   => 'Admin\GuruController@delete', // Support bhs Indonesia
    '/admin/guru/delete'  => 'Admin\GuruController@delete',

    // === ADMIN GALERI ===
    '/admin/galeri'         => 'Admin\GaleriController@index',
    '/admin/galeri/tambah'  => 'Admin\GaleriController@create',
    '/admin/galeri/create'  => 'Admin\GaleriController@create',
    '/admin/galeri/store'   => 'Admin\GaleriController@store',
    '/admin/galeri/simpan'  => 'Admin\GaleriController@store',
    '/admin/galeri/edit'    => 'Admin\GaleriController@edit',
    '/admin/galeri/update'  => 'Admin\GaleriController@update',
    '/admin/galeri/hapus'   => 'Admin\GaleriController@delete', // Support bhs Indonesia
    '/admin/galeri/delete'  => 'Admin\GaleriController@delete',

    // === ADMIN FASILITAS ===
    '/admin/fasilitas'        => 'Admin\FasilitasController@index',
    '/admin/fasilitas/tambah' => 'Admin\FasilitasController@create',
    '/admin/fasilitas/create' => 'Admin\FasilitasController@create',
    '/admin/fasilitas/store'  => 'Admin\FasilitasController@store',
    '/admin/fasilitas/simpan' => 'Admin\FasilitasController@store',
    '/admin/fasilitas/edit'   => 'Admin\FasilitasController@edit',
    '/admin/fasilitas/update' => 'Admin\FasilitasController@update',
    '/admin/fasilitas/hapus'  => 'Admin\FasilitasController@delete', // Support bhs Indonesia
    '/admin/fasilitas/delete' => 'Admin\FasilitasController@delete',

    // === ADMIN STRUKTUR ===
    '/admin/struktur'         => 'Admin\StrukturController@index',
    '/admin/struktur/tambah'  => 'Admin\StrukturController@create',
    '/admin/struktur/create'  => 'Admin\StrukturController@create',
    '/admin/struktur/store'   => 'Admin\StrukturController@store',
    '/admin/struktur/simpan'  => 'Admin\StrukturController@store',
    '/admin/struktur/edit'    => 'Admin\StrukturController@edit',
    '/admin/struktur/update'  => 'Admin\StrukturController@update',
    '/admin/struktur/hapus'   => 'Admin\StrukturController@delete', // Support bhs Indonesia
    '/admin/struktur/delete'  => 'Admin\StrukturController@delete',

    // === ADMIN PRESTASI ===
    '/admin/prestasi'         => 'Admin\PrestasiController@index',
    '/admin/prestasi/tambah'  => 'Admin\PrestasiController@create',
    '/admin/prestasi/create'  => 'Admin\PrestasiController@create',
    '/admin/prestasi/store'   => 'Admin\PrestasiController@store',
    '/admin/prestasi/simpan'  => 'Admin\PrestasiController@store',
    '/admin/prestasi/edit'    => 'Admin\PrestasiController@edit',
    '/admin/prestasi/update'  => 'Admin\PrestasiController@update',
    '/admin/prestasi/hapus'   => 'Admin\PrestasiController@delete', // Support bhs Indonesia
    '/admin/prestasi/delete'  => 'Admin\PrestasiController@delete',

    // === ADMIN LAINNYA ===
    '/admin/info' => 'Admin\InfoController@index',
    '/admin/info/update' => 'Admin\InfoController@update',
    
    '/admin/visi-misi' => 'Admin\VisiMisiController@index',
    '/admin/visi-misi/update' => 'Admin\VisiMisiController@update',
    
    '/admin/sejarah' => 'Admin\SejarahController@index',
    '/admin/sejarah/update' => 'Admin\SejarahController@update',

    '/admin/ppdb' => 'Admin\PpdbController@index',
    '/admin/ppdb/update' => 'Admin\PpdbController@update',
];