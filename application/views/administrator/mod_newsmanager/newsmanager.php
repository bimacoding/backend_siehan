        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">News Manager</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_newsmanager'>Tambahkan Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php 
              $get = $this->uri->segment(3);
              if ($get=='berhasil') {
                echo "<div class='alert alert-success alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                          <strong>Berhasil !</strong> Data Berhasil diproses..
                      </div>";
              }elseif($get=='gagal'){
                echo "<div class='alert alert-danger alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                          <strong>Gagal !</strong> Data Gagal diproses..
                      </div>";
              }
              ?>
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>News Title</th>
                        <th>Categori</th>
                        <th>Created Date</th>
                        <th>Created By</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1; 
                    
                    foreach ($record as $row){ ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no;?></td>
                        <td><?=$row['judul'];?></td>
                        <td><?=ucwords(substr($row['tblnm'],4));?></td>
                        <td><?=$row['created_on'];?></td>
                        <td><?=$row['created_by'];?></td>
                        <td>
                          <center>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('administrator/ubah_newsmanager/'.$row['id'].'/'.$row['tblnm']); ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url('administrator/hapus_newsmanager/'.$row['id'].'/'.$row['tblnm']);?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
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