        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manajemen Halaman Statis</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_halaman_statis'>Tambahkan Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>judul</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($record as $row){ ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><a href="<?php echo base_url().'halaman/statis/'.$row['seo_statis'];?>" target="_blank"><?php echo $row['judul_statis'];?></a></td>
                        <td>
                          <center>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('administrator/ubah_halaman_statis/'.$row['id_statis']); ?>'><span class='fa fa-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url('administrator/hapus_halaman_statis/'.$row['id_statis']);?>' onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'><span class='fa fa-trash'></span></a>
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