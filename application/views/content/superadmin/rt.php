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
                                          <th>RT</th>
                                          <th>act</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                      $no = 1;
                                      foreach($get_data->result_object() as $row){?>
                                      <tr>
                                          <td><?php echo $no; ?></td>
                                          <td><?php echo $row->nama; ?></td>
                                          <td>
                                            <a href="<?php echo $url_edit.'/'.$row->id_rt; ?>" title="Edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo $url_delete.'/'.$row->id_rt; ?>" onclick="return confirm('Apakah anda yakin?')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                            <a href="<?php echo $url_warga.'data/'.$row->id_rt; ?>" title="Hapus" class="btn btn-success btn-xs">warga</a>
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