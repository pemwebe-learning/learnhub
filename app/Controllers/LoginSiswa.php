<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSiswa;

class LoginSiswa extends BaseController
{
    protected $ModelSiswa;

    public function __construct() {
        $this->ModelSiswa = new ModelSiswa();
        helper(['form', 'url']);
    }
    public function index()
    {
        // Jika user sudah login, arahkan ke dashboard

        return view('v_login_siswa');
    }

    public function prosesLoginSiswa()
    {
        $ModelSiswa = new ModelSiswa();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Cek user di database
        $user = $ModelSiswa
        ->select('tb_siswa.*, tb_kelas.nama_kelas')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas')
        ->where('tb_siswa.email', $email)
        ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        // Simpan data ke session
        session()->set([
            'id_siswa'   => $user['id_siswa'],
            'nama_siswa'  => $user['nama_siswa'],
            'email'     => $user['email'],
            'foto'=> $user['foto'],
            'jenis_kelamin' => $user['jenis_kelamin'],
            'alamat' => $user['alamat'],
            'no_hp' => $user['no_hp'],
            'id_kelas' => $user['id_kelas'],
            'nama_kelas'    => $user['nama_kelas'],
            'logged_in' => true
        ]);

        return redirect()->to('/siswa/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }
}
