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
                <div class="col-md-12 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-user-lock"></i></span>
                        <div class="info-box-content">
                            <h1 class="m-0">Login Calon Mahasiswa Baru</h1>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <div class="col-sm-7">

                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0"><b>Silahkan Login untuk melengkapi data Pendaftaran</b></h5>
                            </div>
                            <div class="card-body">
                                <!-- Flash data -->
                                <?php if (session()->getFlashdata('success')) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <h4 class="alert-heading">Data berhasil direkam!</h4>
                                        <p>Anda harus Login dan melengkapi data Pendaftaran..</p>
                                        <hr>
                                        <p class="mb-0"><i class="fa fa-info-circle"></i> &nbsp; gunakan nomor telepon sebagai password untuk login</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php }
                                if (!session()->getFlashdata('success')) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                                        <p class="mb-0"><i class="fa fa-info-circle"></i> &nbsp; gunakan nomor telepon sebagai password untuk login</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                                <?php if (session()->getFlashdata('error')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                        <p class="mb-0"><i class="fa fa-times-circle"></i> &nbsp; <?= session()->getFlashdata('error'); ?></p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>

                                <!-- end flash data -->
                                <form action="<?= base_url('mahasiswa/auth/cek_login'); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nomor HP</label> <text class="text-danger">*</text>
                                                <input type="text" class="form-control" placeholder="nomor telepon" name="no_hp" required="" autocomplete="off" value="<?= old('no_hp'); ?>" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Password</label> <text class="text-danger">*</text>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <button type="submit" class="btn btn-info btn-flat  btn-block"><i class="fas fa-sign-in"></i> LOGIN</button>
                                        </div>

                                </form>
                                <div class="col-md-6 ">
                                    <a href="<?= base_url('portal/pendaftaran'); ?>" class="btn btn-success btn-flat btn-block "><i class="fas fa-file-alt"></i> MENDAFTAR</a>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <small class="text-success">
                                        <i>
                                            <p>*nomor telepon akan menjadi username dan password untuk melengkapi data pendaftaran</p>
                                        </i>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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