    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">


                    <div class="col-lg-7 mt-2">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-file-user"></i> CETAK FORMULIR PENDAFTARAN</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="<?php echo base_url(); ?>/portal/cetak_formulir_pendaftaran" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <b>MASUKAN NOMOR PENDAFTARAN</b>
                                    <div class="card-danger card-outline mb-2"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control mb-2" placeholder=" Nomor Pendaftaran" name="no_pendaftaran" required>
                                            <font size="1"><i>
                                                    <p class="text-success">*Pastikan nomor yang anda masukan benar<br>*Jika Lupa Nomor Pendaftaran, Silakan Hubungi Pihak Panitia PMB AKFAR Cefada.</p>
                                                </i></font>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block bg-success"><i class="fas fa-print"></i> <b>CETAK</b></button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>