<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'User',
            'menu' => 'user',
            'page' => 'dashboard_admin/user/v_index'
        ];
        return view('v_template_admin', $data);
    }
}
