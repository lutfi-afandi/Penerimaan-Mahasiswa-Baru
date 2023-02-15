<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{

    public function __construct()
    {
    }
    public function index()
    {

        $d['title'] = "Data Pendaftar";
        $d['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa();
        echo view('layout/side-admin/side-admin/top', $d);
        echo view('mahasiswa/v_index', $d);
        echo view('layout/side-admin/side-admin/bottom');
    }

    public function list($string = '')
    {
        if ($string == 'diterima') {
            $d['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_diterima();
            $d['title'] = "Data Pendaftar Diterima";
        } elseif ($string == 'ditolak') {
            $d['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_ditolak();
            $d['title'] = "Data Pendaftar Ditolak";
        } elseif ($string == '') {
            $d['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_tunggu();
            $d['title'] = "Data Pendaftar";
        }
        // dd($d);
        echo view('layout/side-admin/top', $d);
        echo view('admin/mahasiswa/v_index', $d);
        echo view('layout/side-admin/bottom');
    }

    public function detail($id_pmb)
    {
        
        $d['title'] = "Data Pendaftar";
        $d['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_byId($id_pmb);
        $d['mahasiswas'] = $this->Mahasiswa_model->get_mahasiswa();
        echo view('layout/side-admin/top', $d);
        echo view('admin/mahasiswa/v_detail', $d);
        echo view('layout/side-admin/bottom');
    }
    public function cetak($no_pendaftaran)
    {
        // $d['title'] = "Data Pendaftar";
        // $d['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_byId($id_pmb);
        // echo view('mahasiswa/v_cetak', $d);
        // // echo view('layout/side-admin/bottom');


        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();

        $cek = $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();
        if ($cek) {
            $data['ta'] = $ta['tahun_akademik'];
            $data['mahasiswa'] = $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();
            $data['title'] = "Pendaftaran " . $no_pendaftaran;
            // dd($data['ta'], $data['mahasiswa']);
            return view('front/v_pdf', $data);
        } else {
            echo '<script>
            alert("No Pendaftaran Tidak Ditemukan")
            document.location.href="' . base_url() . 'portal"
            </script>';
        }
    }

    public function mahasiswa_terima($id_pmb)
    {
        $in['status'] = '1';
        $in['id_pmb']   = $id_pmb;
        $this->Mahasiswa_model->edit($in);
        set_notifikasi_toast('success', 'Status diterima');
        return redirect()->to(base_url("mahasiswa/detail/" . $in['id_pmb']));
    }
    public function mahasiswa_tolak($id_pmb)
    {
        $in['status'] = '2';
        $in['id_pmb']   = $id_pmb;
        $this->Mahasiswa_model->edit($in);
        set_notifikasi_toast('success', 'Status Ditolak');
        return redirect()->to(base_url("mahasiswa/detail/" . $in['id_pmb']));
    }

    public function download($no_pendaftaran = "")
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();

        $cek = $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();
        if ($cek) {
            $data['ta'] = $ta['tahun_akademik'];
            $data['mahasiswa'] = $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();
            $data['title'] = "Pendaftaran " . $no_pendaftaran;
            // dd($data['ta'], $data['mahasiswa']);
            return view('admin/mahasiswa/v_pdf', $data);
        } else {
            echo '<script>
            alert("No Pendaftaran Tidak Ditemukan")
            document.location.href="' . base_url() . 'portal"
            </script>';
        }
    }

    public function konfirmasi($id_pmb)
    {
        $d['status'] =  $this->request->getPost('status');
        if ($d['status'] == '1') {
            $status = 'Diterima';
        } elseif ($d['status'] == '2') {
            $status = 'Ditolak';
        } else {
            $status = 'Menunggu';
        }
        $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($d);
        set_notifikasi_toast('info', 'Status ' . $status);
        return redirect()->to(base_url("admin/mahasiswa/list/"));
    }

    public function hapus($id_pmb)
    {

        $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->delete();
        set_notifikasi_toast('info', 'Data Dihapus');
        return redirect()->to(base_url("admin/mahasiswa/list"));
    }


    public function update_cpd($id_pmb)
    {
        $input = $this->request;
        $in['id_pmb']   = $id_pmb;
        $in['nisn']   = $input->getPost('nisn');
        $in['jalur_pendaftaran']   = $input->getPost('jalur_pendaftaran');
        $in['nama_siswa']   = $input->getPost('nama_siswa');
        $in['jenis_kelamin']   = $input->getPost('jenis_kelamin');
        $in['tempat_lahir']   = $input->getPost('tempat_lahir');
        $in['tanggal_lahir']   = $input->getPost('tanggal_lahir');
        $in['agama']   = $input->getPost('agama');
        $in['no_hp']   = $input->getPost('no_hp');
        $this->Mahasiswa_model->edit($in);
        set_notifikasi_toast('success', 'Status diterima');
        return redirect()->to(base_url("admin/mahasiswa/detail/" . $in['id_pmb']));
    }

    public function update_nik($id_pmb)
    {
        $input = $this->request;
        $in['id_pmb']   = $id_pmb;
        $in['nisn']   = $input->getPost('nisn');
        $in['nik']   = $input->getPost('nik');
        $in['alamat']   = $input->getPost('alamat');
        $in['email']   = $input->getPost('email');
        $in['kewarganegaraan']   = $input->getPost('kewarganegaraan');
        $in['kelurahan']   = $input->getPost('kelurahan');
        $in['kabupaten']   = $input->getPost('kabupaten');
        $in['kode_pos']   = $input->getPost('kode_pos');
        $in['asal_sekolah']   = $input->getPost('asal_sekolah');
        $in['tahun_lulus']   = $input->getPost('tahun_lulus');

        $this->Mahasiswa_model->edit($in);
        set_notifikasi_toast('success', 'Status diterima');
        return redirect()->to(base_url("admin/mahasiswa/detail/" . $in['id_pmb']));
    }
}
