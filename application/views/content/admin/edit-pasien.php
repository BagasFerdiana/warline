<?php 

$row = $data->row();

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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. RM</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $row->no_rm; ?>" autofocus class="form-control" id="inputEmail1" placeholder="" name="no_rm" required>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $row->nama; ?>" class="form-control" id="inputEmail1" placeholder="" name="nama">
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tgl. Lahir</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo date('m-d-Y', strtotime($row->tgl_lahir)); ?>" class="form-control default-date-picker" id="inputEmail1" placeholder="" value="03-21-1996" name="tgl_lahir" >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" name="jk">
                                            <option <?php if($row->jk == 'l'){echo "selected";} ?> value="l">Laki-laki</option>
                                            <option <?php if($row->jk == 'p'){echo "selected";} ?> value="p">Perempuan</option>
                                          </select>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Telp</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $row->no_telp; ?>" class="form-control" id="inputEmail1" placeholder="" name="no_telp">
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