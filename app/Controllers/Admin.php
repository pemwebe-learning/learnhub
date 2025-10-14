<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        // $data = [
        //     'judul' => 'dashboard admin',
        //     'page' => 'v_template_admin'
        // ];
        return view('v_template_admin');
    }
}
