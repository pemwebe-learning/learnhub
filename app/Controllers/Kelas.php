<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kelas extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => 'Kelas',
        'menu' => 'detail',
        'page' => 'dashboard_admin/kelas/v_detail',
        ];

        return view('v_template_admin', $data);
    }
}
