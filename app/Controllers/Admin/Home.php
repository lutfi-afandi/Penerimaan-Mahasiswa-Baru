<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();
        $ta_aktif = $ta['tahun_akademik'];
        // dd($ta_aktif);
        $data['title'] = "Dashboard";
        $data['ta_aktif'] = $ta_aktif;
        $hitung_daftar = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE ta_daftar = '$ta_aktif' ")->getRow();
        $hitung_tolak = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE status = '2' AND ta_daftar = '$ta_aktif' ")->getRow();
        $hitung_terima = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE status = '1' AND ta_daftar = '$ta_aktif' ")->getRow();
        $hitung_pria = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE jenis_kelamin = 'Laki-Laki' AND ta_daftar = '$ta_aktif' ")->getRow();
        $hitung_wanita = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE jenis_kelamin = 'Perempuan' AND ta_daftar = '$ta_aktif' ")->getRow();
        $hitung_reguler = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE jalur_pendaftaran like '%Reguler%' AND ta_daftar = '$ta_aktif' ")->getRow();
        $hitung_khusus = $this->db->query("SELECT COUNT(*) as hitung FROM pmb_mahasiswa WHERE jalur_pendaftaran like '%Khusus%' AND ta_daftar = '$ta_aktif' ")->getRow();
        $data['hitung_daftar'] = $hitung_daftar->hitung;
        $data['hitung_tolak'] = $hitung_tolak->hitung;
        $data['hitung_terima'] = $hitung_terima->hitung;
        $data['hitung_pria'] = $hitung_pria->hitung;
        $data['hitung_wanita'] = $hitung_wanita->hitung;
        $data['hitung_reguler'] = $hitung_reguler->hitung;
        $data['hitung_khusus'] = $hitung_khusus->hitung;
        // dd($data);
        echo view('layout/side-admin/top', $data);
        echo view('admin/v_dashboard', $data);
        echo view('layout/side-admin/bottom', $data);
    }
}
