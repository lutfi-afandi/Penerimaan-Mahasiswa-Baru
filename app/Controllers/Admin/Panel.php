<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Panel extends BaseController
{
    public function index()
    {
        if (session()->get('login_mhs') != null) {
            session_destroy();
            // dd(session()->get('login_mhs'));
            $data['title'] = "Login Admin | PMB";
            echo view('admin/v_login', $data);
        } else {
            session_destroy();
            // dd(session()->get('login_mhs'));
            $data['title'] = "Login Admin | PMB";

            // dd($data);

            echo view('admin/v_login', $data);
        }
    }

    public function cek_login()
    {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek_user = $this->Login_model->login_user($username);
        // dd($cek_user, $username, $password);

        if ($cek_user) {
            // jika ada user, cek password
            $verify_pass = password_verify($password, $cek_user['password']);
            // $verify_pass = true;
            // dd($verify_pass);
            // jika pasword benar
            if ($verify_pass) {
                session()->set('username', $cek_user['username']);
                session()->set('nama', $cek_user['nama']);
                session()->set('password', $cek_user['password']);
                session()->set('level', 'admin');
                session()->set('log_in', TRUE);
                set_notifikasi_toast('success', 'Selamat datang ' . session()->get('nama'));
                return redirect()->to(base_url('admin/home'));
            } else {
                set_notifikasi_toast('error', 'Password salah!');
                return redirect()->to(base_url('admin/panel'));
            }
        } else {
            set_notifikasi_toast('error', 'Username atau Password salah!');
            return redirect()->to(base_url('admin/panel'));
        }
    }

    public function logout()
    {
        session()->destroy();
        set_notifikasi_toast('success', 'Anda telah logout');
        return redirect()->to(base_url('admin/panel'));
    }
}
