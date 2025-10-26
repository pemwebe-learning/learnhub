<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use CodeIgniter\HTTP\ResponseInterface;

class GuruController extends BaseController
{
    protected $ModelGuru;

    public function __construct() {
        $this->ModelGuru = new ModelGuru();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data = [
            'judul' => 'Guru',
            'menu' => 'guru',
            'page' => 'dashboard_admin/guru/v_index',
            'guru' => $this->ModelGuru->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function input() {
        $data = [
            'judul' => 'Input Guru',
            'menu' => 'input_guru',
            'page' => 'dashboard_admin/guru/v_input',
            'guru' => $this->ModelGuru->findAll(),
        ];
        return view('v_template_admin', $data);
    }
}
