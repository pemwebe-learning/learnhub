<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelMateri;
use App\Models\ModelMapel;

class MateriController extends BaseController
{
    protected $ModelMateri;
    protected $ModelMapel;

    public function __construct()
    {
        $this->ModelMateri = new ModelMateri();
        $this->ModelMapel = new ModelMapel();
    }
    public function index($id_mapel)
    {
        $data = [
            'judul' => 'Materi Mapel',
            'menu' => 'materi',
            'page' => 'dashboard_siswa/materi/v_index',
            'mapel' => $this->ModelMapel->find($id_mapel),
            'materi' => $this->ModelMateri->getMateriByMapel($id_mapel),
        ];
        return view('v_template_guru', $data);
    }

}
