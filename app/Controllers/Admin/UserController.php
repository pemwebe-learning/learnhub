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
            'nama_admin'    => $this->request->getPost('nama_admin'),
            'email'         => $this->request->getPost('email'),
            'password'      => $this->request->getPost('password'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto'          => $newName
        ];

        // SIMPAN KE DATABASE (TANPA MOVE FOTO)
        if (!$this->ModelAdmin->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelAdmin->errors());
        }

        // --- JIKA DATABASE SUKSES, BARU PINDAHKAN FOTO ---
        $file->move('uploads/admin/', $newName);

        session()->setFlashdata('success', 'Data admin berhasil disimpan.');
        return redirect()->to('/admin/user');
    }

     public function edit ($id_admin) {
        $data = [
            'judul' => 'Input Admin',
            'menu' => 'input_admin',
            'page' => 'dashboard_admin/user/v_edit',
            'admins' => $this->ModelAdmin->find($id_admin),
        ];
        return view('v_template_admin' ,$data);
    }

    public function UpdateData($id_admin)
    {
        $validation = \Config\Services::validation();

        // Ambil data lama
        $admin = $this->ModelAdmin->find($id_admin);
        if (!$admin) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data admin tidak ditemukan');
        }

        // Ambil file foto
        $file = $this->request->getFile('foto');

        /*
        * CEK FILE FOTO
        * getError() == 4  → Tidak ada file diupload
        */
        $rulesFile = [];
        if ($file->getError() != 4) {
            // Ada file baru → jalankan validasi
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

        if (!$this->validate($rulesFile)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Data utama
        $data = [
            'nama_admin'    => $this->request->getPost('nama_admin'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        ];

        // PASSWORD (boleh kosong)
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // FOTO
        $fotoBaru = null;

        if ($file->getError() != 4) { 
            // Ada foto baru
            $fotoBaru = $file->getRandomName();
            $data['foto'] = $fotoBaru;
        }

        // Update database
        if (!$this->ModelAdmin->update($id_admin, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelAdmin->errors());
        }

        // Jika ada foto baru → hapus foto lama → upload foto baru
        if ($fotoBaru) {

            // Hapus foto lama
            if (!empty($admin['foto']) && file_exists('uploads/admin/' . $admin['foto'])) {
                unlink('uploads/admin/' . $admin['foto']);
            }

            // Move foto baru
            $file->move('uploads/admin/', $fotoBaru);
        }

        session()->setFlashdata('success', 'Data admin berhasil diupdate.');
        return redirect()->to('/admin/user');
    }


}
