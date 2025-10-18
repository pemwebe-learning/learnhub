<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TugasController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Tugas',
            'menu' => 'tugas',
            'page' => 'dashboard_guru/tugas/v_index'
        ];
        return view('v_template_guru', $data);
    }
}
