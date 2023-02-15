<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterMahasiswa implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == '') {
            // echo 'alert("anda belum login)"';
            set_notifikasi_toast('info', 'Anda Belum Login, Silahkan Login dahulu!');
            return redirect()->to(base_url('mahasiswa/auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == 'mahasiswa') {

            return redirect()->to(base_url('mahasiswa/data'));
        }
    }
}
