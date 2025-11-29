<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelAdmin;

class UserController extends BaseController
{
    protected $ModelAdmin;

    public function __construct() {
        $this->ModelAdmin = new ModelAdmin();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data = [
            'judul' => 'User',
            'menu' => 'user',
            'page' => 'dashboard_admin/user/v_index',
            'admins' => $this->ModelAdmin->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function input () {
        $data = [
            'judul' => 'Input Admin',
            'menu' => 'input_admin',
            'page' => 'dashboard_admin/user/v_input',
            'admins' => $this->ModelAdmin->findAll(),
        ];
        return view('v_template_admin' ,$data);
    }

    public function InsertData () {
        $file = $this->request->getFile('foto');

        $data = [
            'nama_admin'    => $this->request->getPost('nama_admin'),
            'email'         => $this->request->getPost('email'),
            'password'      => $this->request->getPost('password'), // sudah di-hash otomatis di model
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto' => $this->request->getPost('foto')
        ];

        // Proses upload foto ke folder public/admin
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'admin', $newName);
            $data['foto'] = $newName;
        }

        // Simpan data ke database dengan validasi dari ModelAdmin
        if (!$this->ModelAdmin->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelAdmin->errors());
        }

        session()->setFlashdata('success', 'Data admin berhasil disimpan.');
        return redirect()->to('/admin/user');


    }

}
