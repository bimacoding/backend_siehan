
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Pangakat Personel Per Golongan</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_pangakatgol'>Tambahkan Data</a>
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
                        <th>Kode Golongan</th>
                        <th>Golongan</th>
                        <th>Group PNS</th>
                        <th>Nama Pangkat PNS</th>
                        <th>Group TNI</th>
                        <th>Nama Pangkat TNI</th>
                        <th>Nama Pangkat AD</th>
                        <th>Nama Pangkat AL</th>
                        <th>Nama Pangkat AU</th>
                        <th>Gaji</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($record as $row){ ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no;?></td>
                        <td><?php echo $row['kdgol'];?></td>
                        <td><?php echo $row['nmgol'];?></td>
                        <td><?php echo $row['group_pns'];?></td>
                        <td><?php echo $row['pns'];?></td>
                        <td><?php echo $row['group_tni'];?></td>
                        <th><?php echo $row['tni'];?></th>
                        <th><?php echo $row['ad'];?></th>
                        <th><?php echo $row['al'];?></th>
                        <th><?php echo $row['au'];?></th>
                        <th><?php echo number_format($row['gaji']);?></th>
                        <td>
                          <center>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('administrator/ubah_pangkatgol/'.$row['autono']); ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url('administrator/hapus_pangkatgol/'.$row['autono']);?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
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