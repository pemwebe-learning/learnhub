<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class LoginAdmin extends BaseController
{
    protected $ModelAdmin;

    public function __construct() {
        $this->ModelAdmin = new ModelAdmin();
        helper(['form', 'url']);
    }
    public function index()
    {
        // Jika user sudah login, arahkan ke dashboard

        return view('v_login_admin');
    }

    public function prosesLoginAdmin()
    {
        $ModelAdmin = new ModelAdmin();

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
        $user = $ModelAdmin->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        // Simpan data ke session
        session()->set([
            'id_user'   => $user['id_admin'],
            'nama_admin'      => $user['nama_admin'],
            'email'     => $user['email'],
            'foto'=> $user['foto'],
            'jenis_kelamin' => $user['jenis_kelamin'],
            'alamat' => $user['alamat'],
            'no_hp' => $user['no_hp'],
            'logged_in' => true
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }
}
