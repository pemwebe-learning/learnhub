<?php

namespace App\Controllers\Siswa;

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
            'page' => 'dashboard_siswa/pengumuman/v_index',
            'pengumuman' => $this->ModelPengumuman->findAll()
        ];
        return view('v_template_siswa', $data);
    }
    
}
