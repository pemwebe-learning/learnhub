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

        session()->setFlashdata('success', 'Data siswa berhasil disimpan.');
        return redirect()->to('/admin/siswa');
    }

     public function edit ($id_siswa) {
        $data = [
            'judul' => 'Edit Siswa',
            'menu' => 'edit_siswa',
            'page' => 'dashboard_admin/siswa/v_edit',
            'siswa' => $this->ModelSiswa->find($id_siswa),
            'detail_kelas' => $this->ModelKelas->getKelasWithTingkat(),
        ];
        return view('v_template_admin' ,$data);
    }

    
    public function UpdateData($id_siswa)
    {
        $siswa = $this->ModelSiswa->find($id_siswa);
        if (!$siswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data siswa tidak ditemukan');
        }

        $file = $this->request->getFile('foto');

        // Validasi foto hanya jika ada file baru
        if ($file->getError() != 4) {
            if (!$this->validate([
                'foto' => [
                    'rules' => 'is_image[foto]|max_size[foto,2048]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'is_image' => 'File harus berupa gambar.',
                        'max_size' => 'Ukuran maksimal 2MB.',
                        'mime_in'  => 'Format foto harus JPG/PNG.'
                    ]
                ]
            ])) {
                return redirect()->back()->withInput()
                    ->with('errors', $this->validator->getErrors());
            }
        }

        // Data utama
        $data = [
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
        ];

        // Password opsional
        if (!empty($this->request->getPost('password'))) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Foto opsional
        if ($file->getError() != 4) {
            $fotoBaru = $file->getRandomName();
            $data['foto'] = $fotoBaru;
        } else {
            $fotoBaru = null;
            $data['foto'] = $siswa['foto'];
        }

        // Update database
        if (!$this->ModelSiswa->update($id_siswa, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->ModelSiswa->errors());
        }

        // Upload foto baru
        if ($fotoBaru) {
            if (!empty($siswa['foto']) && file_exists('uploads/siswa/' . $siswa['foto'])) {
                unlink('uploads/siswa/' . $siswa['foto']);
            }
            $file->move('uploads/siswa/', $fotoBaru);
        }

        session()->setFlashdata('success', 'Data siswa berhasil diupdate.');
        return redirect()->to('/admin/siswa');
    }

    public function DeleteData($id_siswa)
    {
        // Ambil data admin
        $siswa = $this->ModelSiswa->find($id_siswa);

        if (!$siswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data admin tidak ditemukan');
        }

        // Hapus foto jika ada
        if (!empty($admin['foto'])) {
            $pathFoto = 'uploads/siswa/' . $siswa['foto'];

            if (file_exists($pathFoto)) {
                unlink($pathFoto); // hapus file foto
            }
        }

        // Hapus data admin dari database
        $this->ModelSiswa->delete($id_siswa);

        session()->setFlashdata('success', 'Data siswa berhasil dihapus.');
        return redirect()->to('/admin/siswa');
    }

    public function DetailData($id_siswa) {
        $data = [
            'judul' => 'Detail Siswa',
            'menu' => 'detail_siswa',
            'page' => 'dashboard_admin/siswa/v_detail',
            'siswa' => $this->ModelSiswa->getDetailkelas($id_siswa),

        ];
        return view('v_template_admin' ,$data);
    }



}
