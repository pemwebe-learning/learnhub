<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard Admin',
            'menu' => 'dashboard_admin',
            'page' => 'dashboard_admin/admin/v_dashboard_admin'
        ];
        return view('v_template_admin', $data);
    }

     public function detail()
    {
        $data = [
            'judul' => 'Detail Admin',
            'menu' => 'detail',
            'page' => 'dashboard_admin/admin/v_detail'
        ];
        return view('v_template_admin', $data);
    }
}
