<?php

namespace App\Controllers\mahasiswa;

use App\Controllers\BaseController;

class Data extends BaseController
{
    public function index()
    {
        $mhs = $this->db->query("SELECT * FROM pmb_mahasiswa WHERE id_pmb=" . session()->get('id_pmb') . "")->getRowArray();
        $pengumuman = $this->db->query("SELECT * FROM pmb_pengaturan ORDER BY  id_pengaturan DESC")->getRowArray();
        $data = [
            'title' => 'Data Pendaftar Mahasiswa | AKFAR CEFADA',
            'mahasiswa' => $mhs,
            'pengumuman'    => $pengumuman['ujian'],
        ];
        echo view('layout/side-mhs/top', $data);
        echo view('mahasiswa/v_index', $data);
        echo view('layout/side-mhs/bottom');
    }

    public function mhs()
    {
        $mhs = $this->db->query("SELECT * FROM pmb_mahasiswa WHERE id_pmb=" . session()->get('id_pmb') . "")->getRowArray();
        $data = [
            'title' => 'Data Pendaftar Mahasiswa | AKFAR CEFADA',
            'mahasiswa' => $mhs
        ];
        echo view('layout/side-mhs/top', $data);
        echo view('mahasiswa/v_index', $data);
        echo view('layout/side-mhs/bottom');
    }


    public function identitas()
    {
        $mhs = $this->db->query("SELECT * FROM pmb_mahasiswa WHERE id_pmb=" . session()->get('id_pmb') . "")->getRowArray();
        $data = [
            'title' => 'Identitas Pendaftar | AKFAR CEFADA',
            'mahasiswa' => $mhs
        ];
        echo view('layout/side-mhs/top', $data);
        echo view('mahasiswa/v_identitas', $data);
        echo view('layout/side-mhs/bottom');
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

                'nik'         => [
                    'rules' => 'required|is_unique[pmb_mahasiswa.nik]',
                    'errors' => [
                        'required'  => 'Isi terlebih dulu',
                        'is_unique'  => 'NIK sudah terdaftar',
                    ]
                ],
            ]);
            if ($validation == FALSE) {
                // dd($this->validation->getErrors);
                set_notifikasi_swal('error', 'Gagal', 'Periksa Kembali  Format/Ukuran file  salah');
                return redirect()->to(base_url('portal/formulir'))->withInput()->with('validation', $validation);
            } else {

                $date = date('Ymd');
                $header = $date . '.';
                $get_no = $this->db->table('pmb_mahasiswa')->select('MAX(no_pendaftaran) AS kode')->get()->getRowArray();
                $no_akhir = $get_no['kode'];

                $in['no_pendaftaran'] = buatkode($no_akhir, 'PMB.AKFAR.', 3);
                // $in['no_pendaftaran'] = buatkode($no_akhir, 'PPDB.' . $date . '.', 3);
                // dd($in);

                $in['jalur_pendaftaran'] = $input->getPost("jalur_pendaftaran");
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
    }

    public function update_bukti_bayar($id_pmb)
    {
        $validation = $this->validate([
            'bukti_bayar'         => [
                'rules' => 'uploaded[bukti_bayar]|max_size[bukti_bayar,5000]|mime_in[bukti_bayar,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded'  => 'Pilih file terlebih dulu',
                    'mime_in'   => 'format file tidak sesuai',
                    'max_size'  => 'Ukuran gambar maximal 1 MB'
                ]
            ],
        ]);
        if ($validation == FALSE) {
            // dd($this->validation->getErrors);
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/data/'));
        } else { // file dari form

            $file_bukti_bayar = $this->request->getFile('bukti_bayar');
            $file_bukti_bayar->move('uploads/bukti_bayar');
            $nama_bukti_bayar = $file_bukti_bayar->getName();

            $in['bukti_bayar'] = $nama_bukti_bayar;
            $in['id_pmb'] = $id_pmb;
            $this->Mahasiswa_model->edit($in);
            set_notifikasi_toast('success', 'File bukti_bayar diubah ');
            return redirect()->to(base_url('mahasiswa/data/'));
        }
    }

    public function berkas()
    {
        $mhs = $this->db->query("SELECT * FROM pmb_mahasiswa WHERE id_pmb=" . session()->get('id_pmb') . "")->getRowArray();
        $data = [
            'title' => 'Silahkan upload berkas Pendaftar | AKFAR CEFADA',
            'mahasiswa' => $mhs
        ];
        echo view('layout/side-mhs/top', $data);
        echo view('mahasiswa/v_berkas', $data);
        echo view('layout/side-mhs/bottom');
    }

    public function save_identitas($id_pmb)
    {
        $input = $this->request;



        $date = date('Ymd');
        $header = $date . '.';
        $get_no = $this->db->table('pmb_mahasiswa')->select('MAX(no_pendaftaran) AS kode')->get()->getRowArray();
        $no_akhir = $get_no['kode'];

        if ($input->getPost('jenis') != 'ubah') {
            // $in['no_pendaftaran'] = buatkode($no_akhir, 'PMB.AKFAR.', 3);
            # code...
        }

        // $in['no_pendaftaran'] = buatkode($no_akhir, 'PPDB.' . $date . '.', 3);
        // dd($in);

        $in['jalur_pendaftaran'] = $input->getPost("jalur_pendaftaran");

        $in['nik'] = $input->getPost("nik");
        $in['email'] = $input->getPost("email");
        $in['nama_siswa'] = $input->getPost("nama_siswa");
        $in['jenis_kelamin'] = $input->getPost("jenis_kelamin");
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
        $in['kewarganegaraan'] = $input->getPost("kewarganegaraan");

        $in['tinggi_badan'] = $input->getPost("tinggi_badan");
        $in['berat_badan'] = $input->getPost("berat_badan");
        $in['jarak_ke_sekolah'] = $input->getPost("jarak_ke_sekolah");
        $in['waktu_tempuh_ke_sekolah'] = $input->getPost("waktu_tempuh_ke_sekolah");
        $in['jumlah_saudara'] = $input->getPost("jumlah_saudara");



        $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);

        set_notifikasi_toast('success', 'Identitas diri Berhasil ditambahkan');
        return redirect()->to(base_url("mahasiswa/data/identitas"));
    } //Akhir Input


    public function save_orangtua($id_pmb)
    {
        $input = $this->request;
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


        $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);

        set_notifikasi_toast('success', 'Data Orangtua Berhasil ditambahkan');
        return redirect()->to(base_url("mahasiswa/data/identitas"));
    }

    public function save_wali($id_pmb)
    {
        $input = $this->request;
        $in['nama_wali'] = $input->getPost("nama_wali");
        $in['telp_wali'] = $input->getPost("telp_wali");
        $in['tahun_lahir_wali'] = $input->getPost("tahun_lahir_wali");
        $in['pendidikan_wali'] = $input->getPost("pendidikan_wali");
        $in['pekerjaan_wali'] = $input->getPost("pekerjaan_wali");
        $in['penghasilan_wali'] = $input->getPost("penghasilan_wali");
        $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);

        set_notifikasi_toast('success', 'Data wali Berhasil ditambahkan');
        return redirect()->to(base_url("mahasiswa/data/identitas"));
    }

    public function save_asal($id_pmb)
    {
        $input = $this->request;
        $in['asal_sekolah'] = strtoupper($input->getPost("asal_sekolah"));
        $in['sumber_info'] = $input->getPost("sumber_info");
        $in['tahun_lulus'] = $input->getPost("tahun_lulus");
        $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);

        set_notifikasi_toast('success', 'Data wali Berhasil ditambahkan');
        return redirect()->to(base_url("mahasiswa/data/identitas"));
        // dd($in);
    }

    public function save_foto($id_pmb)
    {
        $validation = $this->validate([
            'foto'         => [
                'rules' => 'uploaded[foto]|max_size[foto,5000]|mime_in[foto,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded'  => 'Pilih Foto terlebih dulu',
                    'mime_in'   => 'format file tidak sesuai',
                    'max_size'  => 'Ukuran gambar maximal 1 MB'
                ]
            ],
        ]);
        if ($validation == FALSE) {
            // dd($this->validation->getErrors);

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/data/berkas'))->withInput()->with('validation', $validation);
        } else {
            // file dari form

            $file_foto = $this->request->getFile('foto');

            // simpan ke folder

            $file_foto->move('uploads/foto');

            // kasih nama
            $nama_foto = $file_foto->getName();

            $in['foto'] = $nama_foto;

            $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);
            // dd($in);

            set_notifikasi_swal('infro', 'Berhasil', 'Berkas berhasil di unggah');
            return redirect()->to(base_url("mahasiswa/data/berkas"));
        }
    }

    public function save_kesehatan($id_pmb)
    {
        $validation = $this->validate([

            'surat_kesehatan'         => [
                'rules' => 'uploaded[surat_kesehatan]|max_size[surat_kesehatan,5000]|mime_in[surat_kesehatan,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded'  => 'Pilih suket terlebih dulu',
                    'mime_in'   => 'format suket tidak sesuai',
                    'max_size'  => 'Ukuran gambar maximal 1 MB'
                ]
            ],
        ]);
        if ($validation == FALSE) {
            // dd($this->validation->getErrors);

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/data/berkas'))->withInput()->with('validation', $validation);
        } else {
            // file dari form


            $file_surat_kesehatan = $this->request->getFile('surat_kesehatan');



            $file_surat_kesehatan->move('uploads/surat_kesehatan');
            // kasih nama
            $nama_surat = $file_surat_kesehatan->getName();
            // simpan ke database
            $in['surat_kesehatan'] = $nama_surat;

            $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);
            // dd($in);

            set_notifikasi_swal('infro', 'Berhasil', 'Berkas berhasil di unggah');
            return redirect()->to(base_url("mahasiswa/data/berkas"));
        }
    }

    public function save_raport($id_pmb)
    {
        $validation = $this->validate([
            'nilai_raport'         => [
                'rules' => 'uploaded[nilai_raport]|max_size[nilai_raport,5000]|mime_in[nilai_raport,application/pdf,application/msword,application/x-tar,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded'  => 'Pilih raport terlebih dulu',
                    'mime_in'   => 'format raport tidak sesuai',
                    'max_size'  => 'Ukuran gambar maximal 1 MB'
                ]
            ],
        ]);
        if ($validation == FALSE) {
            // dd($this->validation->getErrors);

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/data/berkas'))->withInput()->with('validation', $validation);
        } else {
            $file_nilai_raport = $this->request->getFile('nilai_raport');
            // simpan ke folder

            $file_nilai_raport->move('uploads/nilai_raport');
            // kasih nama

            $nama_nilai  = $file_nilai_raport->getName();
            // simpan ke database

            $in['nilai_raport'] = $nama_nilai;

            $this->db->table('pmb_mahasiswa')->where('id_pmb', $id_pmb)->update($in);
            // dd($in);

            set_notifikasi_swal('infro', 'Berhasil', 'Nilai raport berhasil di unggah');
            return redirect()->to(base_url("mahasiswa/data/berkas"));
        }
    }
    public function cetak_formulir($no_pendaftaran)
    {
        $ta = $this->db->table('ta')->where('status', 'aktif')->get()->getRowArray();
        $data['ta'] = $ta['tahun_akademik'];
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_byNo($no_pendaftaran);

        $data['title'] = 'Data Pendaftaran';
        echo view('mahasiswa/v_pdf', $data);
    }
}
