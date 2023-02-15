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
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/admin/kelulusan"><?php echo $title; ?></a></li>
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
                              <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#modalImport"><i class="fas fa-file-excel"> </i> Import Excel</a>
                              <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"> </i> Tambah Data</a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-2">
                              <table id="example" class="table table-bordered table-hover table-sm">
                                  <thead>
                                      <tr class="bg-info">
                                          <th class="text-center">No</th>
                                          <th>No Ujian</th>
                                          <th>Nama</th>
                                          <th>Nilai</th>
                                          <!-- <th>Nilai TPD</th> -->
                                          <th>Keterangan</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($kelulusan as $data) { ?>
                                          <tr>
                                              <td class="text-center"><?php echo $no; ?></td>
                                              <td><?php echo $data['no_ujian']; ?></td>
                                              <td><?php echo $data['nama_siswa']; ?></td>
                                              <td><?php echo $data['nilai']; ?></td>
                                              <td><?php echo $data['keterangan']; ?></td>
                                              <td style="text-align:center;">
                                                  <a type="button" class="btn bg-danger btn-xs " data-toggle="modal" data-target="#hapus<?= $data['id_kelulusan']; ?>"><i class="fa fa-trash"> </i> </a>
                                              </td>
                                          </tr>
                                      <?php $no++;
                                        } ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>



              </div>

          </div>
      </section>
      <!-- /.content -->
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('admin/kelulusan/input'); ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <label>No Ujian</label>
                          <input type="text" class="form-control" name="no_ujian" required>
                      </div>
                      <div class="form-group">
                          <label>Nama Siswa</label>
                          <input type="text" class="form-control" name="nama_siswa" required>
                      </div>
                      <div class="form-group">
                          <label>Nilai</label>
                          <select name="nilai" id="" class="form-control" required>
                              <option>GOOD</option>
                              <option>VERY GOOD</option>
                              <option>EXCELENT</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Keterangan</label>
                          <select name="keterangan" id="" class="form-control" required>
                              <option>LULUS</option>
                              <option>TIDAK LULUS</option>
                          </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-success" type="submit">SUBMIT</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <div class="modal fade" id="modalImport">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-info"><i class="far fa-upload"></i></i> Import Data Kelulusan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?php echo base_url('admin/kelulusan/kelulusan_import'); ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                      <table class="table-form">
                          <tbody>
                              <tr>
                                  <td class="tblabel">Pilih File :&nbsp;<i class="fas fa-file-excel fa-2x text-success"> </i></i> </th>
                                  <td><input class="form-control" name="file_import" type="file" required accept=".xls, .xlsx" /></td>
                              </tr>
                          </tbody>
                      </table>
                      <br>
                      <p style="margin:0;">- Ukuran Maks <b>5MB</b> dan Format File <b><i class="fas fa-file-excel fa-2x text-success"> </i></i>.xlsx</b>.</p>
                      <p style="margin:0;">- Format Data Kelulusan di unduh <a href="<?= base_url(); ?>/uploads/format/kelulusan_import.xlsx" target="_blank"> <i class="fal fa-download"></i> DISINI</a></a>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-info"><i class="far fa-upload"></i> Simpan</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->



  <!-- hapus -->
  <?php foreach ($kelulusan as $key => $mhs) { ?>
      <div class="modal fade" id="hapus<?= $mhs['id_kelulusan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <label>Yakin mengapus data <?= $mhs['no_ujian']; ?> - <?= $mhs['nama_siswa']; ?></label>
                  </div>
                  <div class="modal-footer">
                      <a href="<?= base_url('admin/kelulusan/hapus/' . $mhs['id_kelulusan']); ?>" class="btn bg-danger btn-sm btn-flat"><i class="fa fa-trash"> </i> Hapus </a>
                  </div>
              </div>
          </div>
      </div>
  <?php } ?>