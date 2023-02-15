<?php


namespace App\Controllers\admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = "User";
        $data['user'] = $this->db->table('user')->get()->getResultArray();

        // dd($data);
        echo view('layout/side-admin/top', $data);
        echo view('admin/v_user', $data);
        echo view('layout/side-admin/bottom', $data);
    }

    public function add_user()
    {
        $valid = $this->validate(
            [
                'username'  => [
                    'label' => 'Username',
                    'rules'  =>  'required|is_unique[user.username]',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'is_unique'    => '{field} Sudah ada, Wajib Beda!'
                    ]
                ],
            ]
        );
        if (!$valid) {
            set_notifikasi_toast('error', 'Username sudah ada');
            return redirect()->to(base_url('admin/user'));
        } else {
            $data = [
                'nama'  => $this->request->getPost('nama'),
                'username'  => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level'     => 'admin',
            ];
            // dd($data);

            $this->db->table('user')->insert($data);

            set_notifikasi_toast('success', 'Data Ditambah');
            return redirect()->to(base_url("admin/user"));
        }
    }

    public function edit_password($id)
    {
        $data = [
            'password' => password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT),
            'id'     => $id,
        ];
        // dd($data);

        $this->db->table('user')->where('id', $data['id'])->update($data);

        set_notifikasi_toast('info', 'Password Di Ubah');
        return redirect()->to(base_url("admin/user"));
    }

    public function delete_user($id)
    {
        if (session()->get('id') == $id) {
            set_notifikasi_toast('danger', 'Gagal Menghapus user aktif');
            return redirect()->to(base_url("admin/user"));
        } else {
            $data = [
                'id'     => $id,
            ];
            // dd($data);
            $this->db->table('user')->where('id', $data['id'])->delete();
            set_notifikasi_toast('info', 'User Di hapus');
            return redirect()->to(base_url("admin/user"));
        }
    }
}
