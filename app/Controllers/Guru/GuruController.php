<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GuruController extends BaseController
{
    public function index()
    {
         $data = [
            'judul' => 'Dashboard Guru',
            'menu' => 'dashboard_guru',
            'page' => 'dashboard_guru/v_dashboard_guru'
        ];
        return view('v_template_guru', $data);
    }
}
