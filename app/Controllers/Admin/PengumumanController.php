<?php

namespace App\Controllers\Admin;

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
        'page' => 'dashboard_admin/pengumuman/v_index',
        'pengumuman' => $this->ModelPengumuman->findAll(),
        ];

        return view('v_template_admin', $data);
    }

    public function input() {
        $data = [
            'judul' => 'Input Pengumuman',
            'menu' => 'pengumuman',
            'page' => 'dashboard_admin/pengumuman/v_input',
            'pengumuman' => $this->ModelPengumuman->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        $data = [
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'isi'  => $this->request->getPost('isi'),
        ];

        if (!$this->ModelPengumuman->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelPengumuman->errors());
        }

        session()->setFlashdata('success', 'Pengumuman berhasil disimpan.');
        return redirect()->to('/admin/pengumuman');
    }

    public function edit($id_pengumuman) {
        $data = [
            'judul' => 'Edit Pengumuman',
            'menu' => 'edit_pengumuman',
            'page' => 'dashboard_admin/pengumuman/v_edit',
            'pengumuman' => $this->ModelPengumuman->find($id_pengumuman),
        ];

        return view('v_template_admin', $data);
    }

    public function UpdateData($id_pengumuman)
    {
        $data = [
            'id_pengumuman' => $id_pengumuman,
            'nama_pengumuman'  => $this->request->getPost('nama_pengumuman'),
            'isi'  => $this->request->getPost('isi'),
        ];

        if (!$this->ModelPengumuman->update($id_pengumuman, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelPengumuman->errors());
        }

        session()->setFlashdata('success', 'pengumuman berhasil Edit.');
        return redirect()->to('/admin/pengumuman');
    }

     public function DeleteData($id_pengumuman)
    {
        $data = [
            'id_kelas' => $id_pengumuman,
        ];

        if (!$this->ModelPengumuman->delete($data )) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelPengumuman->errors());
        }

        session()->setFlashdata('success', 'Pengumuman Berhasil Dihapus.');
        return redirect()->to('/admin/pengumuman');
    }

}
