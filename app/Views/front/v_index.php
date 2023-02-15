<?php $db = Config\Database::connect();
$carousel = $db->table('pmb_carousel')->get()->getResultArray();
$banner = $db->table('pmb_banner')->get()->getResultArray();
$slideshow = $db->table('pmb_slideshow')->get()->getResultArray();
$pengaturan = $db->table('pmb_pengaturan')->get()->getRowArray();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $indikator = $db->table('pmb_carousel')->countAllResults();

                            for ($i = 0; $i < $indikator; $i++) { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="active"></li>
                            <?php   } ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            foreach ($carousel as $key => $car) { ?>
                                <div class="carousel-item <?= ($key == 0) ? 'active' : ''; ?>" data-interval="3500">
                                    <img src="<?= base_url('uploads/carousel/' . $car['file_gambar']); ?>" class="d-block w-100 mt-2" alt="...">
                                </div>
                            <?php   } ?>

                        </div>
                        <button class="carousel-control-prev" type="button" style="opacity: 0.01;" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" style="opacity: 0.01;" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
            </div>



            <div class="row mt-3">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header bg-navy">
                            <center><i class="fa fa-info-circle "></i> PETUNJUK PENDAFTARAN</center>
                        </div>
                        <div class="card-body mr-1 ml-1">
                            <div class="card card-maroon card-outline">
                                <div class="card-header">
                                    <h3 class="card-title"> <i class="fas fa-ballot-check"></i> Prosedur</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <img src="<?= base_url('uploads/pengaturan/' . $pengaturan['prosedur']); ?>" alt="" class="img-fluid">

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <?= $pengaturan['tentang']; ?>
                        </div>
                        <div class="card-footer bg-navy"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-navy">
                            <center>SLIDESHOW</center>
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

                                <button class="carousel-control-prev" type="button" style="opacity: 0.01;" data-target="#carouselExampleIndicators" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" style="opacity: 0.01;" data-target="#carouselExampleIndicators" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-footer bg-navy"></div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-navy">
                            <center>BANNER</center>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    foreach ($banner as $key => $car) { ?>
                                        <div class="carousel-item <?= ($key == 0) ? 'active' : ''; ?>">
                                            <a href="<?= base_url('uploads/banner/' . $car['file_gambar']); ?>" data-toggle="lightbox" data-title="BANNER" data-gallery="gallery">
                                                <img src="<?= base_url('uploads/banner/' . $car['file_gambar']); ?>" class="d-block w-100 mt-2" alt="..."></a>
                                        </div>
                                    <?php   } ?>

                                </div>
                                <button class="carousel-control-prev" type="button" style="opacity: 0.01;" data-target="#carouselExampleIndicators" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" style="opacity: 0.01;" data-target="#carouselExampleIndicators" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-footer bg-navy"></div>
                    </div>

                </div>



            </div>


        </div>
    </div>

</div>