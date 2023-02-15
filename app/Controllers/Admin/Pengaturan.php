<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Pengaturan extends BaseController
{
    public function index()
    {
        $data['title'] = "Pengaturan";
        $data['carousel'] = $this->db->table('pmb_carousel')->get()->getResultArray();
        $data['pengaturan'] = $this->db->table('pmb_pengaturan')->orderBy('id_pengaturan')->get()->getRowArray();

        echo view('layout/side-admin/top', $data);
        echo view('admin/pengaturan/v_index', $data);
        echo view('layout/side-admin/bottom', $data);
    }

    public function add_carousel()
    {
        $file = $this->request->getFile('file_gambar');

        $file->move('uploads/carousel/');
        $nama_file = $file->getName();

        $data = [
            'file_gambar'       => $nama_file,
        ];
        $this->db->table('pmb_carousel')->insert($data);

        set_notifikasi_toast('success', 'Data Ditambah');
        return redirect()->to(base_url("admin/pengaturan"));
    }

    public function delete_carousel($id_carousel)
    {
        $carousel =  $this->db->table('pmb_carousel')->where('id_carousel', $id_carousel)->get()->getRowArray();
        // dd($carousel);
        // unlink('uploads/carousel/' . $carousel['file_gambar']);

        $this->db->table('pmb_carousel')->where('id_carousel', $id_carousel)->delete();
        set_notifikasi_toast('info', 'Gambar Carousel Di hapus');
        return redirect()->to(base_url("admin/pengaturan"));
    }

    public function ubah_pengaturan($id_pengaturan)
    {
        $file = $this->request->getFile('file_prosedur');
        // dd($file->getName());
        if ($file->getName() == "") {
            $data = [
                'id_pengaturan'     => $id_pengaturan,
                'tentang'       => $this->request->getPost('tentang'),
                'pengumuman'       => $this->request->getPost('pengumuman')
            ];
        } else {

            $pengaturan = $this->db->table('pmb_pengaturan')->where('id_pengaturan', $id_pengaturan)->get()->getRowArray();
            // unlink('uploads/pengaturan/' . $pengaturan['prosedur']);

            $file->move('uploads/pengaturan/');
            $nama_file = $file->getName();

            $data = [
                'id_pengaturan'     => $id_pengaturan,
                'tentang'       => $this->request->getPost('tentang'),
                'pengumuman'       => $this->request->getPost('pengumuman'),
                'prosedur'      => $nama_file
            ];
        }


        $this->db->table('pmb_pengaturan')->where('id_pengaturan', $data['id_pengaturan'])->update($data);
        set_notifikasi_toast('info', 'Data Prosedur d Update');
        return redirect()->to(base_url("admin/pengaturan"));
    }

    public function ubah_ujian($id_pengaturan)
    {
        // dd($this->request->getPost('ujian'));

        $data = [
            'id_pengaturan'     => $id_pengaturan,
            'ujian'       => $this->request->getPost('ujian'),
        ];
        // dd($data['ujian']);

        $this->db->table('pmb_pengaturan')->where('id_pengaturan', $data['id_pengaturan'])->update($data);
        set_notifikasi_toast('info', 'Informasi Ujian d Update');
        return redirect()->to(base_url("admin/pengaturan"));
    }
}
