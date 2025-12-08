<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelGuru;

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
            'judul' => 'Dashboard Guru',
            'menu' => 'dashboard_guru',
            'page' => 'dashboard_guru/v_dashboard_guru',
            'guru' => session(),
        ];
        return view('v_template_guru', $data);
    }

    public function edit($id_guru)
    {
         $data = [
            'judul' => 'Edit Guru',
            'menu' => 'edit_guru',
            'page' => 'dashboard_guru/v_edit',
            'detail_guru' => $this->ModelGuru->find($id_guru),
            'guru' => session(),
        ];
        return view('v_template_guru', $data);
    }
    public function UpdateData($id_guru)
    {
        $validation = \Config\Services::validation();

        // Ambil data lama
        $guru = $this->ModelGuru->find($id_guru);
        if (!$guru) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data admin tidak ditemukan');
        }

        // Ambil file foto
        $file = $this->request->getFile('foto');

        /*
        * Validasi foto hanya jika user memilih file baru
        */
        $rulesFile = [];
        if ($file->getError() != 4) { 
            $rulesFile = [
                'foto' => [
                    'rules' => 'is_image[foto]|max_size[foto,2048]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'is_image' => 'File harus berupa gambar.',
                        'max_size' => 'Ukuran maksimal 2MB.',
                        'mime_in'  => 'Format foto harus JPG/PNG.'
                    ]
                ]
            ];
        }

        if (!empty($rulesFile)) {
            if (!$this->validate($rulesFile)) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }


        // Data utama
        $data = [
            'nama_guru'    => $this->request->getPost('nama_guru'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        ];

        // PASSWORD opsional
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        /*
        * FOTO opsional
        * Jika tidak upload foto baru → tetap gunakan foto lama
        */
        $fotoBaru = null;

        if ($file->getError() != 4) { 
            // Upload foto baru
            $fotoBaru = $file->getRandomName();
            $data['foto'] = $fotoBaru; // update foto di DB
        } else {
            // Tidak pilih foto baru → tetap pakai foto lama
            $data['foto'] = $guru['foto'];
        }

        // Update database
        if (!$this->ModelGuru->update($id_guru, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelGuru->errors());
        }

        // Jika ada foto baru → hapus lama → upload baru
        if ($fotoBaru) {

            // Hapus foto lama
            if (!empty($guru['foto']) && file_exists('uploads/admin/' . $guru['foto'])) {
                unlink('uploads/guru/' . $guru['foto']);
            }

            // Upload foto baru
            $file->move('uploads/guru/', $fotoBaru);
        }

        session()->setFlashdata('success', 'Data guru berhasil diupdate.');
        return redirect()->to('/guru/dashboard');
    }

}
