<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LookerController extends BaseController
{
    public function index()
    {
        $data = [
        'judul' => 'Looker Studio',
        'menu' => 'looker',
        'page' => 'dashboard_admin/v_looker',
        ];

        return view('v_template_admin', $data);
    }
}
