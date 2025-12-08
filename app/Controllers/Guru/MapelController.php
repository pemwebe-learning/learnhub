<?php

namespace App\Controllers\Guru;

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
        $id_guru = session()->get('id_guru');
        $data = [
            'judul' => 'Mapel',
            'menu' => 'mapel',
            'page' => 'dashboard_guru/mapel/v_index',
            'mapel_by_guru' => $this->ModelMapel->getMapelByGuru($id_guru)
        ];
        return view('v_template_guru', $data);
    }
}
