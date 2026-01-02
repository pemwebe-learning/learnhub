<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelGuru;

class LoginGuru extends BaseController
{
    protected $ModelGuru;

    public function __construct() {
        $this->ModelGuru = new ModelGuru();
        helper(['form', 'url']);
    }
    public function index()
    {
        // Jika user sudah login, arahkan ke dashboard

        return view('v_login_guru');
    }

    public function prosesLoginGuru()
    {
        $ModelGuru = new ModelGuru();

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
        $user = $ModelGuru->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        // Simpan data ke session
        session()->set([
            'id_guru'   => $user['id_guru'],
            'nama_guru'  => $user['nama_guru'],
            'email'     => $user['email'],
            'foto'=> $user['foto'],
            'jenis_kelamin' => $user['jenis_kelamin'],
            'alamat' => $user['alamat'],
            'no_hp' => $user['no_hp'],
            'role' => 'guru',
            'logged_in' => true
        ]);

        return redirect()->to('/guru/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }
}
