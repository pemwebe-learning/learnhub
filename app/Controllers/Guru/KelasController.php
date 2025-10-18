<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KelasController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Kelas',
            'menu' => 'kelas',
            'page' => 'dashboard_guru/kelas/v_index'
        ];
        return view('v_template_guru', $data);
    }
}
