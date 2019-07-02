<?php 

$val = $data->row();

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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Surat Eligibilitas Peserta (SEP)</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $val->no_sep; ?>" class="form-control" id="inputEmail1" placeholder="" disabled>
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jaminan</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="jaminan" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->jaminan == 'JKN-KIS'){echo "selected";} ?> value="JKN-KIS">JKN-KIS</option>
                                            <option <?php if($val->jaminan == 'BPJSTK'){echo "selected";} ?> value="BPJSTK">BPJSTK</option>
                                            <option <?php if($val->jaminan == 'Jasa Raharja'){echo "selected";} ?> value="Jasa Raharja">Jasa Raharja</option>
                                            <option <?php if($val->jaminan == 'Jamkesda'){echo "selected";} ?> value="Jamkesda">Jamkesda</option>
                                            <option <?php if($val->jaminan == 'Asuransi Lain'){echo "selected";} ?> value="Asuransi Lain">Asuransi Lain</option>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Peserta</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->no_peserta; ?>" class="form-control" id="inputEmail1" placeholder="" name="no_peserta">
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">COB</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="cob" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->cob == '+'){echo "selected";} ?> value="+">+</option>
                                            <option <?php if($val->cob == '-'){echo "selected";} ?> value="-">-</option>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis Rawat</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="jenis_rawat" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->jenis_rawat == 'ODC'){echo "selected";} ?> value="ODC">ODC</option>
                                            <option <?php if($val->jenis_rawat == 'RJ'){echo "selected";} ?> value="RJ">RJ</option>
                                            <option <?php if($val->jenis_rawat == 'RI'){echo "selected";} ?> value="RI">RI</option>
                                            <option <?php if($val->jenis_rawat == 'Naik Kelas'){echo "selected";} ?> value="Naik Kelas">Naik Kelas</option>
                                            <option <?php if($val->jenis_rawat == 'Rawat Intensif'){echo "selected";} ?> value="Rawat Intensif">Rawat Intensif</option>
                                          </select>
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tgl. Masuk</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control default-date-picker" id="inputEmail1" placeholder="" value="<?php echo date('m-d-Y', strtotime($val->tgl_masuk)) ?>" name="tgl_masuk" >
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tgl. Keluar</label>
                                      <div class="col-lg-4">
                                          <input type="text" class="form-control default-date-picker" id="inputEmail1" placeholder="" value="<?php echo date('m-d-Y', strtotime($val->tgl_keluar)) ?>" name="tgl_keluar" >
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kelas Rawat</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="kelas_rawat" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->kelas_rawat == 'Kelas I'){echo "selected";} ?>  value="Kelas I">Kelas I</option>
                                            <option <?php if($val->kelas_rawat == 'Kelas II'){echo "selected";} ?>  value="Kelas II">Kelas II</option>
                                            <option <?php if($val->kelas_rawat == 'Kelas III'){echo "selected";} ?>  value="Kelas III">Kelas III</option>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Naik Kelas</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="naik_kelas" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->naik_kelas == 'Kelas I'){echo "selected";} ?>  value="Kelas I">Kelas I</option>
                                            <option <?php if($val->naik_kelas == 'Kelas II'){echo "selected";} ?>  value="Kelas II">Kelas II</option>
                                            <option <?php if($val->naik_kelas == 'Kelas VIP'){echo "selected";} ?>  value="Kelas VIP">Kelas VIP</option>
                                            <option <?php if($val->naik_kelas == 'Kelas VVIP'){echo "selected";} ?>  value="Kelas VVIP">Kelas VVIP</option>
                                          </select>
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Lama Hari Naik Kelas</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->lama_hari_naik_kelas; ?>" class="form-control" id="inputEmail1" placeholder="... Hari" name="lama_hari_naik_kelas">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Lama Dirawat</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->lama_dirawat; ?>" class="form-control" id="inputEmail1" placeholder="... Hari" name="lama_dirawat">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Berat Lahir</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->berat_lahir; ?>" class="form-control" id="inputEmail1" placeholder=".. Gram" name="berat_lahir">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ADL Score (Sub Acute)</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->adl_score_sub_acute ?>" class="form-control" id="inputEmail1" placeholder="" name="adl_score_sub_acute">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ADL Score (Chronic)</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->adl_score_chronic; ?>" class="form-control" id="inputEmail1" placeholder="" name="adl_score_chronic">
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
                                              <option <?php if($value_dpjp->id_data_dpjp == $val->id_dpjp){echo "selected";} ?> value="<?php echo $value_dpjp->id_data_dpjp; ?>"><?php echo $value_dpjp->nama; ?></option>
                                              <?php
                                            }


                                             ?>
                                          </select>
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Cara Pulang</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="cara_pulang" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->cara_pulang == 'Sembuh'){echo "selected";} ?> value="Sembuh">Sembuh</option>
                                            <option <?php if($val->cara_pulang == 'Pulang Paksa'){echo "selected";} ?> value="Pulang Paksa">Pulang Paksa</option>
                                            <option <?php if($val->cara_pulang == 'Meninggal'){echo "selected";} ?> value="Meninggal">Meninggal</option>
                                            <option <?php if($val->cara_pulang == 'Rujuk'){echo "selected";} ?> value="Rujuk">Rujuk</option>
                                          </select>
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis Tarif</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" name="jenis_tarif" required>
                                            <option value="">--pilih--</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas D Swasta'){echo "selected";} ?> value="Tarif Kelas D Swasta">Tarif Kelas D Swasta</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas C Swasta'){echo "selected";} ?> value="Tarif Kelas C Swasta">Tarif Kelas C Swasta</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas B Swasta'){echo "selected";} ?> value="Tarif Kelas B Swasta">Tarif Kelas B Swasta</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas A Swasta'){echo "selected";} ?> value="Tarif Kelas A Swasta">Tarif Kelas A Swasta</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas D Pemerintah'){echo "selected";} ?> value="Tarif Kelas D Pemerintah">Tarif Kelas D Pemerintah</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas C Pemerintah'){echo "selected";} ?>  value="Tarif Kelas C Pemerintah">Tarif Kelas C Pemerintah</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas B Pemerintah'){echo "selected";} ?>  value="Tarif Kelas B Pemerintah">Tarif Kelas B Pemerintah</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas A Pemerintah'){echo "selected";} ?>  value="Tarif Kelas A Pemerintah">Tarif Kelas A Pemerintah</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas B Swasta Pendidikan'){echo "selected";} ?>  value="Tarif Kelas B Swasta Pendidikan">Tarif Kelas B Swasta Pendidikan</option>
                                            <option <?php if($val->jenis_tarif == 'Tarif Kelas A Swasta Pendidikan'){echo "selected";} ?> value="Tarif Kelas A Swasta Pendidikan">Tarif Kelas A Swasta Pendidikan</option>
                                          </select>
                                      </div>
                                  </div> 


                          <header class="panel-heading">
                              Tarif Rumah Sakit
                          </header>

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sewa Poliklinik</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->sewa_poliklinik; ?>" class="form-control uang" id="inputEmail1" placeholder="" name="sewa_poliklinik">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sewa Kamar</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->sewa_kamar; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="sewa_kamar">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Laboratorium</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->laboratorium; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="laboratorium">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Rawat Intensif</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->rawat_intensif; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="rawat_intensif">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Radiologi</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->radiologi; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="radiologi">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jasa Dokter</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->jasa_dokter; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="jasa_dokter">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Pelayanan Darah</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->pelayanan_darah; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="pelayanan_darah">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Prosedur Bedah</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->prosedur_bedah; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="prosedur_bedah">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Obat</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->obat; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="obat">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Prosedur Non Bedah</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->prosedur_non_bedah; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="prosedur_non_bedah">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">BMHP</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->bmhp; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="bmhp">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Penunjang</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->penunjang; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="penunjang">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alkes</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->alkes; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="alkes">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Keperawatan</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->keperawatan; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="keperawatan">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Sewa Alat</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->sewa_alat; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="sewa_alat">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tenaga Ahli</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->tenaga_ahli; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="tenaga_ahli">
                                      </div>
                                  </div> 

                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Administrasi</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->administrasi; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="administrasi">
                                      </div>

                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Rehabilitasi</label>
                                      <div class="col-lg-4">
                                          <input type="text" value="<?php echo $val->rehabilitasi; ?>"  class="form-control uang" id="inputEmail1" placeholder="" name="rehabilitasi">
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
                                                  <option <?php if($value_diagnosa->id_data_diagnosa == $val->id_data_diagnosa_primer){echo "selected";} ?> value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
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
                                                  <option <?php if($value_diagnosa->id_data_diagnosa == $val->id_data_diagnosa_sekunder1){echo "selected";} ?> value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
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
                                                  <option <?php if($value_diagnosa->id_data_diagnosa == $val->id_data_diagnosa_sekunder2){echo "selected";} ?> value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
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
                                                  <option <?php if($value_diagnosa->id_data_diagnosa == $val->id_data_diagnosa_sekunder3){echo "selected";} ?> value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
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
                                                  <option <?php if($value_diagnosa->id_data_diagnosa == $val->id_data_diagnosa_sekunder4){echo "selected";} ?> value="<?php echo $value_diagnosa->id_data_diagnosa; ?>"><?php echo $value_diagnosa->kode .' ('. $value_diagnosa->nama.')'; ?></option>
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
                                                  <option <?php if($value_tindakan->id_data_tindakan == $val->id_data_tindakan_primer){echo "selected";} ?> value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
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
                                                  <option <?php if($value_tindakan->id_data_tindakan == $val->id_data_tindakan_sekunder1){echo "selected";} ?>  value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
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
                                                  <option <?php if($value_tindakan->id_data_tindakan == $val->id_data_tindakan_sekunder2){echo "selected";} ?>  value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
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
                                                  <option <?php if($value_tindakan->id_data_tindakan == $val->id_data_tindakan_sekunder3){echo "selected";} ?>  value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
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
                                                  <option <?php if($value_tindakan->id_data_tindakan == $val->id_data_tindakan_sekunder4){echo "selected";} ?>  value="<?php echo $value_tindakan->id_data_tindakan; ?>"><?php echo $value_tindakan->kode .' ('. $value_tindakan->nama.')'; ?></option>
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