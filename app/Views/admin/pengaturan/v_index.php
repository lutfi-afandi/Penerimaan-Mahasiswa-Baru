  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6 mt-2">
                      <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
                          <i class="fas fa-cogs nav-icon text-info"></i> <?php echo $title; ?>
                      </h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/pengaturan"><?php echo $title; ?></a></li>
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
                  <div class="col-md-8">
                      <div class="card card-orange card-outline">
                          <div class="card-header">
                              <center>
                                  <h5>CAROUSEL</h5>
                              </center>
                          </div>
                          <div class="card-body">
                              <a type="button" class="btn bg-info btn-sm btn-flat mb-3" data-toggle="modal" data-target="#addcarousel"><i class="fa fa-plus"> </i> Tambah Data </a>
                              <div id="carouselExampleControlsNoTouching" class="carousel slide" data-touch="false" data-interval="false">
                                  <?php if ($carousel) { ?> <div class="carousel-inner">

                                          <?php foreach ($carousel as $key => $car)
                                            // dd($car); 
                                            { ?>
                                              <div class="carousel-item <?= ($key == 0) ? 'active' : ''; ?>">
                                                  <img src="<?= base_url('uploads/carousel/' . $car['file_gambar']); ?>" class="d-block w-100" alt="...">
                                                  <center style="margin-top: -60px;"> <a type="button" class="btn bg-danger btn-xs btn-flat" data-toggle="modal" data-target="#delete<?= $car['id_carousel']; ?>"><i class="fa fa-trash"> </i> Hapus</a></center>
                                              </div>
                                          <?php   } ?>


                                      </div> <?php  } ?>
                                  <button class="carousel-control-prev" style="opacity: 0.05;" type="button" data-target="#carouselExampleControlsNoTouching" data-slide="prev">
                                      <span class="carousel-control-prev-icon" style="opacity: 0.8;" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" style="opacity: 0.05;" type="button" data-target="#carouselExampleControlsNoTouching" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </button>
                              </div>

                              <div class="card card-orange card-outline mt-5"></div>


                              <form action="<?= base_url('admin/pengaturan/ubah_pengaturan/' . $pengaturan['id_pengaturan']); ?>" method="post" enctype="multipart/form-data">
                                  <center>
                                      <h5>FILE PROSEDURE</h5>

                                      <img src="<?= base_url('uploads/pengaturan/' . $pengaturan['prosedur']); ?>" alt="" class="img img-thumbnail" width="60%">
                                  </center>
                                  <div class="form-group row mt-3">
                                      <label for="inputEmail3" class="col-sm-4 col-form-label">Ubah File Prosedure</label>
                                      <div class="col-sm-8">
                                          <input type="file" name="file_prosedur" class="form-control" id="inputEmail3" accept=".png, .jpg, .jpeg">
                                      </div>
                                  </div>
                                  <div class="form-group row mt-3">
                                      <label for="inputEmail3" class="col-sm-4 col-form-label">Tampilkan Pengumuman</label>
                                      <div class="col-sm-8">
                                          <select name="pengumuman" id="" class="form-control" required>
                                              <option value="1" <?= ($pengaturan['pengumuman'] == 1) ? 'selected' : ''; ?>>Iya</option>
                                              <option value="0" <?= ($pengaturan['pengumuman'] == 0) ? 'selected' : ''; ?>>Tidak</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group mt-3">
                                      <label for="">TENTANG PPDB</label>
                                      <textarea id="editor" name="tentang" required><?= $pengaturan['tentang']; ?></textarea>
                                      <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
                                      <script>
                                          CKEDITOR.replace('tentang');
                                      </script>
                                  </div>
                                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-upload"></i> Simpan</button>
                              </form>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="card">
                          <div class="card-header bg-gradient-navy">
                              <center>
                                  <b>Informasi Ujian</b>
                              </center>
                          </div>

                          <div class="card-body">
                              <form action="<?= base_url('admin/pengaturan/ubah_ujian/' . $pengaturan['id_pengaturan']); ?>" method="POST">
                                  <div class="form-group">
                                      <textarea name="ujian" id="" class="form-control" cols="30" rows="5"><?= $pengaturan['ujian']; ?></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-block btn-primary">Ubah</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>



  <div class="modal fade" id="addcarousel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">
              <div class="modal-header bg-gradient-blue">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Slideshow</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <form class="form-horizontal" action="<?= base_url('admin/pengaturan/add_carousel'); ?>" method="post" enctype="multipart/form-data">

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

  <?php foreach ($carousel as $key => $value) { ?>

      <div class="modal fade" id="delete<?= $value['id_carousel']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content">
                  <div class="modal-header bg-gradient-blue">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Carousel</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <center>
                          <h5>Yakin menghapus gambar ini?</h5>
                      </center>
                      <img src="<?= base_url('uploads/carousel/' . $value['file_gambar']); ?>" class="img img-thumbnail" alt="...">
                  </div>
                  <div class="modal-footer">
                      <a href="<?= base_url('admin/pengaturan/delete_carousel/' . $value['id_carousel']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                  </div>
              </div>
          </div>
      </div>
  <?php } ?>