<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-clipboard"></i></span>
                        <div class="info-box-content">
                            <h1 class="m-0">Lengkapi Berkas pendaftaran</h1>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
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

                <div class="col-md-4   ">
                    <div class="card">
                        <div class="card-header bg-gradient-navy">
                            <center>UPLOAD FOTO</center>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('mahasiswa/data/save_foto/' . $mahasiswa['id_pmb']) ?>" method="post" enctype="multipart/form-data" accept="image/*">
                                <div class="form-group">
                                    <label for="inputEmail3" class="">Foto</label>
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile" required accept="application/pdf, image/*">
                                            <label class="custom-file-label" for="customFile">Pilih file Foto</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $namaFoto = $mahasiswa['foto'];
                                    $surat_kesehatan = $mahasiswa['surat_kesehatan'];
                                    $nilai_raport = $mahasiswa['nilai_raport'];
                                    $extensi = substr($namaFoto, -3, 3);
                                    $extensiSurat = substr($surat_kesehatan, -3, 3);
                                    $extensiRaport = substr($nilai_raport, -3, 3);
                                    if ($extensi == 'pdf') { ?>
                                        <iframe src="<?= base_url('uploads/foto/' . $mahasiswa['foto']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                    <?php } else { ?>
                                        <img src="<?= base_url('uploads/foto/' . $mahasiswa['foto']); ?>" class="img img-thumbnail">
                                    <?php } ?>
                                </div>
                        </div>
                        <div class="card-footer">
                            <?php if (!empty($mahasiswa['foto'])) {
                                echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Identitas Diri</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit berkas</button>';
                            } ?>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4   ">
                    <div class="card">
                        <div class="card-header bg-gradient-navy">
                            <center>UPLOAD SURAT KETERANGAN SEHAT</center>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('mahasiswa/data/save_kesehatan/' . $mahasiswa['id_pmb']) ?>" method="post" enctype="multipart/form-data" accept="image/*">
                                <div class="form-group  ">
                                    <label for="inputEmail3" class="">Surat Keterangan Sehat</label>
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input type="file" name="surat_kesehatan" class="custom-file-input" id="customFile" required accept="application/pdf, image/*">
                                            <label class="custom-file-label" for="customFile">Pilih file surat_kesehatan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if ($extensiSurat == 'pdf') { ?>
                                        <iframe src="<?= base_url('uploads/surat_kesehatan/' . $mahasiswa['surat_kesehatan']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                    <?php } else { ?>
                                        <img src="<?= base_url('uploads/surat_kesehatan/' . $mahasiswa['surat_kesehatan']); ?>" class="img img-thumbnail">
                                    <?php } ?>
                                </div>
                        </div>
                        <div class="card-footer">
                            <?php if (!empty($mahasiswa['surat_kesehatan'])) {
                                echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Identitas Diri</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit berkas</button>';
                            } ?>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4   ">
                    <div class="card">
                        <div class="card-header bg-gradient-navy">
                            <center>UPLOAD NILAI RAPORT</center>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('mahasiswa/data/save_raport/' . $mahasiswa['id_pmb']) ?>" method="post" enctype="multipart/form-data" accept="image/*">
                                <div class="form-group ">
                                    <label for="inputEmail3" class="">Surat Keterangan Sehat</label>
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input type="file" name="nilai_raport" class="custom-file-input" id="customFile" required accept="application/pdf, image/*">
                                            <label class="custom-file-label" for="customFile">Pilih file Nilai Raport</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if ($extensiRaport == 'pdf') { ?>
                                        <iframe src="<?= base_url('uploads/nilai_raport/' . $mahasiswa['nilai_raport']); ?>" width="100%" height="500px" frameborder="0"></iframe>
                                    <?php } else { ?>
                                        <img src="<?= base_url('uploads/nilai_raport/' . $mahasiswa['nilai_raport']); ?>" class="img img-thumbnail">
                                    <?php } ?>
                                </div>
                        </div>
                        <div class="card-footer">
                            <?php if (!empty($mahasiswa['nilai_raport'])) {
                                echo '<button type="submit" class="btn btn-block btn-flat btn-primary">Ubah Identitas Diri</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-block btn-flat btn-success">Submit berkas</button>';
                            } ?>
                        </div>
                        </form>
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