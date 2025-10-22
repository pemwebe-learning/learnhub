<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class AdminController extends BaseController
{
    
    public function index()
    {
        $data = [
            'judul' => 'Dashboard Admin',
            'menu' => 'dashboard_admin',
            'page' => 'dashboard_admin/v_dashboard_admin',
            
        ];
        return view('v_template_admin', $data);
    }

    

}
