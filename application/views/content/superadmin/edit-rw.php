<?php 

$value = $data->row();

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
                            <div class="form-group close-alert">
                                <div class="col-xs-12">
                                    <div class="alert alert-danger">
                                        <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('failed'); ?>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>

                          <?php if ($this->session->flashdata('success')) { ?>
                            <div class="form-group close-alert">
                                <div class="col-xs-12">
                                    <div class="alert alert-success">
                                        <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>
                          <div class="panel-body">
                              <form class="form-horizontal" role="form" method="POST" action="<?php echo $action; ?>" enctype="multipart/form-data">

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama RW</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="nama" value="<?php echo $value->nama; ?>" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Daerah</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="daerah" value="<?php echo $value->daerah; ?>" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kode Pos</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="kode_pos" value="<?php echo $value->kode_pos; ?>" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
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