<?php

namespace App\Controllers\mahasiswa;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Pendaftar Mahasiswa Baru | AKFAR CEFADA',

        ];
        echo view('layout/topbar/top', $data);
        echo view('mahasiswa/v_login', $data);
        echo view('layout/topbar/bottom');
    }

    public function cek_login()
    {
        $no_hp = $this->request->getPost('no_hp');
        $password = $this->request->getPost('password');

        $mahasiswa = $this->Login_model->login_mhs($no_hp, $password);

        if ($mahasiswa) {
            session()->set('id_pmb', $mahasiswa['id_pmb']);
            session()->set('nama_siswa', $mahasiswa['nama_siswa']);
            session()->set('lengkap', $mahasiswa['lengkap']);
            session()->set('level', 'mahasiswa');
            session()->set('login_mhs', TRUE);

            set_notifikasi_toast('success', 'Selamat datang ' . $mahasiswa['nama_siswa']);
            return redirect()->to(base_url("mahasiswa/data/mhs"));
        } else {
            session()->setFlashdata('error', 'nomor HP belum terdaftar <br> Silahkan mendaftar terlebih dahulu.');
            return redirect()->to(base_url('mahasiswa/auth/'));
        }
    }



    public function logout()
    {
        session_destroy();
        return redirect()->to(base_url());
    }
}
