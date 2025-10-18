<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SiswaController extends BaseController
{
    public function index()
    {
         $data = [
            'judul' => 'Dashboard Siswa',
            'menu' => 'dashboard_siswa',
            'page' => 'dashboard_siswa/v_dashboard_siswa'
        ];
        return view('v_template_siswa', $data);
    }
}
