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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Surat Eligibilitas Peserta (SEP)</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $no_sep; ?>" class="form-control" id="inputEmail1" placeholder="" disabled>
                                          <input type="hidden" value="<?php echo $no_sep; ?>" name="no_sep">
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jaminan</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="jaminan" required>
                                            <option value="">--pilih--</option>
                                            <option value="JKN-KIS">JKN-KIS</option>
                                            <option value="BPJSTK">BPJSTK</option>
                                            <option value="Jasa Raharja">Jasa Raharja</option>
                                            <option value="Jamkesda">Jamkesda</option>
                                            <option value="Asuransi Lain">Asuransi Lain</option>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Peserta</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control" id="inputEmail1" placeholder="" name="no_peserta">
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">COB</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="cob" required>
                                            <option value="">--pilih--</option>
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis Rawat</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="jenis_rawat" required>
                                            <option value="">--pilih--</option>
                                            <option value="ODC">ODC</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RI">RI</option>
                                            <option value="Naik Kelas">Naik Kelas</option>
                                            <option value="Rawat Intensif">Rawat Intensif</option>
                                          </select>
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tgl. Masuk</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control default-date-picker" id="inputEmail1" placeholder="" value="<?php echo date('m-d-Y'); ?>" name="tgl_masuk" >
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tgl. Keluar</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control default-date-picker" id="inputEmail1" placeholder="" value="<?php echo date('m-d-Y'); ?>" name="tgl_keluar" >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kelas Rawat</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="kelas_rawat" required>
                                            <option value="">--pilih--</option>
                                            <option value="Kelas I">Kelas I</option>
                                            <option value="Kelas II">Kelas II</option>
                                            <option value="Kelas III">Kelas III</option>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Naik Kelas</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="naik_kelas" required>
                                            <option value="">--pilih--</option>
                                            <option value="Kelas I">Kelas I</option>
                                            <option value="Kelas II">Kelas II</option>
                                            <option value="Kelas VIP">Kelas VIP</option>
                                            <option value="Kelas VVIP">Kelas VVIP</option>
                                          </select>
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Lama Hari Naik Kelas</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control" id="inputEmail1" placeholder="... Hari" name="lama_hari_naik_kelas">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Lama Dirawat</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control" id="inputEmail1" placeholder="... Hari" name="lama_dirawat">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Berat Lahir</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control" id="inputEmail1" placeholder=".. Gram" name="berat_lahir">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ADL Score (Sub Acute)</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control" id="inputEmail1" placeholder="" name="adl_score_sub_acute">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ADL Score (Chronic)</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control" id="inputEmail1" placeholder="" name="adl_score_chronic">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">DPJP</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="id_dpjp" required>
                                            <option value="">--pilih--</option>
                                            <?php 
                                            foreach ($dpjp->result_object() as $value_dpjp) {
                                              ?>
                                              <option value="<?php echo $value_dpjp->id_data_dpjp; ?>"><?php echo $value_dpjp->nama; ?></option>
                                              <?php
                                            }


                                             ?>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Cara Pulang</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="cara_pulang" required>
                                            <option value="">--pilih--</option>
                                            <option value="Sembuh">Sembuh</option>
                                            <option value="Pulang Paksa">Pulang Paksa</option>
                                            <option value="Meninggal">Meninggal</option>
                                            <option value="Rujuk">Rujuk</option>
                                          </select>
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis Tarif</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="jenis_tarif" required>
                                            <option value="">--pilih--</option>
                                            <option value="Tarif Kelas D Swasta">Tarif Kelas D Swasta</option>
                                            <option value="Tarif Kelas C Swasta">Tarif Kelas C Swasta</option>
                                            <option value="Tarif Kelas B Swasta">Tarif Kelas B Swasta</option>
                                            <option value="Tarif Kelas A Swasta">Tarif Kelas A Swasta</option>
                                            <option value="Tarif Kelas D Pemerintah">Tarif Kelas D Pemerintah</option>
                                            <option value="Tarif Kelas C Pemerintah">Tarif Kelas C Pemerintah</option>
                                            <option value="Tarif Kelas B Pemerintah">Tarif Kelas B Pemerintah</option>
                                            <option value="Tarif Kelas A Pemerintah">Tarif Kelas A Pemerintah</option>
                                            <option value="Tarif Kelas B Swasta Pendidikan">Tarif Kelas B Swasta Pendidikan</option>
                                            <option value="Tarif Kelas A Swasta Pendidikan">Tarif Kelas A Swasta Pendidikan</option>
                                          </select>
                                      </div>
                                  </div> 


                          <header class="panel-heading">
                              Tarif Rumah Sakit
                          </header>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sewa Poliklinik</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="sewa_poliklinik">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sewa Kamar</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="sewa_kamar">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Laboratorium</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="laboratorium">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Rawat Intensif</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="rawat_intensif">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Radiologi</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="radiologi">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jasa Dokter</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="jasa_dokter">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Pelayanan Darah</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="pelayanan_darah">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Prosedur Bedah</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="prosedur_bedah">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Obat</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="obat">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Prosedur Non Bedah</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="prosedur_non_bedah">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">BMHP</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="bmhp">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Penunjang</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="penunjang">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alkes</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="alkes">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Keperawatan</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="keperawatan">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sewa Alat</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="sewa_alat">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tenaga Ahli</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="tenaga_ahli">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Administrasi</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="administrasi">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Rehabilitasi</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control uang" id="inputEmail1" placeholder="" name="rehabilitasi">
                                      </div>
                                  </div> 

                          <header class="panel-heading">
                              Diagnosis Dan Prosedur
                          </header>

                                  <div class="row">
                                    <div class="col-md-6">

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Diagnosis Primer</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_diagnosa_primer">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($diagnosa->result_object() as $value_diagnosa) {
                                                  ?>
                                                  <option value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Diagnosis Sekunder I</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_diagnosa_sekunder1">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($diagnosa->result_object() as $value_diagnosa) {
                                                  ?>
                                                  <option value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Diagnosis Sekunder II</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_diagnosa_sekunder2">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($diagnosa->result_object() as $value_diagnosa) {
                                                  ?>
                                                  <option value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Diagnosis Sekunder III</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_diagnosa_sekunder3">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($diagnosa->result_object() as $value_diagnosa) {
                                                  ?>
                                                  <option value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Diagnosis Sekunder IV</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_diagnosa_sekunder4">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($diagnosa->result_object() as $value_diagnosa) {
                                                  ?>
                                                  <option value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                    </div>

                                    <div class="col-md-6">

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Prosedur Primer</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_tindakan_primer">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($tindakan->result_object() as $value_tindakan) {
                                                  ?>
                                                  <option value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Prosedur Sekunder I</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_tindakan_sekunder1">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($tindakan->result_object() as $value_tindakan) {
                                                  ?>
                                                  <option value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Prosedur Sekunder II</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_tindakan_sekunder2">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($tindakan->result_object() as $value_tindakan) {
                                                  ?>
                                                  <option value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Prosedur Sekunder III</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_tindakan_sekunder3">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($tindakan->result_object() as $value_tindakan) {
                                                  ?>
                                                  <option value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Prosedur Sekunder IV</label>
                                          <div class="col-lg-8">
                                              <select class="form-control" name="id_data_tindakan_sekunder4">
                                                <option value="">--pilih--</option>
                                                <?php 

                                                foreach ($tindakan->result_object() as $value_tindakan) {
                                                  ?>
                                                  <option value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
                                                  <?php
                                                }

                                                 ?>
                                              </select>
                                          </div>
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