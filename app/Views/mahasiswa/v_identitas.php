<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->

    <div class="content-header pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-file-user"></i></span>
                        <div class="info-box-content">
                            <h3 class=""> FORMULIR PENERIMAAN MAHASISWA BARU</h3>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?= (empty($mahasiswa['nik'])) ? '<li> <i class="fas fa-info-circle"></i> Lengkapi data identitis diri terlebih dahulu</li>' : '<li><i class="fas fa-check text-success"></i> <label class="badge badge-info">data identitas telah diisi</label></li>'; ?>
                                <?= (empty($mahasiswa['nama_ayah'])) ? '<li> <i class="fas fa-info-circle"></i> Lengkapi data orang tua terlebih dahulu</li>' : '<li><i class="fas fa-check text-success"></i> <label class="badge badge-info">data orangtua telah diisi</label></li>'; ?>
                                <?= (empty($mahasiswa['nama_wali'])) ? '<li> <i class="fas fa-info-circle"></i> Lengkapi data orangtua wali (opsional)</li>' : '<li><i class="fas fa-check text-success"></i> <label class="badge badge-info">data orangtua telah diisi</label></li>'; ?>
                                <?= (empty($mahasiswa['tahun_lulus'])) ? '<li> <i class="fas fa-info-circle"></i> Lengkapi data asal sekolah terlebih dahulu</li>' : '<li><i class="fas fa-check text-success"></i> <label class="badge badge-info">data asal sekolah telah diisi</label></li>'; ?>
                                <?php if (empty($mahasiswa['foto']) || empty($mahasiswa['nilai_raport'])) {
                                    echo '<li> <i class="fas fa-info-circle"></i> Lengkapi data berkas Foto, Nilai raport terlebih dahulu</li>';
                                } else {
                                    '<li><i class="fas fa-check text-success"></i> <label class="badge badge-info">berkas Foto, Nilai raport telah di unggah</label></li>';
                                } ?>
                            </div>
                            <div class="card-footer">
                                <?php if (!empty($mahasiswa['nik']) && !empty($mahasiswa['nama_ayah']) && !empty($mahasiswa['tahun_lulus'])) { ?>
                                    <a href="#"><button class="btn btn-success"><i class="fa fa-print"></i> Cetak Formulir</button></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php foreach (session()->getFlashdata('errors') as $key => $value) { ?>
                                    <li><?= esc($value) ?>
                                    </li>
                                <?php } ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">IDENTITAS DIRI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">ORANG TUA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">DATA WALI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="true">ASAL</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <!-- IDENTITAS DIRI -->
                                    <div class="tab-pane fade  active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                        <form action="<?= base_url('mahasiswa/data/save_identitas/' . $mahasiswa['id_pmb']); ?>" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIK <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nomor Induk Penduduk" name="nik" required="" autocomplete="off" value="<?= $mahasiswa['nik']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor HP / WA <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" readonly="" autocomplete="off" value="<?= $mahasiswa['no_hp']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">E-mail Pribadi <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" placeholder="E-mail Pribadi" name="email" required="" autocomplete="off" value="<?= $mahasiswa['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_siswa" required="" autocomplete="off" value="<?= $mahasiswa['nama_siswa']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jalur Pendaftaran <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select name="jalur_pendaftaran" class="form-control" id="">
                                                        <option value="Reguler" <?= ($mahasiswa['jalur_pendaftaran'] == 'Reguler') ? 'selected' : ''; ?>>Reguler</option>
                                                        <option value="Khusus" <?= ($mahasiswa['jalur_pendaftaran'] == 'Khusus') ? 'selected' : ''; ?>>Khusus</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Jenis Kelamin" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="jenis_kelamin" required="">
                                                        <option value="Laki-Laki" <?= ($mahasiswa['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                        <option value="Perempuan" <?= ($mahasiswa['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tempat Lahir <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" autocomplete="off" value="<?= $mahasiswa['tempat_lahir']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanggal Lahir <text class="text-danger">*</text></label>
                                                <div class="input-group col-sm-9">
                                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required="" autocomplete="off" value="<?= $mahasiswa['tanggal_lahir']; ?>">
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
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Status Nikah" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="status_nikah" required="">
                                                        <option <?= ($mahasiswa['status_nikah'] == 'Belum Menikah') ? 'selected' : ''; ?>>Belum Menikah</option>
                                                        <option <?= ($mahasiswa['status_nikah'] == 'Sudah Menikah') ? 'selected' : ''; ?>>Sudah Menikah</option>
                                                        <option <?= ($mahasiswa['status_nikah'] == 'Sudah Pernah Menikah') ? 'selected' : ''; ?>>Sudah Pernah Menikah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat Jalan <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" class="form-control" placeholder="alamat" name="alamat" required=""><?= $mahasiswa['alamat']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RT </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" placeholder="RT" name="rt" autocomplete="off" value="<?= $mahasiswa['rt']; ?>">
                                                </div>
                                                <label class="col-sm-1 col-form-label">RW </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" placeholder="RW" name="rw" autocomplete="off" value="<?= $mahasiswa['rw']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Dusun </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Dusun" name="dusun" autocomplete="off" value="<?= $mahasiswa['dusun']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Kelurahan / Desa </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Kelurahan / Desa" name="kelurahan" autocomplete="off" value="<?= $mahasiswa['kelurahan']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kabupaten </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten" autocomplete="off" value="<?= $mahasiswa['kabupaten']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode POS </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" placeholder="Kode POS" name="kode_pos" autocomplete="off" value="<?= $mahasiswa['kode_pos']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Tinggal <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Tempat Tinggal" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="tempat_tinggal" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['tempat_tinggal'] == 'Asrama') ? 'selected' : ''; ?>>Asrama</option>
                                                        <option <?= ($mahasiswa['tempat_tinggal'] == 'Rumah Sendiri') ? 'selected' : ''; ?>>Rumah Sendiri</option>
                                                        <option <?= ($mahasiswa['tempat_tinggal'] == 'Kos') ? 'selected' : ''; ?>>Kos</option>
                                                        <option <?= ($mahasiswa['tempat_tinggal'] == 'Panti Asuhan') ? 'selected' : ''; ?>>Panti Asuhan</option>
                                                        <option <?= ($mahasiswa['tempat_tinggal'] == 'Wali') ? 'selected' : ''; ?>>Wali</option>
                                                        <option <?= ($mahasiswa['tempat_tinggal'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Transportasi <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select id="Transportasi" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="transportasi" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['transportasi'] == 'Jalan Kaki') ? 'selected' : ''; ?>>Jalan Kaki</option>
                                                        <option <?= ($mahasiswa['transportasi'] == 'Abodemen') ? 'selected' : ''; ?>>Abodemen</option>
                                                        <option <?= ($mahasiswa['transportasi'] == 'Kendaraan Pribadi') ? 'selected' : ''; ?>>Kendaraan Pribadi</option>
                                                        <option <?= ($mahasiswa['transportasi'] == 'Kendaraan Umum') ? 'selected' : ''; ?>>Kendaraan Umum</option>
                                                        <option <?= ($mahasiswa['transportasi'] == 'Gojek/Grab/Maxim') ? 'selected' : ''; ?>>Gojek/Grab/Maxim</option>
                                                        <option <?= ($mahasiswa['transportasi'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                                    </select>
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
                                                <label class="col-sm-5 col-form-label">Tinggi Badan (Cm) <text class="text-danger">*</text></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Tinggi Badan (Cm)" name="tinggi_badan" required="" autocomplete="off" value="<?= $mahasiswa['tinggi_badan']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Berat Badan (Kg) <text class="text-danger">*</text></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Berat Badan (Kg)" name="berat_badan" required="" autocomplete="off" value="<?= $mahasiswa['berat_badan']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Jarak Tempat Tinggal ke Kampus (Km) <text class="text-danger">*</text></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Jarak Tempat Tinggal ke Kampus (Km)" name="jarak_ke_sekolah" required="" autocomplete="off" value="<?= $mahasiswa['jarak_ke_sekolah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Waktu Tempuh ke Kampus (Menit) <text class="text-danger">*</text></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Waktu Tempuh ke Sekolah (Menit)" name="waktu_tempuh_ke_sekolah" required="" autocomplete="off" value="<?= $mahasiswa['waktu_tempuh_ke_sekolah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Jumlah Saudara Kandung
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" "="" placeholder=" Jumlah Saudara Kandung" name="jumlah_saudara" required="" autocomplete="off" value="<?= $mahasiswa['jumlah_saudara']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <?php if (!empty($mahasiswa['nik'])) {
                                                    echo '<input type="hidden" name="jenis" value="ubah">';
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Identitas Diri</button>';
                                                } else {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit Identitas Diri</button>';
                                                } ?>

                                            </div>

                                        </form>
                                    </div>

                                    <!-- ORANG TUA -->
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                        <!-- DATA AYAH KANDUNG -->
                                        <b>
                                            <center>DATA AYAH KANDUNG</center>
                                        </b>
                                        <div class="card-navy card-outline mb-2"></div>
                                        <form action="<?= base_url('mahasiswa/data/save_orangtua/' . $mahasiswa['id_pmb']); ?>" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Ayah Kandung
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Ayah Kandung" name="nama_ayah" required="" autocomplete="off" value="<?= $mahasiswa['nama_ayah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="telp_ayah" required="" autocomplete="off" value="<?= $mahasiswa['telp_ayah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tahun Lahir
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Tahun Lahir" name="tahun_lahir_ayah" required="" autocomplete="off" value="<?= $mahasiswa['tahun_lahir_ayah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pendidikan_ayah" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'D1') ? 'selected' : ''; ?>>D1</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'D4/SI') ? 'selected' : ''; ?>>D4/S1</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'SD Sederajat') ? 'selected' : ''; ?>>SD Sederajat</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'SMP Sederajat') ? 'selected' : ''; ?>>SMP Sederajat</option>
                                                        <option <?= ($mahasiswa['pendidikan_ayah'] == 'SMA Sederajat') ? 'selected' : ''; ?>>SMA Sederajat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pekerjaan_ayah" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Buruh') ? 'selected' : ''; ?>>Buruh</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Karyawan Swasta') ? 'selected' : ''; ?>>Karyawan Swasta</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Pedagang Besar') ? 'selected' : ''; ?>>Pedagang Besar</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Pedagan Kecil') ? 'selected' : ''; ?>>Pedagan Kecil</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Peternak') ? 'selected' : ''; ?>>Peternak</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'PNS/POLRI/TNI') ? 'selected' : ''; ?>>PNS/POLRI/TNI</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ayah'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="penghasilan_ayah" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['penghasilan_ayah'] == '1 Juta - 1.999.999 Juta') ? 'selected' : ''; ?>>1 Juta - 1.999.999 Juta</option>
                                                        <option <?= ($mahasiswa['penghasilan_ayah'] == '2 Juta - 4.999.999') ? 'selected' : ''; ?>>2 Juta - 4.999.999</option>
                                                        <option <?= ($mahasiswa['penghasilan_ayah'] == '5 Juta - 20 Juta') ? 'selected' : ''; ?>>5 Juta - 20 Juta</option>
                                                        <option <?= ($mahasiswa['penghasilan_ayah'] == '500.000 Ribu - 999.999') ? 'selected' : ''; ?>>500.000 Ribu - 999.999</option>
                                                        <option <?= ($mahasiswa['penghasilan_ayah'] == 'Kurang Dari 500.000') ? 'selected' : ''; ?>>Kurang Dari 500.000</option>
                                                        <option <?= ($mahasiswa['penghasilan_ayah'] == 'Lebih Dari 10 Juta') ? 'selected' : ''; ?>>Lebih Dari 10 Juta</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- DATA IBU KANDUNG -->
                                            <b>
                                                <center>DATA IBU KANDUNG</center>
                                            </b>
                                            <div class="card-navy card-outline mb-2"></div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Ibu Kandung
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Ibu Kandung" name="nama_ibu" required="" autocomplete="off" value="<?= $mahasiswa['nama_ibu']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="telp_ibu" required="" autocomplete="off" value="<?= $mahasiswa['telp_ibu']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tahun Lahir
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Tahun Lahir" name="tahun_lahir_ibu" required="" autocomplete="off" value="<?= $mahasiswa['tahun_lahir_ibu']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pendidikan_ibu" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'D1') ? 'selected' : ''; ?>>D1</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'D4/SI') ? 'selected' : ''; ?>>D4/S1</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'SD Sederajat') ? 'selected' : ''; ?>>SD Sederajat</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'SMP Sederajat') ? 'selected' : ''; ?>>SMP Sederajat</option>
                                                        <option <?= ($mahasiswa['pendidikan_ibu'] == 'SMA Sederajat') ? 'selected' : ''; ?>>SMA Sederajat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pekerjaan_ibu" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Buruh') ? 'selected' : ''; ?>>Buruh</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Karyawan Swasta') ? 'selected' : ''; ?>>Karyawan Swasta</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Pedagang Besar') ? 'selected' : ''; ?>>Pedagang Besar</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Pedagan Kecil') ? 'selected' : ''; ?>>Pedagan Kecil</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Peternak') ? 'selected' : ''; ?>>Peternak</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'PNS/POLRI/TNI') ? 'selected' : ''; ?>>PNS/POLRI/TNI</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                                        <option <?= ($mahasiswa['pekerjaan_ibu'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan <text class="text-danger">*</text>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="penghasilan_ibu" required="">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['penghasilan_ibu'] == '1 Juta - 1.999.999 Juta') ? 'selected' : ''; ?>>1 Juta - 1.999.999 Juta</option>
                                                        <option <?= ($mahasiswa['penghasilan_ibu'] == '2 Juta - 4.999.999') ? 'selected' : ''; ?>>2 Juta - 4.999.999</option>
                                                        <option <?= ($mahasiswa['penghasilan_ibu'] == '5 Juta - 20 Juta') ? 'selected' : ''; ?>>5 Juta - 20 Juta</option>
                                                        <option <?= ($mahasiswa['penghasilan_ibu'] == '500.000 Ribu - 999.999') ? 'selected' : ''; ?>>500.000 Ribu - 999.999</option>
                                                        <option <?= ($mahasiswa['penghasilan_ibu'] == 'Kurang Dari 500.000') ? 'selected' : ''; ?>>Kurang Dari 500.000</option>
                                                        <option <?= ($mahasiswa['penghasilan_ibu'] == 'Lebih Dari 10 Juta') ? 'selected' : ''; ?>>Lebih Dari 10 Juta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="orm-group row">
                                                <?php if (!empty($mahasiswa['nama_ayah'])) {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Data Orang Tua</button>';
                                                } else {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit Data Orang Tua</button>';
                                                } ?>

                                            </div>
                                        </form>
                                    </div>

                                    <!-- DATA WALI -->
                                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                        <form action="<?= base_url('mahasiswa/data/save_wali/' . $mahasiswa['id_pmb']); ?>" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Wali</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder=" Nama Wali " name="nama_wali" autocomplete="off" value="<?= $mahasiswa['nama_wali']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="telp_wali" required="" autocomplete="off" value="<?= $mahasiswa['telp_wali']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tahun Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder=" Tahun Lahir" name="tahun_lahir_wali" autocomplete="off" value="<?= $mahasiswa['tahun_lahir_wali']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pendidikan_wali">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'D1') ? 'selected' : ''; ?>>D1</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'D4/SI') ? 'selected' : ''; ?>>D4/S1</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'SD Sederajat') ? 'selected' : ''; ?>>SD Sederajat</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'SMP Sederajat') ? 'selected' : ''; ?>>SMP Sederajat</option>
                                                        <option <?= ($mahasiswa['pendidikan_wali'] == 'SMA Sederajat') ? 'selected' : ''; ?>>SMA Sederajat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pekerjaan_wali">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Buruh') ? 'selected' : ''; ?>>Buruh</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Karyawan Swasta') ? 'selected' : ''; ?>>Karyawan Swasta</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Pedagang Besar') ? 'selected' : ''; ?>>Pedagang Besar</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Pedagan Kecil') ? 'selected' : ''; ?>>Pedagan Kecil</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Peternak') ? 'selected' : ''; ?>>Peternak</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'PNS/POLRI/TNI') ? 'selected' : ''; ?>>PNS/POLRI/TNI</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                                        <option <?= ($mahasiswa['pekerjaan_wali'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan
                                                </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="penghasilan_wali">
                                                        <option value=""></option>
                                                        <option <?= ($mahasiswa['penghasilan_wali'] == '1 Juta - 1.999.999 Juta') ? 'selected' : ''; ?>>1 Juta - 1.999.999 Juta</option>
                                                        <option <?= ($mahasiswa['penghasilan_wali'] == '2 Juta - 4.999.999') ? 'selected' : ''; ?>>2 Juta - 4.999.999</option>
                                                        <option <?= ($mahasiswa['penghasilan_wali'] == '5 Juta - 20 Juta') ? 'selected' : ''; ?>>5 Juta - 20 Juta</option>
                                                        <option <?= ($mahasiswa['penghasilan_wali'] == '500.000 Ribu - 999.999') ? 'selected' : ''; ?>>500.000 Ribu - 999.999</option>
                                                        <option <?= ($mahasiswa['penghasilan_wali'] == 'Kurang Dari 500.000') ? 'selected' : ''; ?>>Kurang Dari 500.000</option>
                                                        <option <?= ($mahasiswa['penghasilan_wali'] == 'Lebih Dari 10 Juta') ? 'selected' : ''; ?>>Lebih Dari 10 Juta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="orm-group row">
                                                <?php if (!empty($mahasiswa['nama_wali'])) {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Data Wali</button>';
                                                } else {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit Data Wali</button>';
                                                } ?>

                                            </div>
                                        </form>

                                    </div>

                                    <!-- ASAL SEKOLAH -->
                                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                        <div class="card-navy card-outline mb-2"></div>
                                        <form action="<?= base_url('mahasiswa/data/save_asal/' . $mahasiswa['id_pmb']); ?>" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Asal Sekolah <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" required="" autocomplete="off" value="<?= $mahasiswa['asal_sekolah']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tahun Lulus<text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="2010" name="tahun_lulus" required="" autocomplete="off" value="<?= $mahasiswa['tahun_lulus']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sumber Informasi Akfar Cefada<text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Sumber informasi Akfar Cefada" name="sumber_info" required autocomplete="off" value="<?= $mahasiswa['sumber_info']; ?>">
                                                </div>
                                            </div>

                                            <!-- Pernyataan  -->
                                            <b>
                                                <center>PERNYATAAN DAN KEAMANAN</center>
                                            </b>
                                            <div class="card-navy card-outline mb-2"></div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Pernyataan
                                                    <text class="text-danger">*</text></label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" required="" autocomplete="off" value="<?= $mahasiswa['email']; ?>">
                                                        <label class="form-check-label">Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila ternyata data tersebut tidak benar / palsu, maka saya bersedia menerima sanksi berupa Pembatalan sebagai Calon Mahasiswa Baru <b class="text-danger"></b></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="orm-group row">
                                                <?php if (!empty($mahasiswa['tahun_lulus'])) {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Data Asal Sekolah</button>';
                                                } else {
                                                    echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit Data Asal Sekolah</button>';
                                                } ?>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        $('#preview_gambar').change(function() {
            bacaGambar(this);
        });
    </script>