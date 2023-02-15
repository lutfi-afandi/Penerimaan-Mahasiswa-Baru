<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
    public function login_user($username)
    {
        return $this->db->table('user')
            ->where('username', $username)
            ->get()->getRowArray();
    }

    public function login_mhs($no_hp, $password)
    {
        return $this->db->table('pmb_mahasiswa')
            ->where('no_hp', $no_hp)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
