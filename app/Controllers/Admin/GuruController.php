<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GuruController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Guru',
            'menu' => 'guru',
            'page' => 'dashboard_admin/guru/v_index'
        ];
        return view('v_template_admin', $data);
    }
}
