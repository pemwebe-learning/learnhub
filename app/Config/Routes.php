<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    // Dashboard
    $routes->get('/', 'AdminController::index');

    // 👥 User Management
    $routes->get('user', 'UserController::index');
    // $routes->get('users/create', 'UserController::create');
    // $routes->post('users/store', 'UserController::store');
    // $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    // $routes->post('users/update/(:num)', 'UserController::update/$1');
    // $routes->get('users/delete/(:num)', 'UserController::delete/$1');

    // 🏫 Kelas Management
    $routes->get('kelas', 'KelasController::index');
    // $routes->get('kelas/create', 'KelasController::create');
    // $routes->post('kelas/store', 'KelasController::store');
    // $routes->get('kelas/edit/(:num)', 'KelasController::edit/$1');
    // $routes->post('kelas/update/(:num)', 'KelasController::update/$1');
    // $routes->get('kelas/delete/(:num)', 'KelasController::delete/$1');

    // 📚 Mapel Management
    $routes->get('mapel', 'MapelController::index');
    // $routes->get('mapel/create', 'MapelController::create');
    // $routes->post('mapel/store', 'MapelController::store');
    // $routes->get('mapel/edit/(:num)', 'MapelController::edit/$1');
    // $routes->post('mapel/update/(:num)', 'MapelController::update/$1');
    // $routes->get('mapel/delete/(:num)', 'MapelController::delete/$1');

    // 📢 Pengumuman
    // $routes->get('pengumuman', 'PengumumanController::index');
    // $routes->get('pengumuman/create', 'PengumumanController::create');
    // $routes->post('pengumuman/store', 'PengumumanController::store');
    // $routes->get('pengumuman/edit/(:num)', 'PengumumanController::edit/$1');
    // $routes->post('pengumuman/update/(:num)', 'PengumumanController::update/$1');
    // $routes->get('pengumuman/delete/(:num)', 'PengumumanController::delete/$1');

    // 📈 Laporan
    // $routes->get('laporan', 'LaporanController::index');
    // $routes->get('laporan/download/(:num)', 'LaporanController::download/$1');

    //guru
    $routes->get('guru', 'GuruController::index');

    //siswa
    $routes->get('siswa', 'SiswaController::index');
});

