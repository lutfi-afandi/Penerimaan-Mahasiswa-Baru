<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa_model extends Model
{
    public function get_mahasiswa()
    {
        return
            $this->db->table('pmb_mahasiswa')->orderBy('no_pendaftaran', 'DESC')->get()->getResultArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }
public function get_mahasiswa_tunggu()
    {
        return
            $this->db->table('pmb_mahasiswa')->where('status', '0')->orderBy('no_pendaftaran', 'DESC')->get()->getResultArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }
    public function get_mahasiswa_diterima()
    {
        return
            $this->db->table('pmb_mahasiswa')->where('status', '1')->orderBy('no_pendaftaran', 'DESC')->get()->getResultArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }
    public function get_mahasiswa_ditolak()
    {
        return
            $this->db->table('pmb_mahasiswa')->where('status', '2')->orderBy('no_pendaftaran', 'DESC')->get()->getResultArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }
    public function get_mahasiswa_byId($id_pmb)
    {
        return
            $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->get()->getRowArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }
    public function get_mahasiswa_byNISN($nisn)
    {
        return
            $this->db->table('pmb_mahasiswa')->where('nisn', $nisn)->get()->getRowArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }
    public function get_mahasiswa_byNo($no_pendaftaran)
    {
        return
            $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();
        // $this->db->table('pmb_mahasiswa')->get()->cou
    }

    public function edit($data)
    {
        $this->db->table('pmb_mahasiswa')->where('id_pmb', $data['id_pmb'])
            ->update($data);
    }
}
