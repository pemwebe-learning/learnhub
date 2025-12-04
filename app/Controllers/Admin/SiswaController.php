<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use CodeIgniter\HTTP\ResponseInterface;

class SiswaController extends BaseController
{
     protected $ModelSiswa;
     protected $ModelKelas;

    public function __construct() {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
        helper(['form', 'url']);
    }
     public function index()
    {
        $data = [
        'judul' => 'Siswa',
        'menu' => 'siswa',
        'page' => 'dashboard_admin/siswa/v_index',
        'siswa' => $this->ModelSiswa->findAll(),
        'detail_siswa' => $this->ModelSiswa->getSiswaWithKelas(),
        ];

        return view('v_template_admin', $data);

    }

     public function input () {
        $data = [
            'judul' => 'Input Siswa',
            'menu' => 'input_siswa',
            'page' => 'dashboard_admin/siswa/v_input',
            'siswa' => $this->ModelSiswa->findAll(),
            'detail_siswa' => $this->ModelSiswa->getSiswaWithKelas(),
            'detail_kelas' => $this->ModelKelas->getKelasWithTingkat(),
        ];
        return view('v_template_admin' ,$data);
    }

    public function InsertData()
    {
        $validation = \Config\Services::validation();

        // VALIDASI FILE UPLOAD
        $rulesFile = [
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|max_size[foto,2048]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto wajib diupload.',
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran maksimal 2MB.',
                    'mime_in'  => 'Format foto harus JPG/PNG.'
                ]
            ]
        ];

        if (!$this->validate($rulesFile)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // AMBIL FILE FOTO (TAPI BELUM DI MOVE)
        $file = $this->request->getFile('foto');
        $newName = $file->getRandomName();

        // DATA ke model
        $data = [
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'email'         => $this->request->getPost('email'),
            'password'      => $this->request->getPost('password'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
            'foto'          => $newName
        ];

        // SIMPAN KE DATABASE (TANPA MOVE FOTO)
        if (!$this->ModelSiswa->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelSiswa->errors());
        }

        // --- JIKA DATABASE SUKSES, BARU PINDAHKAN FOTO ---
        $file->move('uploads/siswa/', $newName);

        session()->setFlashdata('success', 'Data admin berhasil disimpan.');
        return redirect()->to('/admin/siswa');
    }

     public function edit ($id_admin) {
        $data = [
            'judul' => 'Edit Admin',
            'menu' => 'edit_admin',
            'page' => 'dashboard_admin/user/v_edit',
            'admins' => $this->ModelKelas->find($id_admin),
        ];
        return view('v_template_admin' ,$data);
    }



}
