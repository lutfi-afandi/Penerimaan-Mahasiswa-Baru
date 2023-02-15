<div class="content-wrapper">

    <section class="content">

        <div class="card card-danger card-outline">
            <center>
                <h2 class="m-0 text-dark mt-2" style="text-shadow: 2px 2px 4px #17a2b8;">
                    <img src="<?= base_url('img/logo.png'); ?>" alt="Logo" class="brand-image img-rounded " style="width:50px;height:50px;">
                    <br>DATA CALON MAHASISWA BARU<br>
                </h2>
            </center>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>FOTO CALON MAHASISWA</b></center>
                            </div>
                            <div class="row ml-1 mr-1">
                                <div class="card-body ">
                                    <center>
                                        <?php
                                        $namaFoto = $mahasiswa['foto'];
                                        $surat_kesehatan = $mahasiswa['surat_kesehatan'];
                                        $nilai_raport = $mahasiswa['nilai_raport'];
                                        $bukti_bayar = $mahasiswa['bukti_bayar'];
                                        $extensi = substr($namaFoto, -3, 3);
                                        $extensiSurat = substr($surat_kesehatan, -3, 3);
                                        $extensiRaport = substr($nilai_raport, -3, 3);
                                        $extensiBukti = substr($bukti_bayar, -3, 3);
                                        if ($extensi == 'pdf') { ?>
                                            <iframe src="<?= base_url('uploads/foto/' . $mahasiswa['foto']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/foto/' . $mahasiswa['foto']); ?>" class="img img-thumbnail">
                                        <?php } ?>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>BUKTI PEMBAYARAN</b></center>
                            </div>
                            <div class="row ml-1 mr-1">
                                <div class="card-body ">
                                    <center>
                                        <?php if ($extensiBukti == 'pdf') { ?>
                                            <iframe src="<?= base_url('uploads/bukti_bayar/' . $mahasiswa['bukti_bayar']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/bukti_bayar/' . $mahasiswa['bukti_bayar']); ?>" class="img img-thumbnail">
                                        <?php } ?>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>SURAT TIDAK BUTA WARNA</b></center>
                            </div>
                            <div class="row ml-1 mr-1">
                                <div class="card-body ">
                                    <center>
                                        <?php if ($extensiSurat == 'pdf') { ?>
                                            <iframe src="<?= base_url('uploads/surat_kesehatan/' . $mahasiswa['surat_kesehatan']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/surat_kesehatan/' . $mahasiswa['surat_kesehatan']); ?>" class="img img-thumbnail">
                                        <?php } ?>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>NILAI RAPORT</b></center>
                            </div>
                            <div class="row ml-1 mr-1">
                                <div class="card-body ">
                                    <center>
                                        <?php if ($extensiRaport == 'pdf') { ?>
                                            <iframe src="<?= base_url('uploads/nilai_raport/' . $mahasiswa['nilai_raport']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/nilai_raport/' . $mahasiswa['nilai_raport']); ?>" class="img img-thumbnail">
                                        <?php } ?>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>DATA CALON PESERTA DIDIK</b> <button class="btn btn-xs" data-toggle="modal" data-target="#cpd<?= $mahasiswa['id_pmb']; ?>"><i class="fa fa-pen text-white"></i></button> </center>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">No Pendaftaran</td>
                                        <td style="width:10px;">:</td>
                                        <td class="text-uppercase" style="font-weight:bold;"><?= $mahasiswa['no_pendaftaran']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">NISN</td>
                                        <td style="width:10px;">:</td>
                                        <td class="text-uppercase" style="font-weight:bold;"><?= $mahasiswa['nisn']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Jalur Pendaftaran</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['jalur_pendaftaran']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nama Mahasiswa</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['nama_siswa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['jenis_kelamin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tempat , Tanggal Lahir
                                        </td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['tempat_lahir']; ?>, <?= date('d-M-Y', strtotime($mahasiswa['tanggal_lahir'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Agama</td>
                                        <td>:</td>
                                        <td>
                                            <?= $mahasiswa['agama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nomor Telp/Wa</td>
                                        <td>:</td>
                                        <td> <a class="btn bg-success btn-xs" href="https://api.whatsapp.com/send?phone=<?= $mahasiswa['no_hp']; ?>&amp;text=Halo,%0AKami Dari Panitia *PPDB SMKF CEFADA*%0AIngin%20Konfirmasi%20Pembayaran%20Pendaftaran An.%20**%0AApakah Data Tersebut Adalah Benar%0ATerimakasih.%0APanitia *PPDB SMKF CEFADA*" target="_blank"><i class="fab fa-whatsapp"></i> Kirim Pesan</a>
                                            <?= $mahasiswa['no_hp']; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- data NIK -->
                    <?php foreach ($mahasiswas as $key => $mhs) { ?>
                        <div class="modal fade" id="cpd<?= $mhs['id_pmb']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Data <?= $mhs['nama_siswa']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/mahasiswa/update_cpd/' . $mahasiswa['id_pmb']); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Pendaftaran <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?= $mhs['no_pendaftaran']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NISN <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="nisn" name="nisn" value="<?= $mhs['nisn']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nama_siswa" placeholder="nama lengkap ..." value="<?= $mhs['nama_siswa']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jalur Pndaftaran <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <select name="jalur_pendaftaran" class="form-control" id="">
                                                        <option value="Reguler" <?= ($mahasiswa['jalur_pendaftaran'] == 'Reguler') ? 'selected' : ''; ?>>Reguler</option>
                                                        <option value="Khusus" <?= ($mahasiswa['jalur_pendaftaran'] == 'Khusus') ? 'selected' : ''; ?>>Khusus</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Kelamin <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Jenis Kelamin" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="jenis_kelamin" required="">
                                                        <option value="Laki-Laki" <?= ($mahasiswa['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                        <option value="Perempuan" <?= ($mahasiswa['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir <text class="text-danger">*</text></label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" autocomplete="off" value="<?= $mahasiswa['tempat_lahir']; ?>">
                                                </div>
                                                <div class="input-group col-sm-4">
                                                    <input type="date" class="form-control" name="tanggal_lahir" required="" autocomplete="off" value="<?= $mahasiswa['tanggal_lahir']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Agama <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Agama" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="agama" required="">
                                                        <option <?= ($mahasiswa['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                                        <option <?= ($mahasiswa['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                                        <option <?= ($mahasiswa['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                                        <option <?= ($mahasiswa['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                                                        <option <?= ($mahasiswa['agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                                                        <option <?= ($mahasiswa['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                                    <small class="text-danger">*08...</small></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="no_hp" required="" autocomplete="off" value="<?= $mahasiswa['no_hp']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- mODAL NIK PESRTA -->


                    <div class="col-md-6">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>DATA CALON PESERTA DIDIK</b> <button class="btn btn-xs" data-toggle="modal" data-target="#nik<?= $mahasiswa['id_pmb']; ?>"><i class="fa fa-pen text-white"></i></button></center>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">Nomor Induk Penduduk</td>
                                        <td style="width:10px;">:</td>
                                        <td class="text-uppercase" style="font-weight:bold;"><?= $mahasiswa['nik']; ?></td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight:bold;">Alamat</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Email</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Warganegara</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['kewarganegaraan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelurahan/Kabupaten</td>
                                        <td>:</td>
                                        <td> <?= $mahasiswa['kelurahan']; ?>/ <?= $mahasiswa['kabupaten']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kode POS</td>
                                        <td>:</td>
                                        <td> <?= $mahasiswa['kode_pos']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Asal Sekolah</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['asal_sekolah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tahun Lulus</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['tahun_lulus']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- data NIK -->
                    <?php foreach ($mahasiswas as $key => $mhs) { ?>
                        <div class="modal fade" id="nik<?= $mhs['id_pmb']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Data <?= $mhs['nama_siswa']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/mahasiswa/update_nik/' . $mahasiswa['id_pmb']); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Induk Penduduk <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" value="<?= $mhs['nik']; ?>" name="nik">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat Jalan <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" class="form-control" placeholder="alamat" name="alamat" required=""><?= $mahasiswa['alamat']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">E-mail Pribadi <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" placeholder="E-mail Pribadi" name="email" required="" autocomplete="off" value="<?= $mahasiswa['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kewarganegaraan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Kewarganegaraan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="kewarganegaraan" required="">
                                                        <option <?= ($mahasiswa['kewarganegaraan'] == 'Warga Negara Indonesia (WNI)') ? 'selected' : ''; ?>>Warga Negara Indonesia (WNI)</option>
                                                        <option <?= ($mahasiswa['kewarganegaraan'] == 'Warga Negara Asing (WNA)') ? 'selected' : ''; ?>>Warga Negara Asing (WNA)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kelurahan - Kabupaten </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Nama Kelurahan / Desa" name="kelurahan" autocomplete="off" value="<?= $mahasiswa['kelurahan']; ?>">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten" autocomplete="off" value="<?= $mahasiswa['kabupaten']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode POS </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" placeholder="Kode POS" name="kode_pos" autocomplete="off" value="<?= $mahasiswa['kode_pos']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Asal Sekolah <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" required="" autocomplete="off" value="<?= $mahasiswa['asal_sekolah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tahun Lulus<text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="2010" name="tahun_lulus" required="" autocomplete="off" value="<?= $mahasiswa['tahun_lulus']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- mODAL NIK PESRTA -->
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>DATA AYAH</b></center>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">Nama Ayah</td>
                                        <td style="width:10px;">:</td>
                                        <td class="text-uppercase" style="font-weight:bold;"><?= $mahasiswa['nama_ayah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nomor telp/Wa</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['telp_ayah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tahun Lahir</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['tahun_lahir_ayah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Pendidikan Terakhir</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['pendidikan_ayah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Pekerjaan</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['pekerjaan_ayah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Penghasilan</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['penghasilan_ayah']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>DATA IBU</b></center>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">Nama Ibu</td>
                                        <td style="width:10px;">:</td>
                                        <td class="text-uppercase" style="font-weight:bold;"><?= $mahasiswa['nama_ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nomor telp/Wa</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['telp_ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tahun Lahir</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['tahun_lahir_ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Pendidikan Terakhir</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['pendidikan_ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Pekerjaan</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['pekerjaan_ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Penghasilan</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['penghasilan_ibu']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-fuchsia card-outline">
                            <div class="card-header bg-danger">
                                <i class="card-title"></i>
                                <center><b>DATA WALI</b></center>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">Nama Wali</td>
                                        <td style="width:10px;">:</td>
                                        <td class="text-uppercase" style="font-weight:bold;"><?= $mahasiswa['nama_wali']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nomor telp/Wa</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['telp_wali']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tahun Lahir</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['tahun_lahir_wali']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Pendidikan Terakhir</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['pendidikan_wali']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Pekerjaan</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['pekerjaan_wali']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Penghasilan</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['penghasilan_wali']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-danger card-outline">

                            <div class="card-body p-0">
                                <table class="table table-striped table-sm">

                                    <tbody>
                                        <tr border="0">
                                            <td colspan="3" class="text-danger text-center bg-navy"><b>STATUS CALON PESERTA DIDIK BARU</b></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Informasi Cefada</td>
                                            <td>:</td>
                                            <td><?= $mahasiswa['sumber_info']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Status Pembayaran Registrasi Calon Siswa </td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if ($mahasiswa['status'] == '1') { ?>
                                                    <i class="icon fas fa-check text-success"></i> Dikonfirmasi (Berhasil Melakukan Pembayaran)
                                                <?php   } else if ($mahasiswa['status'] == '0') { ?>
                                                    <i class="far fa-thumbs-up text-navy"></i> <label for="">Menunggu Konfirmasi Pembayaran</label>
                                                <?php   } else if ($mahasiswa['status'] == '2') { ?>
                                                    <i class="fas fa-times text-danger"></i> Ditolak (Gagal Melakukan Pembayaran)
                                                <?php   } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <div class="btn-group btn-group-sm float-right">
                                                    <a class="btn btn-danger" href="<?= base_url('mahasiswa/mahasiswa_tolak/' . $mahasiswa['id_pmb']); ?>"><i class="fa fa-thumbs-down"> </i> Gagal Melakukan Pembayaran</a>
                                                    <a class="btn btn-success" href="<?= base_url('mahasiswa/mahasiswa_terima/' . $mahasiswa['id_pmb']); ?>"><i class="fa fa-thumbs-up"> </i> Konfirmasi Pembayaran</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer mb-2">
                <div class="btn-group btn-group-sm float-right">
                    <a class="btn btn-danger float-right" href="<?= base_url('mahasiswa'); ?>"><i class="fa fa-undo"> </i> Kembali</a>
                    <a class="btn bg-navy float-right" target="_blank" href="<?= base_url('mahasiswa/cetak/' . $mahasiswa['no_pendaftaran']); ?>"><i class="fa fa-print" target="_blank"> </i> Cetak</a>

                </div>
            </div>
        </div>

    </section>
</div>