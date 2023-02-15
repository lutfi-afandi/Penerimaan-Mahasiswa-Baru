<?php $db = Config\Database::connect();
$carousel = $db->table('pmb_carousel')->get()->getResultArray();
$banner = $db->table('pmb_banner')->get()->getResultArray();
$slideshow = $db->table('pmb_slideshow')->get()->getResultArray();
$pengaturan = $db->table('pmb_pengaturan')->get()->getRowArray();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="col-md-12 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-address-card"></i></span>
                            <div class="info-box-content">
                                <h1 class="m-0 text-uppercase">Pendaftaran Mahasiswa Baru Tahun Ajaran 2022/2023</h1>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-7">
                    <form action="<?= base_url('portal/daftar'); ?>" method="post" accept-charset="utf-8">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h5 class="card-title m-0"><b>Silahkan ini Formulir</b></h5>

                                </div>
                                <div class="card-body">
                                    <b>
                                        <center>REGISTRASI AKUN MAHASISWA BARU</center>
                                    </b>

                                    <div class="card-danger card-outline mb-2"></div>
                                    <?php if (session()->getFlashdata('error')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Pendaftaran GAGAL!</strong> <?= session()->getFlashdata('error'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } ?>

                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nomor HP/WA</label> <sub class="text-danger">* tidak boleh dengan +628xx</sub>
                                                <input type="number" class="form-control" name="no_hp" required="" autocomplete="off" placeholder="contoh : 08123456" value="<?= old('no_hp'); ?>">
                                                <p class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jalur Pendaftaran <text class="text-danger">*</text>
                                                </label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="jalur_pendaftaran" required="">
                                                    <option value="">--Pilih Jalur Pendaftaran--</option>
                                                    <option <?= (old('jalur_pendaftaran') == 'Khusus') ? 'selected' : ''; ?>>Khusus</option>
                                                    <option <?= (old('jalur_pendaftaran') == 'Reguler') ? 'selected' : ''; ?>>Reguler</option>
                                                </select>
                                                <p class="text-danger"></p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label> <text class="text-danger">*</text>
                                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_siswa" required="" autocomplete="off" value="<?= old('nama_siswa'); ?>">
                                                <p class="text-danger"></p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label> <text class="text-danger">*</text>
                                                <select id="Jenis Kelamin" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="jenis_kelamin" required="">
                                                    <option value="">--Pilih Jenis Kelamin--</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <p class="text-danger"></p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label> <text class="text-danger">*</text>
                                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" autocomplete="off" value="<?= old('tempat_lahir'); ?>">
                                                <p class="text-danger"></p>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label> <text class="text-danger">*</text>
                                                <input type="date" class="form-control " placeholder="Tanggal Lahir" name="tanggal_lahir" required="" autocomplete="off" value="<?= old('tanggal_lahir'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Asal Sekolah</label> <text class="text-danger">*</text>
                                                <input type="text" class="form-control " placeholder="Asal sekolah" name="asal_sekolah" required="" autocomplete="off" value="<?= old('asal_sekolah'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-12">
                                            <button type="submit" class="btn bg-navy btn-flat btn-block"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <small class="text-navy">
                                                <i>
                                                    <p><b>*nomor telepon akan menjadi username dan password untuk melengkapi data pendaftaran</b></p>
                                                </i>
                                            </small>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-navy">
                            <center>INFORMASI</center>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    foreach ($slideshow as $key => $sli) { ?>
                                        <div class="carousel-item <?= ($key == 0) ? 'active' : ''; ?>">
                                            <a href="<?= base_url('uploads/slideshow/' . $sli['file_gambar']); ?>" data-toggle="lightbox" data-title="INFORMASI" data-gallery="gallery">
                                                <img src="<?= base_url('uploads/slideshow/' . $sli['file_gambar']); ?>" class="d-block w-100 mt-2" alt="..."></a>
                                        </div>
                                    <?php   } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-navy"></div>
                    </div>

                </div>


                <!-- /.col-md-6 -->
            </div>
        </div>
    </div>
</div>