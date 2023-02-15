<?php

use CodeIgniter\Database\BaseUtils;
use Faker\Provider\Base;
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
                        <i class="fa fa-books nav-icon text-info"></i> <?= $title; ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home'); ?>"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/mahasiswa'); ?>">Data Mahasiswa</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">

        <div class="card card-danger card-outline">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm text-sm" id="example" width="100%">
                        <thead class="bg-gradient-danger">
                            <tr>
                                <th>#</th>
                                <th>No Pendaftaran</th>
                                <th>Nama</th>
                                <th>Jalur Daftar</th>
                                <th>Foto</th>
                                <th>Bukti Daftar</th>
                                <th>TA</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mahasiswa  as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['no_pendaftaran']; ?></td>
                                    <td><?= $value['nama_siswa']; ?></td>
                                    <td><?= $value['jalur_pendaftaran']; ?></td>
                                    <td>
                                        <a type="button" class="btn " data-toggle="modal" data-target="#foto<?= $value['id_pmb']; ?>">
                                            <!--                                             <img src="<?= base_url('uploads/foto/' . $value['foto']); ?>" alt="foto" width="50px" height="50px"> -->
                                            <?php if (!empty($value['foto'])) { ?>
                                                <img src="<?= base_url('uploads/foto/' . $value['foto']); ?>" alt="foto" width="50px" height="50px">
                                            <?php } else { ?>
                                                <i class="fad fa-file-image fa-4x text-danger"></i>
                                            <?php } ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a type="button" class="btn " data-toggle="modal" data-target="#bukti_bayar<?= $value['id_pmb']; ?>">
                                            <!--                                             <img src="<?= base_url('uploads/bukti_bayar/' . $value['bukti_bayar']); ?>" alt="bukti_bayar" width="50px" height="50px"> -->
                                            <?php if (!empty($value['bukti_bayar'])) { ?>
                                                <img src="<?= base_url('uploads/bukti_bayar/' . $value['bukti_bayar']); ?>" alt="bukti_bayar" width="50px" height="50px">
                                            <?php } else { ?>
                                                <i class="fad fa-file-invoice-dollar fa-4x text-success"></i>
                                            <?php } ?>
                                        </a>
                                    </td>
                                    <td><?= $value['ta_daftar']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($value['tanggal_daftar'])) ?></td>
                                    <td>
                                        <?php
                                        if ($value['status'] == '1') { ?>
                                            <a type="button" class="btn " data-toggle="modal" data-target="#status<?= $value['id_pmb']; ?>">
                                                <label class="badge badge-success">
                                                    <i class="fa fa-check"></i> Dikonfirmasi
                                                </label>
                                            </a>
                                        <?php   } else if ($value['status'] == '0') { ?>
                                            <a type="button" class="btn " data-toggle="modal" data-target="#status<?= $value['id_pmb']; ?>">
                                                <label class="badge badge-primary"> <i class="fa fa-spinner fa-spin"></i> Menunggu </label>
                                            </a>

                                        <?php   } else if ($value['status'] == '2') { ?>
                                            <a type="button" class="btn " data-toggle="modal" data-target="#status<?= $value['id_pmb']; ?>">
                                                <label class="badge badge-danger"><i class="fa fa-times"></i> Ditolak </label>
                                            </a>

                                        <?php   } ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn bg-info btn-sm btn-flat" href="<?= base_url('admin/mahasiswa/detail/' . $value['id_pmb']); ?>"><i class="fa fa-eye"> </i> Detail </a>
                                            <a class="btn bg-navy btn-sm btn-flat" href="<?= base_url('admin/mahasiswa/download/' . $value['no_pendaftaran']); ?>" target="_blank"><i class="fa fa-download"> </i> Download </a>
                                            <a type="button" class="btn bg-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus<?= $value['id_pmb']; ?>"><i class="fa fa-trash"> </i> </a>
                                            <a class="btn bg-success btn-xs" href="https://api.whatsapp.com/send?phone=62<?= $value['no_hp'] ?>&amp;text=Halo Ka, *<?= $value['nama_siswa'] ?>*%0ATerimakasih%20telah%20melakukan%20Pendaftaran%20*Mahasiswa%20Baru%20AKFAR%20CEFADA%20TA.2022/2023*.%0ASilahkan%20Lakukan%20*Pembayaran%20PMB%20Sebesar%20Rp. 100.000,-%20Ke%20Nomor%20Rekening%20:%20BANK%20MUAMALAT%20(3570000771)%20-%20An.%20Yayasan%20Cendikia%20Farma%20Husada*.%0A%0ATerimakasih.%0APanitia%20PMB%20*Akfar%20Cefada%202023*.%0A%0ACP.Admin%0A*08975775046*." target="_blank"><i class="fab fa-whatsapp"></i>Pembayaran</a>
                                            <a class="btn bg-lightblue btn-xs" href="https://api.whatsapp.com/send?phone=62<?= $value['no_hp'] ?>&amp;text=Halo Ka, *<?= $value['nama_siswa'] ?>*%0ATerimakasih%20telah%20melakukan%20Pendaftaran%20*Mahasiswa%20Baru%20AKFAR%20CEFADA%20TA.2022/2023*.%0Auntuk%20melengkapi%20data%20silahkan%20login%20melalui%20tautan%20ini.%0A*http://pmb.akfarcefada.ac.id/mahasiswa/auth*%0Auntuk%20login%20menggunakan:%0Ausername : *<?= $value['no_hp'] ?>*%0Apassword : *<?= $value['no_hp'] ?>*%0A%0ATerimakasih.%0APanitia%20PMB%20*Akfar%20Cefada%202023*.%0A%0ACP.Admin%0A*08975775046*." target="_blank"><i class="fab fa-whatsapp"></i>Akun</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>

<!-- KONFIRMASI -->
<?php foreach ($mahasiswa as $key => $mhs) { ?>
    <div class="modal fade" id="status<?= $mhs['id_pmb']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">KONFIRMASI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/mahasiswa/konfirmasi/' . $mhs['id_pmb']); ?>" method="post">
                    <div class="modal-body text-center">
                        <div class="form-group">
                            <select name="status" class="form-control" id="">
                                <option value="0">Tunggu</option>
                                <option value="1">Terima</option>
                                <option value="2">Tolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-flat btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Foto -->
<?php foreach ($mahasiswa as $key => $mhs) { ?>
    <div class="modal fade" id="foto<?= $mhs['id_pmb']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-l">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">FOTO CALON MAHASISWA</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="ekko-lightbox-container">
                        <div class="ekko-lightbox-item fade"></div>
                        <div class="ekko-lightbox-item fade in show">
                            <!--             <img src="<?= base_url('uploads/foto/' . $mhs['foto']); ?>" class="img-fluid" style="width: 100%;"> -->

                            <?php if (!empty($mhs['foto'])) { ?>
                                <img src="<?= base_url('uploads/foto/' . $mhs['foto']); ?>" class="img-fluid" style="width: 100%;">
                            <?php } else { ?>
                                <center><i class="fad fa-exclamation-circle fa-5x text-danger"> </i><br>Tidak Ada Berkas</center>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<!-- Bukti -->
<?php foreach ($mahasiswa as $key => $mhs) { ?>
    <div class="modal fade" id="bukti_bayar<?= $mhs['id_pmb']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-l">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">BUKTI BAYAR</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="ekko-lightbox-container">
                        <div class="ekko-lightbox-item fade"></div>
                        <div class="ekko-lightbox-item fade in show">
                            <?php if (!empty($mhs['bukti_bayar'])) { ?>
                                <img src="<?= base_url('uploads/bukti_bayar/' . $mhs['bukti_bayar']); ?>" class="img-fluid" style="width: 100%;">
                            <?php } else { ?>
                                <center><i class="fad fa-exclamation-circle fa-5x text-danger"> </i><br>Tidak Ada Berkas</center>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>






<!-- hapus -->
<?php foreach ($mahasiswa as $key => $mhs) { ?>
    <div class="modal fade" id="hapus<?= $mhs['id_pmb']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <label>Yakin mengapus data <?= $mhs['no_pendaftaran']; ?> - <?= $mhs['nama_siswa']; ?></label>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('admin/mahasiswa/hapus/' . $mhs['id_pmb']); ?>" class="btn bg-danger btn-sm btn-flat"><i class="fa fa-trash"> </i> Hapus </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>