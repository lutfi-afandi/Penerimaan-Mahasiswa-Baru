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
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/user"><?php echo $title; ?></a></li>
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
                      <div class="card card-fuchsia card-outline">
                          <div class="card-header">
                              <a type="button" class="btn bg-info btn-sm btn-flat" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> </i> Tambah User </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-2">
                              <table id="example" class="table  table-hover table-sm">
                                  <thead>
                                      <tr class="bg-teal">
                                          <th class="text-center " height="2px">No</th>
                                          <th>NAMA</th>
                                          <th>USERNAME</th>
                                          <th>PASSWORD</th>
                                          <th>AKSI</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($user as $data) { ?>
                                          <tr>
                                              <td class="text-center "><?php echo $no++; ?></td>
                                              <td><?php echo $data['nama']; ?></td>
                                              <td><?php echo $data['username']; ?></td>
                                              <td>
                                                  <a type="button" class="" data-toggle="modal" data-target="#passbar<?= $data['id']; ?>"><i class="fa fa-edit"> </i> reset </a>
                                              </td>
                                              <td style="text-align:center;">
                                                  <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/user/delete_user/' . $data['id']); ?>" onclick="return confirm('yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus </a>
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
                  <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <form class="form-horizontal" action="<?= base_url('admin/user/add_user'); ?>" method="post" enctype="multipart/form-data">

                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
                          <div class="col-sm-10">
                              <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="nama" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">USERNAME</label>
                          <div class="col-sm-10">
                              <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="username" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">PASSWORD</label>
                          <div class="col-sm-10">
                              <input type="text" name="password" class="form-control" id="inputEmail3" placeholder="password" required>
                          </div>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SAVE</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <?php foreach ($user as $key => $u) { ?>
      <div class="modal fade" id="passbar<?= $u['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content">
                  <div class="modal-header bg-gradient-primary">
                      <h5 class="modal-title" id="exampleModalLabel">EDIT PASSWORD</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body ">
                      <form class="form-horizontal" action="<?= base_url('admin/user/edit_password/' . $u['id']); ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group ">
                              <label for="inputEmail3">PASSWORD BARU</label>
                              <input type="text" name="password_baru" class="form-control" id="inputEmail3" placeholder="password baru" required>
                          </div>

                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SAVE</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  <?php } ?>