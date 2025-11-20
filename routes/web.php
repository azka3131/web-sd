<?php

$routes = [
    '/' => 'HomeController@index',
    '/profil' => 'ProfilController@index',
    '/guru' => 'GuruController@index',
    '/berita' => 'BeritaController@index',
    '/berita/detail' => 'BeritaController@show',

    '/admin/login' => 'Admin\AuthController@loginForm',
    '/admin/login-process' => 'Admin\AuthController@login',
    '/admin/logout' => 'Admin\AuthController@logout',

    '/admin/dashboard' => 'Admin\DashboardController@index',
];

