<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelulusan_model extends Model
{
    public function get_kelulusan()
    {
        return
            $this->db->table('pmb_kelulusan')->get()->getResultArray();
        // $this->db->table('pmb_kelulusan')->get()->cou
    }
    public function get_kelulusan_byId($id_kelulusan)
    {
        return
            $this->db->table('pmb_kelulusan')->where('id_kelulusan', $id_kelulusan)->orderBy('id_kelulusan', 'DESC')->get()->getRowArray();
        // $this->db->table('pmb_kelulusan')->get()->cou
    }


    public function tambah($data)
    {
        return $this->db->table('pmb_kelulusan')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('pmb_kelulusan')->where('id_kelulusan', $data['id_kelulusan'])
            ->update($data);
    }
}
