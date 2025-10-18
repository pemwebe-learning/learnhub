<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PengumumanController extends BaseController
{
    public function index()
    {
         $data = [
        'judul' => 'Pengumuman',
        'menu' => 'pengumuman',
        'page' => 'dashboard_siswa/pengumuman/v_index',
        ];

        return view('v_template_siswa', $data);
    }
}
