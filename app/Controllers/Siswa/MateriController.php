<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MateriController extends BaseController
{
    public function index()
    {
         $data = [
        'judul' => 'Materi',
        'menu' => 'materi',
        'page' => 'dashboard_siswa/materi/v_index',
        ];

        return view('v_template_siswa', $data);
    }
}
