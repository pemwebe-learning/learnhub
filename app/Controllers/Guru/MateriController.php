<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\ModelMateri;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelMapel;

class MateriController extends BaseController
{
    protected $ModelMapel;
    protected $ModelMateri;

     public function __construct() {
        $this->ModelMapel = new ModelMapel();
        $this->ModelMateri = new ModelMateri();
    }
    public function index()
    {
        $data = [
            'judul' => 'Materi',
            'menu' => 'materi',
            'page' => 'dashboard_guru/materi/v_index',
            'materi' => $this->ModelMateri->getMateriWithMapel()

        ];
        return view('v_template_guru', $data);
    }
}
