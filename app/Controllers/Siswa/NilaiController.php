<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NilaiController extends BaseController
{
    public function index()
    {
         $data = [
        'judul' => 'Nilai',
        'menu' => 'nilai',
        'page' => 'dashboard_siswa/nilai/v_index',
        ];

        return view('v_template_siswa', $data);
    }
}
