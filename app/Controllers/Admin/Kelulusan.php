<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use PHPExcel;
use PHPExcel_IOFactory;

class Kelulusan extends BaseController
{
    public function index()
    {
        $data['title'] = "Kelulusan";
        $data['kelulusan'] = $this->Kelulusan_model->get_kelulusan();
        echo view('layout/side-admin/top', $data);
        echo view('admin/kelulusan/v_index', $data);
        echo view('layout/side-admin/bottom', $data);
    }

    public function kelulusan_import()
    {
        $file_excel = $this->request->getFile('file_import');

        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $no_ujian = $row[0];
            $nama_siswa = $row[1];
            $nilai = $row[2];
            $keterangan = $row[3];

            // dd($no_ujian);

            $no_ = $this->db->table('pmb_kelulusan')->getWhere(['no_ujian' => $no_ujian])->getResult();

            if (count($no_) > 0) {
                set_notifikasi_toast('info', 'No Ujian sudah ada import excel');
            } else {

                $in = [
                    'no_ujian' => $no_ujian,
                    'nama_siswa' => $nama_siswa,
                    'nilai' => $nilai,
                    'keterangan' => $keterangan,

                ];
                $this->db->table('pmb_kelulusan')->insert($in);
            }
        }

        set_notifikasi_toast('info', 'Berhasil import excel');
        return redirect()->to(base_url("admin/kelulusan"));
    }


    public function hapus($id_kelulusan)
    {

        $this->db->table('pmb_kelulusan')->where('id_kelulusan', $id_kelulusan)->delete();
        set_notifikasi_toast('info', 'Data Dihapus');
        return redirect()->to(base_url("admin/kelulusan"));
    }


    public function input()
    {

        $in['no_ujian'] = $this->request->getPost('no_ujian');
        $in['nama_siswa'] = $this->request->getPost('nama_siswa');
        $in['nilai'] = $this->request->getPost('nilai');
        $in['keterangan'] = $this->request->getPost('keterangan');
        $validation = $this->validate([
            'no_ujian'         => [
                'rules' => 'required|is_unique[pmb_kelulusan.no_ujian]',
                'errors' => [
                    'id_unique'  => 'Nomor ujian Sudah ada',
                ]
            ],
        ]);
        // dd($cek_nik);
        if ($validation == FALSE) {
            set_notifikasi_toast('error', 'Nomor ujian Sudah ada');
            return redirect()->to(base_url("admin/kelulusan"));
        } else {
            // dd($in);
            $this->db->table('pmb_kelulusan')->insert($in);
            set_notifikasi_toast('success', 'Data Ditambahkan');
            return redirect()->to(base_url("admin/kelulusan"));
        }
    }
}
