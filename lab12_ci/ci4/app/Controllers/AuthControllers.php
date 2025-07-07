<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Contoh autentikasi simpel (ganti dengan autentikasi ke database jika ada)
        if ($username == 'admin' && $password == 'password') {
            session()->set('logged_in', true);
            return redirect()->to('/admin/artikel');
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
