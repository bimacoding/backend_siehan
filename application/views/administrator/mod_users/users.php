        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Users</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_users'>Tambahkan Data</a>
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
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aktif</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($record as $row){ ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no;?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['level'];?></td>
                        <td>
                          <?php 
                            if ($row['blokir']=='N') {
                              echo "<span class='text-success'>Aktif</span>";
                            }else{
                              echo "<span class='text-danger'>Blokir</span>";
                            }
                          ?>
                        </td>
                        <td>
                          <center>
                                <?php if ($row['blokir']=='N') { 

                                  ?>
                                    <a class='btn btn-danger btn-xs' title='Blokir' href='<?php echo base_url().'administrator/blokir_users/'.$row['id_users']; ?>'><span class='fa fa-ban'></span></a>
                                <?php }else{ ?>
                                    <a class='btn btn-primary btn-xs' title='Aktif' href='<?php echo base_url().'administrator/aktif_users/'.$row['id_users']; ?>'><span class='fa fa-check'></span></a>
                                <?php } ?>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url().'administrator/ubah_users/'.$row['id_users']; ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url().'administrator/hapus_users/'.$row['id_users']; ?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
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