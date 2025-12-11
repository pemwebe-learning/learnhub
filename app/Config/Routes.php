<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//login admin
$routes->get('login_admin', 'LoginAdmin::index');
$routes->post('proses_login_admin', 'LoginAdmin::prosesLoginAdmin');
$routes->get('logout_admin', 'LoginAdmin::logout');
//login guru
$routes->get('login_guru', 'LoginGuru::index');
$routes->post('proses_login_guru', 'LoginGuru::prosesLoginGuru');
$routes->get('logout_guru', 'LoginGuru::logout');
//Login Siswa
$routes->get('login_siswa', 'LoginSiswa::index');
$routes->post('proses_login_siswa', 'LoginSiswa::prosesLoginSiswa');
$routes->get('logout_siswa', 'LoginSiswa::logout');

// ROUTING ADMIN
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'AdminController::index');

    // 👥 User Management
    $routes->get('user', 'UserController::index');
    $routes->get('user/input/', 'UserController::input');
    $routes->post('user/insertdata', 'UserController::InsertData');
    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('user/update/(:num)', 'UserController::UpdateData/$1');
    $routes->get('user/delete/(:num)', 'UserController::DeleteData/$1');
    $routes->get('user/detail/(:num)', 'UserController::DetailData/$1');

    // 🏫 Kelas Management
    $routes->get('kelas', 'KelasController::index');
    $routes->get('kelas/input', 'KelasController::input');
    $routes->post('kelas/insertdata', 'KelasController::InsertData');
    $routes->get('kelas/edit/(:num)', 'KelasController::edit/$1');
    $routes->post('kelas/update/(:num)', 'KelasController::UpdateData/$1');
    $routes->get('kelas/delete/(:num)', 'KelasController::delete/$1');

    //guru
    $routes->get('guru', 'GuruController::index');
    $routes->get('guru/input', 'GuruController::input');
    $routes->post('guru/insertdata', 'GuruController::InsertData');
    $routes->get('guru/edit/(:num)', 'GuruController::edit/$1');
    $routes->post('guru/update/(:num)', 'GuruController::UpdateData/$1');
    $routes->get('guru/delete/(:num)', 'GuruController::DeleteData/$1');
    $routes->get('guru/detail/(:num)', 'GuruController::DetailData/$1');


    //siswa
    $routes->get('siswa', 'SiswaController::index');
    $routes->get('siswa/input', 'SiswaController::input');
    $routes->post('siswa/insertdata', 'SiswaController::InsertData');
    $routes->get('siswa/edit/(:num)', 'SiswaController::edit/$1');
    $routes->post('siswa/update/(:num)', 'SiswaController::UpdateData/$1');
    $routes->get('siswa/delete/(:num)', 'SiswaController::DeleteData/$1');
    $routes->get('siswa/detail/(:num)', 'SiswaController::DetailData/$1');


    //pengumuman
    $routes->get('pengumuman', 'PengumumanController::index');
    $routes->get('pengumuman/input', 'PengumumanController::input');
    $routes->post('pengumuman/insertdata', 'PengumumanController::InsertData');
    $routes->get('pengumuman/edit/(:num)', 'PengumumanController::edit/$1');
    $routes->post('pengumuman/update/(:num)', 'PengumumanController::UpdateData/$1');
    $routes->get('pengumuman/delete/(:num)', 'PengumumanController::DeleteData/$1');
    

    //mapel
    $routes->get('mapel', 'MapelController::index');
    $routes->get('mapel/input', 'MapelController::input');
    $routes->post('mapel/insertdata', 'MapelController::InsertData');
    $routes->get('mapel/edit/(:num)', 'MapelController::edit/$1');
    $routes->post('mapel/update/(:num)', 'MapelController::UpdateData/$1');
    $routes->get('mapel/delete/(:num)', 'MapelController::DeleteData/$1');
    
});

//ROUTING GURU
$routes->group('guru', ['namespace' => 'App\Controllers\Guru'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'GuruController::index');
    $routes->get('edit/(:num)', 'GuruController::edit/$1');
    $routes->post('update/(:num)', 'GuruController::UpdateData/$1');

    //mapel
    $routes->get('mapel', 'MapelController::index');

    //materi
    $routes->get('materi/(:num)', 'MateriController::index/$1');
    $routes->get('materi/(:num)/input', 'MateriController::input/$1');
    $routes->post('materi/insertdata', 'MateriController::InsertData');
    $routes->get('materi/edit/(:num)/(:num)', 'MateriController::edit/$1/$2');
    $routes->post('materi/update/(:num)', 'MateriController::UpdateData/$1');
    $routes->get('materi/delete/(:num)/(:num)', 'MateriController::DeleteData/$1/$2');


    //pengumuman
    $routes->get('pengumuman', 'PengumumanController::index');

});



//ROUTING SISWA
$routes->group('siswa', ['namespace' => 'App\Controllers\Siswa'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'SiswaController::index');
    $routes->get('edit/(:num)', 'SiswaController::edit/$1');
     $routes->post('update/(:num)', 'SiswaController::UpdateData/$1');
    

    //mapel
    $routes->get('mapel', 'MapelController::index');

    //materi
    $routes->get('materi/(:num)', 'MateriController::index/$1');
    //pengumuman
    $routes->get('pengumuman', 'PengumumanController::index');
});




