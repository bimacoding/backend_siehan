        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Satker</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_mastersatker'>Tambahkan Data</a>
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
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama UO</th>
                        <th>Nama Kotama</th>
                        <th>Nama Satker</th>
                        <th>Nama Subsatker</th>
                        <th>Alamat</th>
                        <th>X Coordinate</th>
                        <th>Y Coordinate</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($record as $row){ ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no;?></td>
                        <td><?php echo $row['nm_uo']?></td>
                        <td><?php echo $row['nm_kotama']?></td>
                        <td><?php echo $row['nm_satker']?></td>
                        <td><?php echo $row['nm_subsatker']?></td>
                        <td><?php echo $row['alamat'];?></td>
                        <td><?php echo $row['x_coord']?></td>
                        <td><?php echo $row['y_coord']?></td>
                        <td>
                          <center>
                                   <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('administrator/ubah_mastersatker/'.$row['id']); ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url('administrator/hapus_mastersatker/'.$row['id']);?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
                          </center>
                        </td>
                      </tr>
                    <?php $no++; } ?>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>