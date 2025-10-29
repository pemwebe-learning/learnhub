<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use CodeIgniter\HTTP\ResponseInterface;

class GuruController extends BaseController
{
    protected $ModelGuru;

    public function __construct() {
        $this->ModelGuru = new ModelGuru();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data = [
            'judul' => 'Guru',
            'menu' => 'guru',
            'page' => 'dashboard_admin/guru/v_index',
            'guru' => $this->ModelGuru->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function input() {
        $data = [
            'judul' => 'Input Guru',
            'menu' => 'input_guru',
            'page' => 'dashboard_admin/guru/v_input',
            'guru' => $this->ModelGuru->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData () {
        $file = $this->request->getFile('foto');

        $data = [
            'nama_guru'    => $this->request->getPost('nama_guru'),
            'email'         => $this->request->getPost('email'),
            'password'      => $this->request->getPost('password'), // sudah di-hash otomatis di model
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        ];

        // Proses upload foto ke folder public/admin
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'guru', $newName);
            $data['foto'] = $newName;
        }

        // Simpan data ke database dengan validasi dari ModelAdmin
        if (!$this->ModelGuru->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelGuru->errors());
        }

        session()->setFlashdata('success', 'Data admin berhasil disimpan.');
        return redirect()->to('/admin/guru');


    }
}
