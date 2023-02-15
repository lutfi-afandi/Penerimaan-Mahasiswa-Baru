<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="shortcut icon" href="<?php echo base_url('img/logo.png')  ?>" type="image/x-icon">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/ekko-lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<style>
    .content-wrapper {
        background-image: url("<?= base_url('img/bg.jpg'); ?>");

        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;

        background-size: cover;
    }
</style>

<body class="hold-transition layout-top-nav sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy  ">
            <div class="container">
                <a href="<?= base_url(); ?>" class="navbar-brand">
                    <img src="<?= base_url(); ?>/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
                    <b><span class="brand-text font-weight-bold">PMB AKFAR CEFADA</span></b>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('portal'); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('portal/pendaftaran'); ?>" class="nav-link">Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('portal/cetak_formulir'); ?>" class="nav-link">Cetak Formulir</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('portal/pengumuman'); ?>" class="nav-link">Pengumuman</a>
                        </li>

                    </ul>
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <?php if (session()->get('login_mhs') == TRUE) { ?>
                            <li class="nav-item dropdown show">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle">
                                    <i class="fas fa-user"></i> <?= session()->get('nama_siswa'); ?> </a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow hide" style="left: inherit; right: 0px;">
                                    <li><a href="<?= base_url('portal/data_mahasiswa/' . session()->get('nisn')); ?>" class="dropdown-item">Biodata</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a href="<?= base_url('portal/logout'); ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
                                </ul>
                            </li>
                        <?php  } else { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('mahasiswa/auth'); ?>">
                                    <i class="fas fa-user "></i> Login
                                </a>
                            </li>
                        <?php } ?>

                    </ul>


                </div>

            </div>
        </nav>
        <!-- /.navbar -->