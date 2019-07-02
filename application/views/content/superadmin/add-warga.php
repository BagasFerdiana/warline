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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kode Keluarga</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="kode_keluarga" value="<?php echo $kode_keluarga; ?>" required>
                                          <span style="color: red"><b>Gunakan kode keluarga yang sudah ada apabila masih belum memiliki KODE KELUARGA</b></span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Status Keluarga</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" name="id_status_keluarga">
                                            <?php 

                                            foreach ($status_keluarga->result_object() as $val_status_keluarga) {
                                              ?>
                                                <option value="<?php echo $val_status_keluarga->id_status_keluarga; ?>"><?php echo $val_status_keluarga->nama; ?></option>
                                              <?php
                                            }

                                             ?>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">NIK</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="nik" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. KK</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="no_kk">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="nama" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tempat Lahir</label>
                                      <div class="col-lg-10">
                                          <input type="text" autofocus class="form-control" id="inputEmail1" placeholder="" name="tempat_lahir" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tgl. Lahir</label>
                                      <div class="col-lg-10" >
                                          <input type="text" class="form-control default-date-picker" id="inputEmail1" placeholder="" value="03-21-1996" name="tgl_lahir" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" name="jk">
                                            <option value="l">Laki-laki</option>
                                            <option value="p">Perempuan</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-lg-10" >
                                          <input type="text"  class="form-control" id="inputEmail1" placeholder="" name="alamat" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Agama</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" name="agama" required>
                                            <option value="">--pilih--</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kong Hu Chu">Kong Hu Chu</option>
                                            <option value="Lain-lain">Lain-lain</option>

                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Status Perkawinan</label>
                                      <div class="col-lg-10" >
                                          <select class="form-control" name="status_perkawinan">
                                            <option value="">--pilih--</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>

                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
                                      <div class="col-lg-10" >
                                          <input type="text"  class="form-control" id="inputEmail1" placeholder="" name="pekerjaan" >
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kewarganegaraan</label>
                                      <div class="col-lg-10" >
                                          <input type="text"  class="form-control" id="inputEmail1" placeholder="" name="kewarganegaraan">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Pendidikan</label>
                                      <div class="col-lg-10" >
                                          <input type="text"  class="form-control" id="inputEmail1" placeholder="" name="pendidikan" >
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Username</label>
                                      <div class="col-lg-10" >
                                          <input type="text"  class="form-control" id="inputEmail1" placeholder="" name="username" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
                                      <div class="col-lg-10" >
                                          <input type="password"  class="form-control" id="inputEmail1" placeholder="" name="password" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Ulangi Password</label>
                                      <div class="col-lg-10" >
                                          <input type="password"  class="form-control" id="inputEmail1" placeholder="" name="password2" required>
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