
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Menu Type Manager</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_menutype'>Tambahkan Data</a>
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
                        <th>Menu Type Name</th>
                        <th>Menu Type Description</th>
                        <th>Created On</th>
                        <th>Created By</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nm_menutype]</td>
                              <td>$row[des_menutype]</td>
                              <td>$row[dibuat]</td>
                              <td>$row[oleh]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_menutype/$row[id_menu_type]'><span class='fa fa-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_menutype/$row[id_menu_type]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='fa fa-trash'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>