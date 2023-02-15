<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == ''   ) {
            echo 'alert("anda belum login)"';
            // set_notifikasi_toast('info', 'Anda Belum Login, Silahkan Login dahulu!');
            return redirect()->to(base_url('panel'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == 'admin') {

            return redirect()->to(base_url('admin/home'));
        }
    }
}
