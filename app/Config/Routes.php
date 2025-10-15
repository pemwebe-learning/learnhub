<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/detail', 'Admin::detail');
$routes->get('/guru', 'Guru::index');
$routes->get('/siswa', 'Siswa::index');
$routes->get('/kelas', 'Kelas::index');

