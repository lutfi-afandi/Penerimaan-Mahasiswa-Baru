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
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/tahunakademik"><?php echo $title; ?></a></li>
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
                  <div class="animated fadeInLeft col-md-6">
                      <div class="card card-fuchsia card-outline">
                          <div class="card-header">
                              <a type="button" class="btn bg-info btn-sm btn-flat" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> </i> Tambah Tahun Akademik </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-2">
                              <table id="example" class="table  table-hover table-sm text-sm">
                                  <thead>
                                      <tr class="bg-gradient-primary">
                                          <th class="text-center " height="2px">No</th>
                                          <th>Tahun Akademik</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($ta as $data) { ?>
                                          <tr>
                                              <td class="text-center "><?php echo $no++; ?></td>
                                              <td><?php echo $data['tahun_akademik']; ?></td>
                                              <td>
                                                  <?php if ($data['status'] != 'aktif') { ?>
                                                      <form action="<?= base_url('admin/tahunakademik/update_status/' . $data['id']); ?>" method="post">
                                                          <input type="hidden" name="status" value="aktif">
                                                          <button type="submit" class="btn btn-sm btn-success">Tidak Aktif</button>
                                                      </form>
                                                  <?php   } else { ?>
                                                      <label class="badge badge-primary"><i class="fa fa-check"></i> Aktif</label>
                                                  <?php } ?>

                                              </td>
                                              <td style="text-align:center;">
                                                  <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/tahunakademik/delete_ta/' . $data['id']); ?>" onclick="return confirm('yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus </a>
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

  <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">
              <div class="modal-header bg-gradient-lime">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Akademik</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('admin/tahunakademik/add_ta'); ?>" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                          <label for="tahun_akademik">Tahun Akademik</label>
                          <input type="text" name="tahun_akademik" class="form-control" id="tahun_akademik" placeholder="tahun akademik" required>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SAVE</button>
              </div>
              </form>
          </div>
      </div>
  </div>