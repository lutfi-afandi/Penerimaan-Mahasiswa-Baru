<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->

    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-clipboard"></i></span>
                        <div class="info-box-content">
                            <h4 class="m-0">Nomor Pendaftaran :<b class="text-danger"> <?= $mahasiswa['no_pendaftaran']; ?></b> </h4>
                            <code class="highlighter-rouge text-navy"> Silakan Melakukan Pembayaran Pendaftaran Terlebih Dahulu Sebesar <b class="text-danger">Rp. 100.000,-</b><br> ke <b class="text-navy">Nomor Rekening :</b>
                                <b class="text-navy">BANK MUAMALAT (3570000771) - An. Yayasan Cendikia Farma Husada</b><br>Konfirmasi Pembayaran bisa menghubungi admin dibawah ini:
                                <a class="btn bg-success btn-xs" href="https://api.whatsapp.com/send?phone=6289658195665&amp;text=Halo%20Ka%20Admin%20Saya%20%0AIngin%20Konfirmasi%0ABiaya Pendaftaran %20PMB%0AAkfar Cefada.%0ATerimakasih" target="_blank"><i class="fab fa-whatsapp"></i> 089658195665 (Admin PMB)</a>
                            </code>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
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
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <?php
                        // dd(empty($mahasiswa['bukti_bayar']));
                        // jika belum upload bukti bayar
                        if (empty($mahasiswa['bukti_bayar'])) { ?>
                            <div class="card-header bg-gradient-navy">
                                <center>Updoad bukti pembayaran</center>
                            </div>
                            <form action="<?= base_url('mahasiswa/data/update_bukti_bayar/' . $mahasiswa['id_pmb']); ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="custom-file">
                                        <input type="file" name="bukti_bayar" class="custom-file-input" id="preview_gambar" accept=".pdf, image/*">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>

                                    <div class="form-group">
                                        <label>Preview gambar</label> <br>
                                        <center><img src="<?= base_url('img/maba.jpg'); ?>" width="250px" class="img-responsive" id="gambar_load"></center>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Upload</button>

                                </div>
                            </form>
                        <?php   }
                        // jika sudal upload bukti pembayaran
                        else { ?>
                            <div class="card-header bg-gradient-navy">
                                <center>Updoad bukti pembayaran</center>
                            </div>
                            <form action="<?= base_url('mahasiswa/data/update_bukti_bayar/' . $mahasiswa['id_pmb']); ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="custom-file">
                                        <input type="file" name="bukti_bayar" class="custom-file-input" id="preview_gambar" accept=".pdf, image/*">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>

                                    <div class="form-group">
                                        <label>Preview gambar</label> <br>
                                        <center><img src="<?= base_url('uploads/bukti_bayar/' . $mahasiswa['bukti_bayar']); ?>" width="250px" class="img-responsive" id="gambar_load"></center>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <!-- kalau belum di verifikasi -->
                                            <?php if ($mahasiswa['status'] == 0) {
                                                echo '<button class="btn btn-info  btn-flat"><i class="fa fa-spinner"></i> Menunggu Verifikasi</button>';
                                            } elseif ($mahasiswa['status'] == 1) {
                                                echo '<button class="btn btn-success mb-2  btn-flat"><i class="fa fa-check-circle"></i> Pendaftar terverifikasi. Mohon lengkapi data pendaftaran</button>';
                                                echo ' <a href="' . base_url('mahasiswa/data/identitas') . '" class="badge badge-primary"> Lengkapi formulir identitas</a>';
                                            } else {
                                                echo  '<button class="btn btn-danger  btn-flat"><i class="fa fa-times"></i> Bukti Pembayaran Ditolak!</button>';
                                            } ?>
                                        </div>
                                        <div class="col-md-8">
                                            <?php if ($mahasiswa['status'] == 0) {
                                                echo '<button type="submit" class="btn btn-success btn-block btn-flat">Update Bukti Pembayaran Baru</button>';
                                            } elseif ($mahasiswa['status'] == 1) {
                                                echo '<button type="" class="btn btn-success btn-block btn-flat"><i class="fa fa-check"></i> Pembayaran dikonfirmasi</button>';
                                            } else {
                                                echo '<button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-warning"></i> Upload Bukti Pembayaran Baru</button>';
                                            } ?>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        <?php } ?>

                    </div>
                </div>

                <!-- kalau belum di verifikasi -->
                <?php if ($mahasiswa['status'] == 1) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-gradient-navy">
                                <center>Klik disini untuk masuk website ujian</center>
                            </div>
                            <div class="card-body">
                                <label for="" class="badge badge-primary">Akun CBT</label>
                                <dl class="row">
                                    <dt class="col-sm-6">Username : </dt>
                                    <dd class="col-sm-6 text-primary"><?= $mahasiswa['username_cbt']; ?></dd>
                                    <dt class="col-sm-6">Password : </dt>
                                    <dd class="col-sm-6 text-primary"><?= $mahasiswa['password_cbt']; ?></dd>

                                </dl>
                                <?php if ($pengumuman != '') { ?>
                                    <small class="text-success">*pengumuman</small>
                                    <p><?= $pengumuman; ?></p>
                                <?php    } ?>
                            </div>
                            <div class="card-footer">
                                <a href="http://tespmb.akfarcefada.ac.id/login.php" class="btn btn-block btn-flat btn-primary" target="_blank">Menuju CBT</a>
                            </div>
                        </div>
                    </div>
                <?php } else {
                } ?>
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