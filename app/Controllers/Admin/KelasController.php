<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKelas;
class KelasController extends BaseController
{
    protected $ModelKelas;

    public function __construct() {
        $this->ModelKelas = new ModelKelas();
        helper(['form', 'url']);
    }
    public function index()
    {
       $data = [
        'judul' => 'Kelas',
        'menu' => 'kelas',
        'page' => 'dashboard_admin/kelas/v_index',
        'kelas' => $this->ModelKelas->getKelasWithTingkat(),

        ];

        return view('v_template_admin', $data);
    }

    public function input() {
        $data = [
            'judul' => 'Input Kelas',
            'menu' => 'input_kelas',
            'page' => 'dasboard_admin/kelas/v_input'
        ];

        return view('v_template_admin', $data);
    }
}
