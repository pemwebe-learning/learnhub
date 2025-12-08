<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPengumuman;

class PengumumanController extends BaseController
{
    protected $ModelPengumuman;

    public function __construct() {
        $this->ModelPengumuman = new ModelPengumuman();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data = [
            'judul' => 'Pengumuman',
            'menu' => 'pengumuman',
            'page' => 'dashboard_guru/pengumuman/v_index',
            'pengumuman' => $this->ModelPengumuman->findAll()
        ];
        return view('v_template_guru', $data);
    }
}
