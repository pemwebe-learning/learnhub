<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKelas;
use App\Models\ModelMapel;
use App\Models\ModelGuru;

class MapelController extends BaseController
{
    protected $ModelKelas;
    protected $ModelMapel;
    protected $ModelGuru;


    public function __construct() {
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelMapel = new ModelMapel();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data = [
            'judul' => 'Daftar Mapel',
            'menu' => 'mapel',
            'page' => 'dashboard_admin/mapel/v_index',
            'mapel' => $this->ModelMapel
                                ->select('tb_mapel.*, tb_guru.nama_guru, tb_kelas.nama_kelas')
                                ->join('tb_guru', 'tb_guru.id_guru = tb_mapel.id_guru')
                                ->join('tb_kelas', 'tb_kelas.id_kelas = tb_mapel.id_kelas')
                                ->findAll()
        ];

        return view('v_template_admin', $data) ;
    }

     public function input() {
        $data = [
            'judul' => 'Input Mapel',
            'menu' => 'input_mapel',
            'page' => 'dashboard_admin/mapel/v_input',
            'mapel' => $this->ModelMapel
                                ->select('tb_mapel.*, tb_guru.nama_guru, tb_kelas.nama_kelas')
                                ->join('tb_guru', 'tb_guru.id_guru = tb_mapel.id_guru')
                                ->join('tb_kelas', 'tb_kelas.id_kelas = tb_mapel.id_kelas')
                                ->findAll(),
            'detail_kelas' => $this->ModelKelas->findAll(),
            'detail_guru'=> $this->ModelGuru->findAll()
        ];

        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_mapel'       => $this->request->getPost('nama_mapel'),
            'id_guru'  => $this->request->getPost('id_guru'),
            'id_kelas'  => $this->request->getPost('id_kelas'),
        ];

        if (!$this->ModelMapel->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelMapel->errors());
        }

        session()->setFlashdata('success', 'Data mapel berhasil disimpan.');
        return redirect()->to('/admin/mapel');
    }

public function edit($id_mapel) {
        $data = [
            'judul' => 'Edit Mapel',
            'menu' => 'edit_mapel',
            'page' => 'dashboard_admin/mapel/v_edit',
            'mapel' => $this->ModelMapel
                                ->select('tb_mapel.*, tb_guru.nama_guru, tb_kelas.nama_kelas')
                                ->join('tb_guru', 'tb_guru.id_guru = tb_mapel.id_guru')
                                ->join('tb_kelas', 'tb_kelas.id_kelas = tb_mapel.id_kelas')
                                ->find($id_mapel),
            'detail_kelas' => $this->ModelKelas->findAll(),
            'detail_guru'=> $this->ModelGuru->findAll()
        ];

        return view('v_template_admin', $data);
    }

    public function UpdateData($id_mapel)
    {
        $data = [
            'id_mapel' => $id_mapel,
            'nama_mapel'  => $this->request->getPost('nama_mapel'),
            'id_guru'  => $this->request->getPost('id_guru'),
            'id_kelas'  => $this->request->getPost('id_kelas'),
        ];

        if (!$this->ModelMapel->update($id_mapel, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelKelas->errors());
        }

        session()->setFlashdata('success', 'Mapel berhasil Di Edit.');
        return redirect()->to('/admin/mapel');
    }

     public function DeleteData($id_mapel)
    {
        $data = [
            'id_mapel' => $id_mapel,
        ];

        if (!$this->ModelMapel->delete($data )) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelKelas->errors());
        }

        session()->setFlashdata('success', 'Data Mapel berhasil di hapus!!!.');
        return redirect()->to('/admin/mapel');
    }


}
