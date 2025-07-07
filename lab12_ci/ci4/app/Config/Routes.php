<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman publik
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

// Artikel publik
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

// Autentikasi
$routes->get('login', 'Auth::login');              // Tampilkan form login
$routes->post('login', 'Auth::attemptLogin');      // Proses login
$routes->get('logout', 'Auth::logout');            // Logout user

// Grup admin, dilindungi oleh filter 'auth'
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');              // List artikel admin
    $routes->add('artikel/add', 'Artikel::add');                  // Tambah artikel
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');      // Edit artikel
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');  // Hapus artikel
});

// Nonaktifkan auto routing demi keamanan
$routes->setAutoRoute(false);
