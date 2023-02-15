<?php


namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Tahunakademik extends BaseController
{
    public function index()
    {
        $data['title'] = "Tahun Akademik";
        $data['ta'] = $this->db->table('ta')->orderBy('tahun_akademik', 'DESC')->get()->getResultArray();

        // dd($data);
        echo view('layout/side-admin/top', $data);
        echo view('admin/v_ta', $data);
        echo view('layout/side-admin/bottom', $data);
    }

    public function add_ta()
    {
        $data = [
            'tahun_akademik'  => $this->request->getPost('tahun_akademik'),
        ];
        // dd($data);

        $this->db->table('ta')->insert($data);

        set_notifikasi_toast('success', 'Data Ditambah');
        return redirect()->to(base_url("admin/tahunakademik"));
    }

    public function update_status($id)
    {
        $this->db->query('UPDATE ta SET status="tidak aktif"');

        $data = [
            'id' => $id,
            'status' => $this->request->getPost('status'),
        ];
        $this->db->table('ta')->where('id', $data['id'])->update($data);
        set_notifikasi_toast('info', 'Status di ubah');
        return redirect()->to(base_url("admin/tahunakademik"));
    }

    public function delete_ta($id)
    {
        if (session()->get('id') == $id) {
            set_notifikasi_toast('danger', 'Gagal Menghapus ta aktif');
            return redirect()->to(base_url("ta"));
        } else {
            $data = [
                'id'     => $id,
            ];
            // dd($data);
            $this->db->table('ta')->where('id', $data['id'])->delete();
            set_notifikasi_toast('info', 'Tahun Akademik Di hapus');
            return redirect()->to(base_url("admin/tahunakademik"));
        }
    }
}
