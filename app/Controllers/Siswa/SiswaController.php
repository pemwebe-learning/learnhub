<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;

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
            'judul'  => 'Dashboard Siswa',
            'menu'   => 'dashboard_siswa',
            'page'   => 'dashboard_siswa/v_dashboard_siswa',
            'kelas' => $this->ModelSiswa->getSiswaWithKelas(),
            'siswa'        => session(),
        ];
        return view('v_template_siswa', $data);
    }

    public function edit($id_siswa)
    {
        $data = [
            'judul'        => 'Edit Profil Siswa',
            'menu'         => 'edit_siswa',
            'page'         => 'dashboard_siswa/v_edit',
            'detail_siswa' => $this->ModelSiswa->find($id_siswa),
            'kelas' => $this->ModelKelas->findAll(),
            'siswa'        => session(),
        ];
        return view('v_template_siswa', $data);
    }

    public function updateData($id_siswa)
    {
        $validation = \Config\Services::validation();

        // Ambil data lama
        $siswa = $this->ModelSiswa->find($id_siswa);
        if (!$siswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data siswa tidak ditemukan');
        }

        // Ambil file foto
        $file = $this->request->getFile('foto');

        /*
        |--------------------------------------------------------------
        | VALIDASI FOTO HANYA JIKA ADA FILE BARU
        |--------------------------------------------------------------
        */
        $rulesFile = [];
        if ($file->getError() != 4) {
            $rulesFile = [
                'foto' => [
                    'rules' => 'is_image[foto]|max_size[foto,2048]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'is_image' => 'File harus berupa gambar.',
                        'max_size' => 'Ukuran maksimal 2MB.',
                        'mime_in'  => 'Format harus JPG/PNG.'
                    ]
                ]
            ];
        }

        if (!empty($rulesFile)) {
            if (!$this->validate($rulesFile)) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        /*
        |--------------------------------------------------------------
        | DATA UPDATE
        |--------------------------------------------------------------
        */
        $data = [
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
        ];

        // Password opsional
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        /*
        |--------------------------------------------------------------
        | FOTO OPSIONAL
        |--------------------------------------------------------------
        */
        $fotoBaru = null;

        if ($file->getError() != 4) {
            $fotoBaru = $file->getRandomName();
            $data['foto'] = $fotoBaru;
        } else {
            $data['foto'] = $siswa['foto'];
        }

        /*
        |--------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------
        */
        if (!$this->ModelSiswa->update($id_siswa, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelSiswa->errors());
        }

        // Upload dan hapus foto lama jika ada file baru
        if ($fotoBaru) {
            // Hapus foto lama
            if (!empty($siswa['foto']) && file_exists('uploads/siswa/' . $siswa['foto'])) {
                unlink('uploads/siswa/' . $siswa['foto']);
            }

            // Upload foto baru
            $file->move('uploads/siswa/', $fotoBaru);
        }

        session()->setFlashdata('success', 'Data siswa berhasil diupdate.');
        return redirect()->to('/siswa/dashboard');
    }
}
