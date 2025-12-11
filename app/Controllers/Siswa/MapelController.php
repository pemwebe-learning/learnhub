<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelMapel;

class MapelController extends BaseController
{
    protected $ModelMapel;

     public function __construct() {
        $this->ModelMapel = new ModelMapel();
    }
    public function index()
    {
        $id_kelas = session()->get('id_kelas');
        $data = [
            'judul' => 'Mapel',
            'menu' => 'mapel',
            'page' => 'dashboard_siswa/mapel/v_index',
            'mapel_by_kelas' => $this->ModelMapel->getMapelByKelas($id_kelas)
        ];
        return view('v_template_siswa', $data);
    }
}
