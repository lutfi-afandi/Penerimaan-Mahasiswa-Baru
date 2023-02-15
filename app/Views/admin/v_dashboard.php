  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header animated bounceIn">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-12 mt-2">
                      <div class="card card-danger ">
                          <center>
                              <h1 class="m-0 text-white bg-gradient-danger" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-school mt-1"></i> <br>DAFTAR LAYOUT INFORMASI PENDAFTARAN</h1>
                          </center>
                          <hr>
                          <div class="container-fluid">
                              <div class="row">


                                  <div class="col-md-12">
                                      <div class="card card-danger card-outline">
                                          <div class="card-header">
                                              <h3 class="card-title text-info"><i class="fas fa-users-class"></i> DATA PENDAFTARAN TAHUN AJARAN <?= $ta_aktif; ?></h3>
                                              <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="card-body p-0">
                                              <div class="row mt-3 ml-1 mr-1">
                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-info elevation-1"><i class="fad fa-users-medical"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>PENDAFTAR</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_daftar; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-navy elevation-1"><i class="fad fa-male"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>JUMLAH LAKI-LAKI</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_pria; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-pink elevation-1"><i class="fad fa-female"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>JUMLAH PEREMPUAN</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_wanita; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-shield-check"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>DITERIMA</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_terima; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-address-book"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>REGULER</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_reguler; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-sparkles"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>KHUSUS</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_khusus; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>