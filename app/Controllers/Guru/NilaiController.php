<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NilaiController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Nilai',
            'menu' => 'nilai',
            'page' => 'dashboard_guru/nilai/v_index'
        ];
        return view('v_template_guru', $data);
    }
}
