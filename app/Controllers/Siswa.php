<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Siswa extends BaseController
{
    public function index()
    {
        $data = [
        'judul' => 'Siswa',
        'menu' => 'detail',
        'page' => 'dashboard_admin/siswa/v_detail',
        ];

        return view('v_template_admin', $data);

    }
}
