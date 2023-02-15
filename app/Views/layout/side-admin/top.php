<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="<?php echo base_url('img/logo.png')  ?>" type="image/x-icon">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Font Awesome Pro -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/style.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/skins/_all-skins.min.css">

    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/img/logo.png">


    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/package/dist/sweetalert2.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
        body {

            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header  navbar navbar-expand bg-gradient-danger navbar-dark p-1 border-bottom-0">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <label class="badge badge-warning"></label>
                </li>
                <?php if (session()->get('nama_user') == true) { ?>
                    <li class="nav-item">
                    <li class="nav-link"><?= session()->get('nama_user'); ?> </li>
                    </li>
                <?php } ?>

                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/panel/logout'); ?>" title="Logout">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <?php
        $Dd = date("D");
        $bln = date("M");
        if ($Dd == "Sun") {
            $hari = "Minggu, ";
        } else if ($Dd == "Mon") {
            $hari = "Senin, ";
        } else if ($Dd == "Tue") {
            $hari = "Selasa, ";
        } else if ($Dd == "Wed") {
            $hari = "Rabu, ";
        } else if ($Dd == "Thu") {
            $hari = "Kamis, ";
        } else if ($Dd == "Fri") {
            $hari = "Jum'at, ";
        } else if ($Dd == "Sat") {
            $hari = "Sabtu, ";
        } else {
            $hari = $Dd;
        }

        if ($bln == 'Jan') {
            $bln = "Januari ";
        } elseif ($bln == 'Feb') {
            $bln = "Februari ";
        } elseif ($bln == 'Mar') {
            $bln = "Maret ";
        } elseif ($bln == 'Apr') {
            $bln = "April";
        } elseif ($bln == 'May') {
            $bln = "Mei ";
        } elseif ($bln == 'Jun') {
            $bln = "Juni ";
        } elseif ($bln == 'Jul') {
            $bln = "Juli ";
        } elseif ($bln == 'Aug') {
            $bln = "Agustus ";
        } elseif ($bln == 'Sep') {
            $bln = "September ";
        } elseif ($bln == 'Oct') {
            $bln = "Oktober ";
        } elseif ($bln == 'Nov') {
            $bln = "November";
        } elseif ($bln == 'Dec') {
            $bln = "Desember ";
        } else {
            $bln = $bln;
        }
        ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <a href="#" class="brand-link text-center">
                <span class="brand-text font-weight-bold" style="font-family: 'arial', cursive;"><strong>PMB</strong></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-2 pb-2  d-flex">
                    <div class="image">
                        <?= '<img src="' . base_url() . '/img/ikhwan.jpg" class="img-circle " alt="User Image">'  ?>

                    </div>
                    <div class="I mt-1 ml-2">
                        <a href="#" class="d-block">Admin</a>
                    </div>

                </div>
                <center>
                    <span class="right btn badge badge-danger btn-flat animated fadeInDown"><?php echo $hari . "&nbsp;";
                                                                                            echo date('d') . "&nbsp;&nbsp;";
                                                                                            echo $bln . "&nbsp;";
                                                                                            echo date('Y'); ?></span>
                </center>


                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?php echo base_url(); ?>/admin/home" class="nav-link active bg-danger">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    DASHBOARD
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-navy">DATA MANAJEMEN</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-user text-primary"></i>
                                <p>
                                    Data Pendaftar
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/mahasiswa/list'); ?>" class="nav-link text-info">
                                        <i class="far fa-download nav-icon"></i>
                                        <p>Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/mahasiswa/list/diterima'); ?>" class="nav-link text-success">
                                        <i class="far fa-check nav-icon"></i>
                                        <p>Diterima</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/mahasiswa/list/ditolak'); ?>" class="nav-link text-danger">
                                        <i class="far fa-times nav-icon "></i>
                                        <p>Ditolak</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url(); ?>/admin/kelulusan" class="nav-link">
                                <i class="nav-icon fas fa-user-shield  text-danger"></i>
                                <p>
                                    PENGUMUMAN
                                </p>
                            </a>
                        </li>
                        <!-- SETTING -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-user text-warning"></i>
                                <p>
                                    PENGATURAN
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/admin/slideshow" class="nav-link">
                                        <i class="far fa-images nav-icon"></i>
                                        <p>Slideshow</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/admin/banner" class="nav-link">
                                        <i class="far fa-image-polaroid nav-icon"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/admin/pengaturan" class="nav-link">
                                        <i class="far fa-cogs nav-icon"></i>
                                        <p>Setting Beranda</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?php echo base_url(); ?>/admin/tahunakademik" class="nav-link">
                                        <i class="nav-icon fas fa-sliders-h text-navy"></i>
                                        <p>
                                            Tahun Akademik
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url(); ?>/admin/user" class="nav-link">
                                <i class="nav-icon fas fa-user-cog text-navy"></i>
                                <p>
                                    USER
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url(); ?>/admin/panel/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt text-navy"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>



                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>