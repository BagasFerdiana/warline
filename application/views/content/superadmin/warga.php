      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      
                      <section class="panel">
                          <header class="panel-heading">
                             <?php echo $title; ?>
                          </header>
                          <div class="panel-body">

                          <div class="alert alert-info">
                            Hak akses user dapat dihapus dengan mengklik hak akses pada field LEVEL (NB: Hak akses warga tidak akan bisa dihapus) <br/>
                            Klik (+) untuk menambah hak akses
                          </div>


                          <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success" id="autoclose">
                              <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                          <?php } ?>
                          <?php if ($this->session->flashdata('failed')) { ?>
                            <div class="alert alert-danger" id="autoclose">
                              <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('failed'); ?>
                            </div>
                          <?php } ?>
                                <div class="clearfix">
                                    <div class="btn-group">
                                      <a id="editable-sample_new" class="btn btn-success" href="<?php echo $url_add; ?>"><i class="fa fa-plus"></i> Tambah 
                                      </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Kode Keluarga</th>
                                          <th>Username</th>
                                          <th>NIK</th>
                                          <th>Nama</th>
                                          <th>Tgl. Lahir</th>
                                          <th>Level</th>
                                          <th>act</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                      $no = 1;
                                      foreach($get_data->result_object() as $row){?>
                                      <tr>
                                          <td><?php echo $no; ?></td>
                                          <td><?php echo $row->kode_keluarga; ?></td>
                                          <td><?php echo $row->username; ?></td>
                                          <td><?php echo $row->nik; ?></td>
                                          <td><?php echo $row->nama; ?></td>
                                          <td><?php echo $row->tgl_lahir; ?></td>
                                          <td>
                                            <?php 
                                            $query = $this->db->where('id_user', $row->id_user)->get_where('level');
                                            foreach ($query->result_object() as $value) {
                                              if ($value->level <> 'warga') {
                                                $style = 'label-primary';
                                                $href  = $url_delete_level.'/'.$value->id_level;
                                                $text  = 'hapus?';
                                              }else{
                                                $style = 'label-info';
                                                $href  = '#';
                                                $text  = '';
                                              }
                                              ?>

                                              <a  title="<?php echo $text; ?>" href="<?php echo $href; ?>"><span class="label <?php echo $style; ?>"><?php echo $value->level; ?> </span> </a> <?php echo "&nbsp"; ?> 

                                              <?php
                                            }
                                             ?>
                                             <a  href="<?php echo $url_add_level; ?>/<?php echo $row->id_user; ?>"><span class="label label-danger" </span> + </a> 
                                          </td>
                                          <td>
                                            <a href="<?php echo $url_edit.'/'.$row->id_user; ?>" title="Edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo $url_delete.'/'.$row->id_user; ?>" onclick="return confirm('Apakah anda yakin?')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                          </td>
                                      </tr>
                                      <?php 
                                      $no++;
                                      } ?>
                                     </tbody>
                                    </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->