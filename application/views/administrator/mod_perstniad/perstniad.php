        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Personel TNI AD </h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_perstniad'>Tambahkan Data</a>
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
              <table id="myTablex" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NRP</th>
                        <th>NAMA</th>
                        <th>JABATAN</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                </table>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <script type="text/javascript">
          $(function() {
            $('#myTablex').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                  "url":"<?=base_url().'ajax/getTniAd'?>",
                  "type": "POST"
                }
            } );
          });
        </script>