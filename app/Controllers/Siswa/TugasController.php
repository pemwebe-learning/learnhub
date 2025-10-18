<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TugasController extends BaseController
{
    public function index()
    {
         $data = [
        'judul' => 'Tugas',
        'menu' => 'tugas',
        'page' => 'dashboard_siswa/tugas/v_index',
        ];

        return view('v_template_siswa', $data);
    }
}
