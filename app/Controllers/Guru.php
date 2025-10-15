<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Guru extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Detail Guru',
            'menu' => 'detail',
            'page' => ''
        ];
    }
}
