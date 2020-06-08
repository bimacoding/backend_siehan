        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">News Category Manager</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_newscategory'>Tambahkan Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>News Category</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Created By</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($record as $row){ ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?=$row['nm_news']?></td>
                        <td>
                          <?php 
                            if ($row['aktif']=='Ya') {
                              echo "<span style='color:green;'>Active</span>";
                            }else{
                              echo "<span style='color:red;'>Non-Active</span>";
                            }
                          ?>
                        </td>
                        <td><?=tgl_indo($row['created_on'])?></td>
                        <td><?=$row['created_by']?></td>
                        <td>
                          <center>
              <a class='btn btn-primary btn-xs' title='view data' href='<?php echo base_url().'administrator/'.substr($row['tb_news'],4); ?>'><span class='fa fa-search'></span></a>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('administrator/ubah_newscategory/'.$row['id_newscat']); ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url('administrator/hapus_newscategory/'.$row['id_newscat']);?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
                          </center>
                        </td>
                      </tr>
                    <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>