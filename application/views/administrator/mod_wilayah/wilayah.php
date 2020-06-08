        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Wilayah</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_wilayah'>Tambahkan Data</a>
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
              <table id="datatable1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Kode</th>
                        <th>Nama Provinsi</th>
                        <th>Nama Kabupaten</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Desa</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#datatable1').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                  "url":"<?=base_url().'ajax/getWilayah'?>",
                  "type": "POST"
                }
            } );
          }); // End Document Ready Function
        </script>
