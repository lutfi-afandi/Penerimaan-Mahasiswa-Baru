<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Slideshow extends BaseController
{
    public function index()
    {
        $data['title'] = "Slideshow";
        $data['slideshow'] = $this->db->table('pmb_slideshow')->get()->getResultArray();

        // dd($data);
        echo view('layout/side-admin/top', $data);
        echo view('admin/slideshow/v_index', $data);
        echo view('layout/side-admin/bottom', $data);
    }

    public function add_slideshow()
    {
        $file = $this->request->getFile('file_gambar');

        $file->move('uploads/slideshow/');
        $nama_file = $file->getName();

        $data = [
            'file_gambar'       => $nama_file,
        ];
        $this->db->table('pmb_slideshow')->insert($data);

        set_notifikasi_toast('success', 'Data Ditambah');
        return redirect()->to(base_url("admin/slideshow"));
    }


    public function slideshow_hapus($id_slideshow)
    {
        $slideshow =  $this->db->table('pmb_slideshow')->where('id_slideshow', $id_slideshow)->get()->getRowArray();
        // dd($slideshow);
        // unlink('uploads/slideshow/' . $slideshow['file_gambar']);

        $this->db->table('pmb_slideshow')->where('id_slideshow', $id_slideshow)->delete();
        set_notifikasi_toast('info', 'Slideshow Di hapus');
        return redirect()->to(base_url("admin/slideshow"));
    }
}
