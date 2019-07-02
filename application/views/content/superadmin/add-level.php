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

                          <?php 
                          if ($total_level > 1) {
                            ?>
                            <div class="alert alert-danger">
                              Anda tidak bisa manambahkan hak akses lebih dari 2 hak akses (Contoh : Warga dengan Admin / Warga dengan Ketua RT dsb.)
                            </div>
                            <?php
                          }else{
                            ?>
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo $action_level; ?>" enctype="multipart/form-data">

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Hak Akses / Level</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" name="level" required>
                                            <option value="">--pilih--</option>
                                            <option value="admin">Admin</option>
                                            <option value="ketua_rw">Ketua RW</option>
                                            <option value="ketua_rt">Ketua RT</option>
                                            <option value="bendahara_rt">Bendahara RT</option>
                                            <option value="sekretaris_rt">Sekretaris RT</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-danger">Simpan</button>
                                      </div>
                                  </div>

                              </form>
                            <?php
                          }


                           ?>
                          

                              
                          </div>
                      </section>
                  </div>
              </div>

              <!-- page end-->
          </section>
      </section>