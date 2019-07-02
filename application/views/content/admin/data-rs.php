<?php 

if ($total_rows > 0) {
    $row = $get_data->row();
}

 ?>

<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo $title; ?>
                          </header>
                          <?php if ($this->session->flashdata('failed')) { ?>
                            <div class="form-group"  id="autoclose">
                                <div class="col-xs-12">
                                    <div class="alert alert-danger">
                                        <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('failed'); ?>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>

                          <?php if ($this->session->flashdata('success')) { ?>
                            <div class="form-group"  id="autoclose">
                                <div class="col-xs-12">
                                    <div class="alert alert-success">
                                        <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>
                          <div class="panel-body">
                              <form class="form-horizontal" role="form" method="POST" action="<?php echo $url_action; ?>" enctype="multipart/form-data">

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Kode Rumah Sakit</label>
                                      <div class="col-lg-9">
                                          <input type="text" value="<?php if($total_rows > 0){echo $row->kode;} ?>" autofocus class="form-control" id="inputEmail1" placeholder="" name="kode" required>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Nama Rumah Sakit</label>
                                      <div class="col-lg-9">
                                          <input type="text"  value="<?php if($total_rows > 0){echo $row->nama;} ?>" class="form-control" id="inputEmail1" placeholder="" name="nama" required>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Kelas Rumah Sakit</label>
                                      <div class="col-lg-9">
                                          <input type="text"  value="<?php if($total_rows > 0){echo $row->kelas;} ?>" class="form-control" id="inputEmail1" placeholder="" name="kelas" required>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Jenis Tarif Rumah Sakit</label>
                                      <div class="col-lg-9">
                                          <input type="text"  value="<?php if($total_rows > 0){echo $row->jenis_tarif;} ?>" class="form-control" id="inputEmail1" placeholder="" name="jenis_tarif" required>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <div class="col-lg-offset-3 col-lg-9">
                                          <button type="submit" class="btn btn-danger">Simpan</button>
                                      </div>
                                  </div>

                              </form>
                          </div>
                      </section>
                  </div>
              </div>

              <!-- page end-->
          </section>
      </section>