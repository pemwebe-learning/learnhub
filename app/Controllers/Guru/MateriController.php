<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MateriController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Materi',
            'menu' => 'materi',
            'page' => 'dashboard_guru/materi/v_index'
        ];
        return view('v_template_guru', $data);
    }
}
