<?php

namespace App\Controllers;


class Portal extends BaseController
{
    public function index()
    {
        $data['prosedur'] = $this->db->table('pmb_pengaturan')->orderBy('id_pengaturan', 'DESC')->get()->getRowArray();
        $data['title'] = "Penerimaan Mahasiswa Baru | AKFAR CEFADA";
        echo view('layout/topbar/top', $data);
        echo view('front/v_index', $data);
        echo view('layout/topbar/bottom');
    }


    public function pendaftaran()
    {
        $data['title'] = "Formulir Pendaftaran Mahasiswa Baru | AKFAR CEFADA";
        $data['judul'] = "";
        echo view('layout/topbar/top', $data);
        echo view('front/v_pendaftaran', $data);
        echo view('layout/topbar/bottom');
    }

    public function daftar()
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();

        $input = $this->request;


        $in['no_hp']              = $input->getPost('no_hp');
        $validation = $this->validate([
            'no_hp'         => [
                'rules' => 'required|is_unique[pmb_mahasiswa.no_hp]',
                'errors' => [
                    'id_unique'  => 'Nomor telepon telah terdaftar',
                ]
            ],
        ]);
        // dd($cek_nik);
        if ($validation == FALSE) {
            session()->setFlashdata("error", "No HP Sudah Terdaftar");
            return redirect()->to(base_url('portal/pendaftaran'))->withInput()->with('validation', $validation);
        } else {
            $date = date('Ymd');
            // $tahun = substr(date('Y'), 2, 2);
            $tahun = '23';
            $header = $date . '.';
            $get_no = $this->db->table('pmb_mahasiswa')->select('MAX(no_pendaftaran) AS kode')->get()->getRowArray();
            $no_akhir = $get_no['kode'];
            $in['no_pendaftaran'] = buatkode($no_akhir, 'PMB.AKFAR.' . $tahun . '.',  3);
            // $get_no = $this->db->table('pmb_mahasiswa')->select('MAX(no_pendaftaran) AS kode')->get()->getRowArray();
            // $no_akhir = $get_no['kode'];

            // $in['no_pendaftaran'] = buatkode($no_akhir, 'PMB.AKFAR.', 3);
            $in['password']         = $input->getPost("no_hp");
            $in['jalur_pendaftaran'] = $input->getPost("jalur_pendaftaran");
            $in['no_hp']            = $input->getPost('no_hp');
            $in['nama_siswa']       = $input->getPost("nama_siswa");
            $in['jenis_kelamin']    = $input->getPost("jenis_kelamin");
            $in['tempat_lahir']     = $input->getPost("tempat_lahir");
            $in['tanggal_lahir']    = $input->getPost("tanggal_lahir");
            $in['asal_sekolah']    = strtoupper($input->getPost("asal_sekolah"));
            $in['username_cbt']    =  $in['no_pendaftaran'];
            $in['ta_daftar'] = $ta['tahun_akademik'];
            $this->db->table('pmb_mahasiswa')->insert($in);
            session()->setFlashdata('success', 'Data berhasil direkam!');
            return redirect()->to(base_url('mahasiswa/auth'));
        }
    }

    public function login_daftar()
    {
        session();
        if (session()->get('level') == 'admin') {
            // dd(session()->get());
            session_destroy();
            $data = [
                'title' => 'Login Pendaftar Mahasiswa Baru | AKFAR CEFADA',

            ];
            echo view('topbar/top', $data);
            echo view('front/v_login', $data);
            echo view('topbar/bottom');
        } elseif (session()->get('login_mhs') == TRUE) {
            set_notifikasi_toast('error', 'Anda Masih login sebagai ' . session()->get('nisn'));
            return redirect()->to(base_url('portal/data_mahasiswa/' . session()->get('nisn')));
        } else {
            // dd(session()->get());
            $data = [
                'title' => 'Login Pendaftar Mahasiswa Baru | AKFAR CEFADA',

            ];
            echo view('topbar/top', $data);
            echo view('front/v_login', $data);
            echo view('topbar/bottom');
        }
    }

    public function cek_login()
    {
        session();
        $no_hp = $this->request->getPost('no_hp');
        $password = $this->request->getPost('password');

        $pendaftar = $this->Login_model->login_pendaftar($no_hp, $password);
        if (!empty($pendaftar)) {
            session()->set('id_pmb', $pendaftar['id_pmb']);
            session()->set('nama_siswa', $pendaftar['nama_siswa']);
            session()->set('lengkap', $pendaftar['lengkap']);
            session()->set('no_hp', $pendaftar['no_hp']);
            session()->set('login_mhs', TRUE);

            set_notifikasi_toast('success', 'Selamat datang ' . $pendaftar['nama_siswa']);
            return redirect()->to(base_url("portal/data_mahasiswa/"));
        } else {
            session()->setFlashdata('error', 'nomor HP belum terdaftar <br> Silahkan mendaftar terlebih dahulu.');
            return redirect()->to(base_url('portal/login_daftar'));
        }
    }

    public function data_mahasiswa()
    {
        session();
        // dd(session()->get());
        // $mhs = $this->db->query("SELECT * FROM pmb_mahasiswa WHERE id_pmb =$id_pmb")->getRowArray();
        // dd($mhs);

        $data = [
            'title' => 'Login Pendaftar Mahasiswa Baru | AKFAR CEFADA',
            // 'mhs'   => $mhs

        ];
        echo view('front/template/top', $data);
        echo view('front/v_data_mahasiswa', $data);
        echo view('front/template/bottom');
        // }
    }

    public function data_mahasiswa1($nisn)
    {
        // if (session()->get('login_mhs') != TRUE) {
        //     return redirect()->to(base_url('portal/login_daftar'));
        // } else {
        // dd(session()->get());
        $data = [
            'title' => 'Data Calon Mahasiswa Baru | AKFAR CEFADA',
            'mahasiswa'     => $this->Mahasiswa_model->get_mahasiswa_byNISN($nisn),
        ];
        echo view('topbar/top', $data);
        echo view('front/v_data', $data);
        echo view('topbar/bottom');
        // }
    }

    public function formulir()
    {
        $data['title'] = "Formulir PMB";
        $data['judul'] = "";
        echo view('topbar/top', $data);
        echo view('front/v_formulir', $data);
        echo view('topbar/bottom');
    }

    public function formulir_save()
    {
        $input = $this->request;


        $in['nisn'] = $input->getPost("nisn");
        $cek_nisn = $this->db->table('pmb_mahasiswa')->where('nisn', $in['nisn'])->countAllResults();
        // dd($cek_nisn);
        if ($cek_nisn > 0) {
            session()->setFlashdata("error", "Email Sudah Terdaftar");
            return redirect()->to(base_url("portal/formulir"));
        } else {

            $validation = $this->validate([
                'foto'         => [
                    'rules' => 'uploaded[foto]|max_size[foto,5000]|mime_in[foto,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded'  => 'Pilih file terlebih dulu',
                        'mime_in'   => 'format file tidak sesuai',
                        'max_size'  => 'Ukuran gambar maximal 1 MB'
                    ]
                ],
                'bukti_bayar'         => [
                    'rules' => 'uploaded[bukti_bayar]|max_size[bukti_bayar,5000]|mime_in[bukti_bayar,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded'  => 'Pilih file terlebih dulu',
                        'mime_in'   => 'format file tidak sesuai',
                        'max_size'  => 'Ukuran gambar maximal 1 MB'
                    ]
                ],
                'surat_kesehatan'         => [
                    'rules' => 'uploaded[surat_kesehatan]|max_size[surat_kesehatan,5000]|mime_in[surat_kesehatan,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded'  => 'Pilih file terlebih dulu',
                        'mime_in'   => 'format file tidak sesuai',
                        'max_size'  => 'Ukuran gambar maximal 1 MB'
                    ]
                ],
                'nilai_raport'         => [
                    'rules' => 'uploaded[nilai_raport]|max_size[nilai_raport,5000]|mime_in[nilai_raport,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded'  => 'Pilih file terlebih dulu',
                        'mime_in'   => 'format file tidak sesuai',
                        'max_size'  => 'Ukuran gambar maximal 1 MB'
                    ]
                ],
            ]);
            if ($validation == FALSE) {
                // dd($this->validation->getErrors);
                set_notifikasi_swal('error', 'Gagal', 'Periksa Kembali  Format/Ukuran file  salah');
                return redirect()->to(base_url('portal/formulir'))->withInput()->with('validation', $validation);
            } else {
                // file dari form
                $file_bukti_bayar = $this->request->getFile('bukti_bayar');
                $file_foto = $this->request->getFile('foto');
                $file_surat_kesehatan = $this->request->getFile('surat_kesehatan');
                $file_nilai_raport = $this->request->getFile('nilai_raport');
                // simpan ke folder
                $file_bukti_bayar->move('uploads/bukti_bayar');
                $file_foto->move('uploads/foto');
                $file_surat_kesehatan->move('uploads/surat_kesehatan');
                $file_nilai_raport->move('uploads/nilai_raport');
                // kasih nama
                $nama_bukti = $file_bukti_bayar->getName();
                $nama_foto = $file_foto->getName();
                $nama_surat = $file_surat_kesehatan->getName();
                $nama_nilai  = $file_nilai_raport->getName();
                // simpan ke database
                $in['bukti_bayar'] = $nama_bukti;
                $in['foto'] = $nama_foto;
                $in['surat_kesehatan'] = $nama_surat;
                $in['nilai_raport'] = $nama_nilai;
                // dd($in);

                $date = date('Ymd');
                $header = $date . '.';
                $get_no = $this->db->table('pmb_mahasiswa')->select('MAX(no_pendaftaran) AS kode')->get()->getRowArray();
                $no_akhir = $get_no['kode'];

                $in['no_pendaftaran'] = buatkode($no_akhir, 'PMB.AKFAR.', 3);
                // $in['no_pendaftaran'] = buatkode($no_akhir, 'PPDB.' . $date . '.', 3);
                // dd($in);

                $in['jalur_pendaftaran'] = $input->getPost("jalur_pendaftaran");
                $in['kelas_pendaftaran'] = $input->getPost("kelas_pendaftaran");
                // $in['hobi'] = $input->getPost("hobi");
                $in['cita_cita'] = $input->getPost("cita_cita");

                $in['nama_siswa'] = $input->getPost("nama_siswa");
                $in['jenis_kelamin'] = $input->getPost("jenis_kelamin");
                $in['nik'] = $input->getPost("nik");
                $in['tempat_lahir'] = $input->getPost("tempat_lahir");
                $in['tanggal_lahir'] = $input->getPost("tanggal_lahir");
                $in['agama'] = $input->getPost("agama");
                $in['status_nikah'] = $input->getPost("status_nikah");
                $in['alamat'] = $input->getPost("alamat");
                $in['rt'] = $input->getPost("rt");
                $in['rw'] = $input->getPost("rw");
                $in['dusun'] = $input->getPost("dusun");
                $in['kelurahan'] = $input->getPost("kelurahan");
                $in['kabupaten'] = $input->getPost("kabupaten");
                $in['kode_pos'] = $input->getPost("kode_pos");
                $in['tempat_tinggal'] = $input->getPost("tempat_tinggal");
                $in['transportasi'] = $input->getPost("transportasi");
                $in['no_hp'] = $input->getPost("no_hp");
                $in['email'] = $input->getPost("email");
                $in['kewarganegaraan'] = $input->getPost("kewarganegaraan");

                $in['tinggi_badan'] = $input->getPost("tinggi_badan");
                $in['berat_badan'] = $input->getPost("berat_badan");
                $in['jarak_ke_sekolah'] = $input->getPost("jarak_ke_sekolah");
                $in['waktu_tempuh_ke_sekolah'] = $input->getPost("waktu_tempuh_ke_sekolah");
                $in['jumlah_saudara'] = $input->getPost("jumlah_saudara");

                $in['nama_ayah'] = $input->getPost("nama_ayah");
                $in['telp_ayah'] = $input->getPost("telp_ayah");
                $in['tahun_lahir_ayah'] = $input->getPost("tahun_lahir_ayah");
                $in['pendidikan_ayah'] = $input->getPost("pendidikan_ayah");
                $in['pekerjaan_ayah'] = $input->getPost("pekerjaan_ayah");
                $in['penghasilan_ayah'] = $input->getPost("penghasilan_ayah");

                $in['nama_ibu'] = $input->getPost("nama_ibu");
                $in['telp_ibu'] = $input->getPost("telp_ibu");
                $in['tahun_lahir_ibu'] = $input->getPost("tahun_lahir_ibu");
                $in['pendidikan_ibu'] = $input->getPost("pendidikan_ibu");
                $in['pekerjaan_ibu'] = $input->getPost("pekerjaan_ibu");
                $in['penghasilan_ibu'] = $input->getPost("penghasilan_ibu");

                $in['nama_wali'] = $input->getPost("nama_wali");
                $in['telp_wali'] = $input->getPost("telp_wali");
                $in['tahun_lahir_wali'] = $input->getPost("tahun_lahir_wali");
                $in['pendidikan_wali'] = $input->getPost("pendidikan_wali");
                $in['pekerjaan_wali'] = $input->getPost("pekerjaan_wali");
                $in['penghasilan_wali'] = $input->getPost("penghasilan_wali");

                $in['asal_sekolah'] = $input->getPost("asal_sekolah");
                $in['sumber_info'] = $input->getPost("sumber_info");
                $in['tahun_lulus'] = $input->getPost("tahun_lulus");
                // dd($in);

                $this->db->table('pmb_mahasiswa')->insert($in);

                set_notifikasi_toast('success', 'Pendaftaran Berhasil');
                return redirect()->to(base_url("portal/cetak/" . $in['no_pendaftaran']));
            } //Akhir Input
        } //akhir klo emain belum
    } //akhir method


    public function cetak($no_pendaftaran)
    {
        $cek = $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();
        if ($cek) {
            $data['title'] = "Data Pendaftaran Mahasiswa Baru | AKFAR CEFADA";
            $data['mahasiswa'] = $this->db->table('pmb_mahasiswa')->where('no_pendaftaran', $no_pendaftaran)->get()->getRowArray();

            echo view('topbar/top', $data);
            echo view('front/v_pdf', $data);
            echo view('topbar/bottom');
        } else {

            return redirect()->to(base_url('portal'));
        }
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
            return view('front/v_pdf', $data);
        } else {
            echo '<script>
            alert("No Pendaftaran Tidak Ditemukan")
            document.location.href="' . base_url() . 'portal"
            </script>';
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to(base_url('portal/login_daftar'));
    }

    public function cetak_formulir()
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();
        $ta['tahun_akademik'];
        $data = [
            'ta' => $ta['tahun_akademik'],
            'title' => 'Cetak Formulir Pendaftaran Mahasiswa Baru | AKFAR CEFADA',
            // 'mahasiswa'     => $this->Mahasiswa_model->get_mahasiswa_byNo($nik),
        ];
        echo view('layout/topbar/top', $data);
        echo view('front/v_cetak_formulir', $data);
        echo view('layout/topbar/bottom');
    }

    public function cetak_formulir_pendaftaran()
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();
        $data['ta'] = $ta['tahun_akademik'];
        $no_pendaftaran = $this->request->getPost('no_pendaftaran');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_byNo($no_pendaftaran);
        if ($data['mahasiswa']) {
            $data['title'] = 'Data Pendaftaran';
            // dd($data['mahasiswa']);

            set_notifikasi_toast('success', 'Cetak Formulir ');
            echo view('front/v_pdf', $data);
        } else {
            set_notifikasi_toast('error', 'Nomor tidak terdaftar ');
            return redirect()->to(base_url('portal/cetak_formulir'));
        }
    }

    public function pengumuman($no_ujian = "")
    {
        $cek = $this->db->table('pmb_pengaturan')->where('id_pengaturan', '1')->get()->getRowArray();
        // dd($cek);
        if (!$cek['pengumuman']) {
            $data['buka'] = false;
        } else {
            $data['buka'] = true;
        }
        $data['no_ujian'] = $no_ujian;
        $data['title'] = 'Pengumuman Mahasiswa Baru | AKFAR CEFADA';
        echo view('layout/topbar/top', $data);
        echo view('front/v_pengumuman', $data);
        echo view('layout/topbar/bottom');
    }

    public function cek_pengumuman()
    {
        return redirect()->to(base_url("portal/pengumuman/" . $this->request->getPost("no_ujian")));
    }

    public function identitas($id_pmb)
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();
        $ta['tahun_akademik'];
        $data = [
            'ta' => $ta['tahun_akademik'],
            'title' => 'Data Pendaftaran Mahasiswa Baru | AKFAR CEFADA',
            // 'mahasiswa'     => $this->Mahasiswa_model->get_mahasiswa_byNo($nik),
        ];
        echo view('layout/topbar/top', $data);
        echo view('front/v_cetak_formulir', $data);
        echo view('layout/topbar/bottom');
    }
}
