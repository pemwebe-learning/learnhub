<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MapelController extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Mapel',
            'menu' => 'mapel',
            'page' => 'dashboard_guru/mapel/v_index'
        ];
        return view('v_template_guru', $data);
    }
}
