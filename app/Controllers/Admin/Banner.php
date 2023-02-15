<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Banner extends BaseController
{
    public function index()
    {
        $data['title'] = "Banner";
        $data['banner'] = $this->db->table('pmb_banner')->get()->getResultArray();

        // dd($data);
        echo view('layout/side-admin/top', $data);
        echo view('admin/banner/v_index', $data);
        echo view('layout/side-admin/bottom', $data);
    }

    public function add_banner()
    {
        $file = $this->request->getFile('file_gambar');

        $file->move('uploads/banner/');
        $nama_file = $file->getName();

        $data = [
            'file_gambar'       => $nama_file,
        ];
        $this->db->table('pmb_banner')->insert($data);

        set_notifikasi_toast('success', 'Data Ditambah');
        return redirect()->to(base_url("admin/banner"));
    }


    public function banner_hapus($id_banner)
    {
        $banner =  $this->db->table('pmb_banner')->where('id_banner', $id_banner)->get()->getRowArray();
        // dd($banner);
        // unlink('public/uploads/banner/' . $banner['file_gambar']);

        $this->db->table('pmb_banner')->where('id_banner', $id_banner)->delete();
        set_notifikasi_toast('info', 'Slideshow Di hapus');
        return redirect()->to(base_url("admin/banner"));
    }
}
