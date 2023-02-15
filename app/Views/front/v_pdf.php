<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/ekko-lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<style>
    .ttd p {
        font-size: 18px;
    }

    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }


    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    h1 {
        margin: 0;
        font-size: 24px;
        text-align: center;
        line-height: 35px;
    }

    p {
        font-weight: 400;
        margin: 0;
        font-size: 14px;
        text-align: center;
    }
</style>

<body onload="window.print()">
    <hr>
    <div class="row mb-3">
        <div class="col-md-12">


            <center><img align="center" class="img " style="width: 100px;" src="<?php echo base_url('img/logo1.png') ?>">
                <h1 class="font-weight-bolder">AKADEMI FARMASI CENDIKIA FARMA HUSADA</h1>
                <h5 class="">PENERIMAAN MAHASISWA BARU</h5>
                <h5 class="">TAHUN AKADEMIK <?= $ta; ?></h5>
            </center>
        </div>

    </div>
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="container-fluid">
                <div class="row">
                    <!-- DATA KELAS -->
                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px black;">
                                    <center><i class="fas fa-ballot"></i> DATA CALON MAHASISWA BARU</center>
                                </h3>
                            </div>
                            <table class="table table-striped table-sm">
                                <tr>
                                    <td style="width:200px;font-weight:bold;">No Pendaftaran</td>
                                    <td style="width:10px;">:</td>
                                    <td class="text-uppercase" style="font-weight:bold;"><?php echo $mahasiswa['no_pendaftaran']; ?></td>
                                    <td><b>
                                            <center><b>FOTO MAHASISWA</b></center>
                                        </b></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">NISN</td>
                                    <td>:</td>
                                    <td><?php echo $mahasiswa['nisn']; ?></td>

                                    <td style="width:200px;" rowspan="7"><img align="center" class="profile-user-img  elevation-2" style="width:200px;height:250px;margin:0 auto;" src="<?php echo base_url('uploads/foto/' . $mahasiswa['foto']); ?>"></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Jalur Pendaftaran</td>
                                    <td>:</td>
                                    <td><?php echo $mahasiswa['jalur_pendaftaran']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Nama Mahasiswa</td>
                                    <td>:</td>
                                    <td><?php echo $mahasiswa['nama_siswa']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?php echo $mahasiswa['jenis_kelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Tempat , Tanggal Lahir
                                    <td>:</td>
                                    <td><?php echo $mahasiswa['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($mahasiswa['tanggal_lahir'])); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Agama</td>
                                    <td>:</td>
                                    <td><?php echo $mahasiswa['agama']; ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px black;">
                                    <center><i class="fas fa-ballot"></i> DATA LENGKAP CALON MAHASISWA BARU</center>
                                </h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped table-sm">
                                    <tr>
                                        <td style="font-weight:bold;">NIK</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['nik']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelurahan</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['kelurahan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kabupaten</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['kabupaten']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kode Pos</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['kode_pos']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No Telp</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['no_hp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Email</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['email']; ?></td>
                                    </tr>

                                    <tr border="0">
                                        <td colspan="3" class="text-danger text-center bg-danger"><b>DATA SEKOLAH ASAL</b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nama Sekolah Asal</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['asal_sekolah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tahun Lulus</td>
                                        <td>:</td>
                                        <td><?php echo $mahasiswa['tahun_lulus']; ?></td>
                                    </tr>

                                </table>
                                <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i>*Simpan Formulir Sebagai Data Pendaftar SAH Calon Mahasiswa Baru <b>Akakdemi Farmasi Cendikia Farma Husada</b>.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- /.col -->
    </div>
    <br><br>

    <div class="ttd" style="float:right;text-align:left !important;">
        <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
        <br><br><br><br><br>
        <p style="margin:0;">(<?php echo $mahasiswa['nama_siswa']; ?>)</p>
    </div>

</body>