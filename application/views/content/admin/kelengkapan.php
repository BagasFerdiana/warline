<?php 

if ($total_rows_rj > 0) {
    $rj = $get_data_rj->row();
}

if ($total_rows_ri > 0) {
    $ri = $get_data_ri->row();
}

 ?>

<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">
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
                  </div>

                  <div class="col-lg-6">
                      <section class="panel">
                          
                          

                          <header class="panel-heading">
                              <?php echo $title; ?> Rawat Jalan
                          </header>

                          <div class="panel-body">
                              <form class="form-horizontal" role="form" method="POST" action="<?php echo $url_action_rj; ?>" enctype="multipart/form-data">

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Keterangan</label>
                                      <div class="col-lg-3">
                                          Ada
                                      </div>
                                      <div class="col-lg-3">
                                          Tidak Ada
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Kartu JKN-KIS / BPJSTK / Jasa Raharja / Jamkesda / Asuransi </label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="kartu_asuransi" <?php if($total_rows_rj > 0){if($rj->kartu_asuransi == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="kartu_asuransi" <?php if($total_rows_rj > 0){if($rj->kartu_asuransi == 0){echo "checked";}} ?>  required>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">KTP</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="ktp" <?php if($total_rows_rj > 0){if($rj->ktp == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="ktp" <?php if($total_rows_rj > 0){if($rj->ktp == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Kartu Keluarga</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="kk" <?php if($total_rows_rj > 0){if($rj->kk == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="kk" <?php if($total_rows_rj > 0){if($rj->kk == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Rujukan</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="rujukan" <?php if($total_rows_rj > 0){if($rj->rujukan == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="rujukan" <?php if($total_rows_rj > 0){if($rj->rujukan == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Surat Kontrol</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="surat_kontrol" <?php if($total_rows_rj > 0){if($rj->surat_kontrol == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="surat_kontrol" <?php if($total_rows_rj > 0){if($rj->surat_kontrol == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">SEP</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="sep" <?php if($total_rows_rj > 0){if($rj->sep == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="sep" <?php if($total_rows_rj > 0){if($rj->sep == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Resume Medis</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="resume_medis" <?php if($total_rows_rj > 0){if($rj->resume_medis == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="resume_medis" <?php if($total_rows_rj > 0){if($rj->resume_medis == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Lembar Verifikasi Klaim</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="lembar_verifikasi" <?php if($total_rows_rj > 0){if($rj->lembar_verifikasi == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="lembar_verifikasi" <?php if($total_rows_rj > 0){if($rj->lembar_verifikasi == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Billing</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="billing" <?php if($total_rows_rj > 0){if($rj->billing == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="billing" <?php if($total_rows_rj > 0){if($rj->billing == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Penunjang (Lab / Rad / EKG / USG / CT-Scan / MRI / .......</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="penunjang" <?php if($total_rows_rj > 0){if($rj->penunjang == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="penunjang" <?php if($total_rows_rj > 0){if($rj->penunjang == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <div class="col-md-3">
                                          <button type="submit" class="btn btn-danger">Simpan</button>
                                      </div>
                                  </div>

                              </form>
                          </div>
                      </section>
                  </div>


                  <div class="col-lg-6">
                      <section class="panel">
                        

                          <header class="panel-heading">
                              <?php echo $title; ?> Rawat Inap
                          </header>

                          <div class="panel-body">
                              <form class="form-horizontal" role="form" method="POST" action="<?php echo $url_action_ri; ?>" enctype="multipart/form-data">

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Keterangan</label>
                                      <div class="col-lg-3">
                                          Ada
                                      </div>
                                      <div class="col-lg-3">
                                          Tidak Ada
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Kartu JKN-KIS / BPJSTK / Jasa Raharia / Jamkesda / Asuransi </label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1" name="kartu_asuransi" <?php if($total_rows_ri > 0){if($ri->kartu_asuransi == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0" name="kartu_asuransi" <?php if($total_rows_ri > 0){if($ri->kartu_asuransi == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">KTP</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="ktp" <?php if($total_rows_ri > 0){if($ri->ktp == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="ktp" <?php if($total_rows_ri > 0){if($ri->ktp == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Kartu Keluarga</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="kk" <?php if($total_rows_ri > 0){if($ri->kk == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="kk" <?php if($total_rows_ri > 0){if($ri->kk == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Rujukan</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="rujukan" <?php if($total_rows_ri > 0){if($ri->rujukan == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="rujukan" <?php if($total_rows_ri > 0){if($ri->rujukan == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Pengantar Rawat Inap</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="pengantar" <?php if($total_rows_ri > 0){if($ri->pengantar == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="pengantar" <?php if($total_rows_ri > 0){if($ri->pengantar == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">SEP</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="sep" <?php if($total_rows_ri > 0){if($ri->sep == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="sep" <?php if($total_rows_ri > 0){if($ri->sep == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Resume Medis</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="resume_medis" <?php if($total_rows_ri > 0){if($ri->resume_medis == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="resume_medis" <?php if($total_rows_ri > 0){if($ri->resume_medis == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Lembar Verifikasi Klaim</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="lembar_verifikasi" <?php if($total_rows_ri > 0){if($ri->lembar_verifikasi == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="lembar_verifikasi" <?php if($total_rows_ri > 0){if($ri->lembar_verifikasi == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Billing</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="billing" <?php if($total_rows_ri > 0){if($ri->billing == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="billing" <?php if($total_rows_ri > 0){if($ri->billing == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Penunjang (Lab / Rad / EKG / USG / CT-Scan / MRI / .......</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="penunjang" <?php if($total_rows_ri > 0){if($ri->penunjang == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="penunjang" <?php if($total_rows_ri > 0){if($ri->penunjang == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Tindakan Operatif</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="tindakan_operatif" <?php if($total_rows_ri > 0){if($ri->tindakan_operatif == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="tindakan_operatif" <?php if($total_rows_ri > 0){if($ri->tindakan_operatif == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-6 col-sm-6 control-label">Pelayanan Darah</label>
                                      <div class="col-lg-3">
                                          <input type="radio" value="1"  name="pelayanan_darah" <?php if($total_rows_ri > 0){if($ri->pelayanan_darah == 1){echo "checked";}} ?> required >
                                      </div>
                                      <div class="col-lg-3">
                                          <input type="radio" value="0"  name="pelayanan_darah" <?php if($total_rows_ri > 0){if($ri->pelayanan_darah == 0){echo "checked";}} ?> required >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <div class="col-md-3">
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