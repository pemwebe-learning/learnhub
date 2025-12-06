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

        public function input () {
        $data = [
            'judul' => 'Input Guru',
            'menu' => 'input_guru',
            'page' => 'dashboard_admin/guru/v_input',
            'guru' => $this->ModelGuru->findAll(),
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
            'nama_guru'    => $this->request->getPost('nama_guru'),
            'email'         => $this->request->getPost('email'),
            'password'      => $this->request->getPost('password'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto'          => $newName
        ];

        // SIMPAN KE DATABASE (TANPA MOVE FOTO)
        if (!$this->ModelGuru->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelGuru->errors());
        }

        // --- JIKA DATABASE SUKSES, BARU PINDAHKAN FOTO ---
        $file->move('uploads/guru/', $newName);

        session()->setFlashdata('success', 'Data guru berhasil disimpan.');
        return redirect()->to('/admin/guru');
    }

     public function edit ($id_guru) {
        $data = [
            'judul' => 'Edit Guru',
            'menu' => 'edit_guru',
            'page' => 'dashboard_admin/guru/v_edit',
            'guru' => $this->ModelGuru->find($id_guru),
        ];
        return view('v_template_admin' ,$data);
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
            'nama_admin'    => $this->request->getPost('nama_admin'),
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
            if (!empty($admin['foto']) && file_exists('uploads/admin/' . $guru['foto'])) {
                unlink('uploads/guru/' . $guru['foto']);
            }

            // Upload foto baru
            $file->move('uploads/guru/', $fotoBaru);
        }

        session()->setFlashdata('success', 'Data guru berhasil diupdate.');
        return redirect()->to('/admin/guru');
    }

    public function DeleteData($id_guru)
    {
        // Ambil data admin
        $guru = $this->ModelGuru->find($id_guru);

        if (!$guru) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data admin tidak ditemukan');
        }

        // Hapus foto jika ada
        if (!empty($guru['foto'])) {
            $pathFoto = 'uploads/admin/' . $guru['foto'];

            if (file_exists($pathFoto)) {
                unlink($pathFoto); // hapus file foto
            }
        }

        // Hapus data admin dari database
        $this->ModelGuru->delete($id_guru);

        session()->setFlashdata('success', 'Data admin berhasil dihapus.');
        return redirect()->to('/admin/guru');
    }

    public function DetailData($id_guru) {
        $data = [
            'judul' => 'Detail Guru',
            'menu' => 'detail_guru',
            'page' => 'dashboard_admin/guru/v_detail',
            'guru' => $this->ModelGuru->find($id_guru),
        ];
        return view('v_template_admin' ,$data);
    }
}
