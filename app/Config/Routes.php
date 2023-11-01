<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Pages::index');


$routes->get('/buku', 'Buku::index');
// tambah
$routes->get('/buku/tambah', 'Buku::tambah');
$routes->post('/buku/simpan', 'Buku::simpan');

// ubah
$routes->get('buku/ubah/(:segment)', 'Buku::ubah/$1');
$routes->post('/buku/update/(:num)', 'Buku::update/$1');
// hapus
$routes->delete('/buku/(:num)', 'Buku::hapus/$1');

$routes->get('/buku/(:any)', 'Buku::detail/$1');


$routes->get('/anggota', 'Anggota::index');
// tambah
$routes->get('/anggota/tambah', 'Anggota::tambah');
$routes->post('/anggota/simpan', 'Anggota::simpan');

// ubah
$routes->get('anggota/ubah/(:segment)', 'Anggota::ubah/$1');
$routes->post('/anggota/update/(:num)', 'Anggota::update/$1');
// hapus
$routes->delete('/anggota/(:num)', 'Anggota::hapus/$1');

$routes->get('/anggota/(:any)', 'Anggota::detail/$1');