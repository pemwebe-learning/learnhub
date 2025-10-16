<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KelasController extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => 'Kelas',
        'menu' => 'kelas',
        'page' => 'dashboard_admin/kelas/v_index',
        ];

        return view('v_template_admin', $data);
    }
}
