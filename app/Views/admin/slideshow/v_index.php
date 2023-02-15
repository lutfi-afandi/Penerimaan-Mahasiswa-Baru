  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6 mt-2">
                      <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
                          <i class="fas fa-books nav-icon text-info"></i> <?php echo $title; ?>
                      </h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/admin/slideshow"><?php echo $title; ?></a></li>
                      </ol>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- /.row -->
                  <div class="animated fadeInLeft col-md-12">
                      <div class="card card-info card-outline">
                          <div class="card-header">
                              <a type="button" class="btn bg-info btn-sm btn-flat" data-toggle="modal" data-target="#addslideshow"><i class="fa fa-plus"> </i> Tambah Data </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-2">
                              <table id="example" class="table table-bordered table-hover table-sm">
                                  <thead>
                                      <tr class="bg-teal">
                                          <th class="text-center " height="2px">No</th>
                                          <th>File Gambar</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($slideshow as $data) { ?>
                                          <tr>
                                              <td class="text-center "><?php echo $no++; ?></td>
                                              <td><img style="width:200px;" src="<?= base_url('uploads/slideshow/' . $data['file_gambar']) ?>"> </td>
                                              <td style="text-align:center;">

                                                  <a class="btn btn-danger btn-sm" href="<?php echo base_url('/admin/slideshow/slideshow_hapus/' . $data['id_slideshow']); ?>" onclick="return confirm('yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus </a>
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
  </div>

  <div class="modal fade" id="addslideshow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">
              <div class="modal-header bg-gradient-blue">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Slideshow</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <form class="form-horizontal" action="<?= base_url('/admin/slideshow/add_slideshow'); ?>" method="post" enctype="multipart/form-data">

                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Gambar Slide</label>
                          <div class="col-sm-10">
                              <input type="file" name="file_gambar" class="form-control" id="inputEmail3" placeholder="slide" accept=".png, .jpg, .jpeg">
                          </div>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file-upload"></i> UPLOAD</button>
              </div>
              </form>
          </div>
      </div>
  </div>