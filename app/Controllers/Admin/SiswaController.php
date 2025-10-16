<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SiswaController extends BaseController
{
     public function index()
    {
        $data = [
        'judul' => 'Siswa',
        'menu' => 'siswa',
        'page' => 'dashboard_admin/siswa/v_index',
        ];

        return view('v_template_admin', $data);

    }
}
