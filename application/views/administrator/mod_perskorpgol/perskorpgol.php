        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Personel Korp Per Golongan</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_korpgol'>Tambahkan Data</a>
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
                        <th>Satker</th>
                        <th>UO</th>
                        <th>Matra</th>
                        <th>Golongan Pangkat</th>
                        <th>Singkatan</th>
                        <th>Jumlah </th>
                        <th>Gaji</th>
                        <th>Bulan dan Tahun</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($record as $row){ ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no;?></td>
                        <td><?php echo $row['nama_satker'];?></td>
                        <td><?php echo $row['nama_uo'];?></td>
                        <th><?php echo $row['nama_matra'];?></th>
                        <th><?php echo $row['nama_gol'];?></th>
                        <th><?php echo $row['singkatan'];?></th>
                        <th><?php echo $row['jml'];?></th>
                        <th><?php echo $row['gaji'];?></th>
                        <th><?php echo $row['blnadk']."-".$row['thnadk'];?></th>
                        
                        <td>
                          <center>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('administrator/ubah_perskorpgol/'.$row['autono']); ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url('administrator/hapus_perskorpgol/'.$row['autono']);?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
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