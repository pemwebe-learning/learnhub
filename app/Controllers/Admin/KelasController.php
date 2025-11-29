<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKelas;
use App\Models\ModelTingkat;
class KelasController extends BaseController
{
    protected $ModelKelas;
    protected $ModelTingkat;

    public function __construct() {
        $this->ModelKelas = new ModelKelas();
        $this->ModelTingkat = new ModelTingkat();
        helper(['form', 'url']);
    }
    public function index()
    {
       $data = [
        'judul' => 'Kelas',
        'menu' => 'kelas',
        'page' => 'dashboard_admin/kelas/v_index',
        'kelas' => $this->ModelKelas->findAll() ,
        'detail_kelas' => $this->ModelKelas->getKelasWithTingkat(),

        ];

        return view('v_template_admin', $data);
    }

    public function input() {
        $data = [
            'judul' => 'Input Kelas',
            'menu' => 'input_kelas',
            'page' => 'dashboard_admin/kelas/v_input',
            'kelas' => $this->ModelKelas->findAll() ,
            'detail_kelas' => $this->ModelKelas->getKelasWithTingkat(),
            'tingkat' => $this->ModelTingkat->findAll(),
        ];

        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_kelas'       => $this->request->getPost('nama_kelas'),
            'id_tingkat'  => $this->request->getPost('id_tingkat'),
        ];

        if (!$this->ModelKelas->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelKelas->errors());
        }

        session()->setFlashdata('success', 'Data kelas berhasil disimpan.');
        return redirect()->to('/admin/kelas');
    }

    public function edit($id_kelas) {
        $data = [
            'judul' => 'Input Kelas',
            'menu' => 'input_kelas',
            'page' => 'dashboard_admin/kelas/v_edit',
            'kelas' => $this->ModelKelas->getDetailTingkat($id_kelas),
            'detail_kelas' => $this->ModelKelas->getKelasWithTingkat(),
            'tingkat' => $this->ModelTingkat->findAll(),
        ];

        return view('v_template_admin', $data);
    }

    public function UpdateData($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'nama_kelas'  => $this->request->getPost('nama_kelas'),
            'id_tingkat'  => $this->request->getPost('id_tingkat'),
        ];

        if (!$this->ModelKelas->update($id_kelas, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelKelas->errors());
        }

        session()->setFlashdata('success', 'Data kelas berhasil disimpan.');
        return redirect()->to('/admin/kelas');
    }

     public function delete($id_kelas)
    {
        $kelas = $this->ModelKelas->getKelasWithTingkat();
        $data = [
            'id_kelas' => $id_kelas,
        ];

        if (!$this->ModelKelas->delete($data )) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelKelas->errors());
        }

        session()->setFlashdata('success', 'Data kelas berhasil disimpan.');
        return redirect()->to('/admin/kelas');
    }

}
