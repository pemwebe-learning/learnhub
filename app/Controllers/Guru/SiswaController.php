<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SiswaController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Siswa',
            'menu' => 'siswa',
            'page' => 'dashboard_guru/siswa/v_index'
        ];
        return view('v_template_guru', $data);
    }
}
