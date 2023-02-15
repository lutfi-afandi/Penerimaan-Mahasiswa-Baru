    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Pendaftaran Mahasiswa Tahun Ajaran 2022/2023</h1>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt-2">
                        <?php if ($buka) { ?>
                            <?php if (empty($no_ujian)) { ?>
                                <div class="card card-navy">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-file-user"></i> CEK PENGUMUMAN ANDA</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" action="<?php echo base_url(); ?>/portal/cek_pengumuman" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <b>
                                                <center>INPUT NOMOR UJIAN PENDAFTARAN</center>
                                            </b>
                                            <div class="card-navy card-outline mb-2"></div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" placeholder=" Nomor Ujian" name="no_ujian" required>
                                                    <font size="1"><i>*Pastikan nomor yang anda masukan benar</i></font>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-block bg-navy"><i class="fas fa-search"></i> <b>PERIKSA</b></button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                            <?php } ?>

                            <?php if (!empty($no_ujian)) { ?>
                                <div class="card card-navy">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-file-user"></i> HASIL PENGUMUMAN</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">
                                        <?php
                                        $db = \Config\Database::connect();
                                        // $get = $db->table('pmb_kelulusan')->where('no_ujian', $no_ujian)->countAllResults();
                                        $get = $db->query("SELECT * FROM pmb_kelulusan WHERE no_ujian = '" . $no_ujian . "'")->getRowArray();
                                        // dd($get);
                                        if ($get != null) {
                                            $d = $get;     ?>
                                            <div id="xpengumuman">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Nomor Peserta</strong></td>
                                                            <td><b><?php echo $d['no_ujian']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Nama Mahasiswa</strong></td>
                                                            <td><b><?php echo strtoupper($d['nama_siswa']); ?></b></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <?php if ($d['keterangan'] == 'LULUS' || $d['keterangan'] == 'Lulus') { ?>
                                                    <div class="alert alert-success bg-navy" role="alert">
                                                        <center><strong><i class="fas fa-grin-stars" style="font-size: 48px;"></i><br>SELAMAT !</strong><br><strong>ANDA DINYATAKAN LULUS<br> SELEKSI BERKAS</strong></center><br>

                                                        <div class="col-md-12 mt-3">
                                                            <div class="card bg-light">
                                                                <div class="card-footer bg-danger">
                                                                    <div class="text-center">
                                                                        <b>INFORMASI TEKNIS DAFTAR ULANG</b>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class="row">
                                                                        <div class="col-12 mt-2">
                                                                            <code class="highlighter-rouge text-navy"><br>Setelah calon Mahasiswa dinyatakan di terima di Akademi Farmasi Cendikia Farma Husada, berikut ini langkah-langkah yang harus di lakukan :</br>1. Membayar biaya daftar ulang Mahasiswa baru, yaitu dengan :
                                                                                </br>Datang ke Kampus Akfar Cefada
                                                                                </br>&nbsp;&nbsp;&nbsp;Hari : Senin - Sabtu
                                                                                </br>&nbsp;&nbsp;&nbsp;Pukul : 08.00 - 15.00 WIB
                                                                                </br>&nbsp;&nbsp;&nbsp;Membawa materai 10.000 untuk mengisi surat pernyataan calon Mahasiswa baru.
                                                                                </br>1. Membayar Melalui Transfer Ke
                                                                                <b class="text-danger"></br>&nbsp;&nbsp;&nbsp;Nomor Rekening : 3570000771 (Bank Muamalat)
                                                                                    </br>&nbsp;&nbsp;&nbsp;Atas nama : Yayasan Cendikia Farma Husada </b>
                                                                                </br>&nbsp;&nbsp;&nbsp;Kirim bukti transfer ke no <a class="btn bg-success btn-xs" href="https://api.whatsapp.com/send?phone=62895328127575&amp;text=Saya%20*<?php echo strtoupper($d['nama_siswa']); ?>*%0AIngin%20Konfirmasi%20Pembayaran%0ADaftar Ulang%20PMB%0AAKFAR Cefada.%0ATerimakasih" target="_blank"><i class="fab fa-whatsapp"></i> 0895328127575 (Bu Dira)</a>
                                                                                </br>&nbsp;&nbsp;&nbsp;Silakan unduh surat pernyataan pada link
                                                                                </br>&nbsp;&nbsp;&nbsp;<a type="button" class="btn bg-danger btn-flat mt-2 mb-2" target="_blank" href="<?php echo base_url('suratpernyataandaftarulang.docx'); ?>">DOWNLOAD SURAT PERNYATAAN </a>
                                                                                </br>2. Biaya daftar ulang min Rp. 2.000.000.
                                                                                </br>3. Batas waktu daftar ulang, yaitu 2 pekan dari hasil pengumuman kelulusan. Jika lewat dari batas tersebut, maka di anggap mengundurkan diri.
                                                                                <br>4. Untuk Informasi Lebih Lanjut Silakan Hubungi Panitia PMB <a class="btn bg-success btn-xs" href="https://api.whatsapp.com/send?phone=628975775046&amp;text=Saya%20*<?php echo strtoupper($d['nama_siswa']); ?>*%0AIngin%20Konfirmasi%20Pembayaran%0ADaftar Ulang%20PMB%0AAkfar Cefada.%0ATerimakasih" target="_blank"><i class="fab fa-whatsapp"></i> Panitia PMB</a>. Terimakasih.
                                                                                </b></br>
                                                                                <div class="card-navy card-outline mb-2"></div>
                                                                                <center>
                                                                                    Sekali lagi selamat, Kepada ananda <b><?php echo strtoupper($d['nama_siswa']); ?></b> di terima di <b>Akademi Farmasi Cendikia Farma Husada.</b></center>
                                                                            </code>
                                                                            <!-- <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/upload/cfd.jpg'; ?>" class="img-rounded elevation-2 mt-2" style="width:100%;" alt="User Image"> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <center>
                                                                    <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i>*Untuk Informasi Lebih Lanjut Silakan Hubungi Panitia. Terimakasih.</i></font><br><button type="button" class="btn bg-navy btn-flat mt-2 mb-2" onclick="history.back();">KEMBALI</button></strong>
                                                                </center>

                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php } else {  ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <center><strong><i class="fas fa-smile-wink" style="font-size: 48px;"></i><br>MAAF !</strong><br><strong>ANDA BELUM LULUS<br>
                                                                <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i>*Tetap Semangat, Tetap Ceria Meraih Cita-cita.</i></font>
                                                            </strong><br><br>
                                                            <button type="button" class="btn bg-navy btn-flat" onclick="history.back();">KEMBALI</button>
                                                        </center>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="callout callout-danger">
                                                <center>
                                                    <i class="fas fa-meh text-danger" style="font-size: 48px;"></i>
                                                    <h5 style="text-shadow: 2px 2px 4px #827e7e">MAAF!</h5>
                                                    <p style="text-shadow: 2px 2px 4px #827e7e">Nomor yang anda masukan tidak terdaftar.
                                                        <br style="text-shadow: 2px 2px 4px #827e7e">Silakan Cek Kembali Nomor Anda
                                                    </p>
                                                    <button type="button" class="btn btn-outline-danger btn-flat" onclick="history.back();">KEMBALI</button>
                                                </center>
                                            </div>

                                        <?php } ?>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            <?php } ?>

                        <?php } else { ?>
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-info"></i> MAAF PENGUMUMAN BELUM DI BUKA</h3>
                                </div>
                            </div>
                        <?php } ?>
                    </div>



                </div>
            </div>
        </div>
    </div>