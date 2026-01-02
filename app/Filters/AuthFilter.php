<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $params = null)
    {
        // Get current URI
        $uri = $request->getUri()->getPath();
        
        // Get session
        $session = session();
        
        // Check if user is logged in
        if (!$session->has('logged_in') || !$session->get('logged_in')) {
            // Clear any existing session issues
            $session->remove('logged_in', 'role', 'id_siswa', 'id_admin', 'id_guru');
            return redirect()->to('/')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        // Get role
        $role = $session->get('role');
        
        // If role is not set or empty, redirect to logout
        if (empty($role)) {
            $session->destroy();
            return redirect()->to('/')->with('error', 'Sesi tidak valid. Silakan login kembali.');
        }
        
        // Prevent siswa from accessing admin and guru pages
        if ($role === 'siswa') {
            // Block access to /admin/* and /guru/*
            if (strpos($uri, 'admin/') !== false || strpos($uri, 'admin') === 0) {
                return redirect()->to('/siswa/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
            }
            if (strpos($uri, 'guru/') !== false || strpos($uri, 'guru') === 0) {
                return redirect()->to('/siswa/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman guru.');
            }
        }
        
        // Prevent admin from accessing siswa and guru pages
        if ($role === 'admin') {
            // Block access to /siswa/* and /guru/*
            if (strpos($uri, 'siswa/') !== false || strpos($uri, 'siswa') === 0) {
                return redirect()->to('/admin/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman siswa.');
            }
            if (strpos($uri, 'guru/') !== false || strpos($uri, 'guru') === 0) {
                return redirect()->to('/admin/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman guru.');
            }
        }
        
        // Prevent guru from accessing admin and siswa pages
        if ($role === 'guru') {
            // Block access to /admin/* and /siswa/*
            if (strpos($uri, 'admin/') !== false || strpos($uri, 'admin') === 0) {
                return redirect()->to('/guru/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
            }
            if (strpos($uri, 'siswa/') !== false || strpos($uri, 'siswa') === 0) {
                return redirect()->to('/guru/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman siswa.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after request
    }
}

