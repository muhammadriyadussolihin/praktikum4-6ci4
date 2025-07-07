<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        return view('User/login'); // pastikan kamu punya view ini juga
    }

    public function attemptLogin()
    {
        // contoh login sederhana
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // contoh login statis (harus kamu ganti dengan login beneran pakai database)
        if ($username === 'admin' && $password === 'admin') {
            session()->set('logged_in', true);
            session()->set('username', $username);
            return redirect()->to('/admin/artikel');
        }

        return redirect()->to('/login')->with('error', 'Login gagal');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
