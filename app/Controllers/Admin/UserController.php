<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelAdmin;

class UserController extends BaseController
{
    protected $ModelAdmin;

    public function __construct() {
        $this->ModelAdmin = new ModelAdmin();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data = [
            'judul' => 'User',
            'menu' => 'user',
            'page' => 'dashboard_admin/user/v_index',
            'admins' => $this->ModelAdmin->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input () {
        $data = [
            'judul' => 'Input Admin',
            'menu' => 'input_admin',
            'page' => 'dashboard_admin/user/v_input',
            'admin' => $this->ModelAdmin->findAll(),
        ];
        return view('v_template_admin' ,$data);
    }

}
