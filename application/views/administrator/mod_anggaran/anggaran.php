
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master Data Anggaran</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_anggaran'>Tambahkan Data</a>
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
              <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>UO</th>
                        <th>Nama Satker </th>
                        <th>Pagu</th>
                        <th>Realisasi</th>
                        <th>P. Pegawai</th>
                        <th>R. Pegawai</th>
                        <th>P. Barang</th>
                        <th>R. Barang</th>
                        <th>P. MOdal</th>
                        <th>R. Modal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <script type="text/javascript">
          $(function() {
            $('#myTable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                  "url":"<?=base_url().'ajax/getAnggaran'?>",
                  "type": "POST"
                }
            } );

            // // Setup - add a text input to each footer cell
            // $('#myTable tfoot th').each( function () {
            //     var title = $(this).text();
            //     var inp   = '<input type="text" class="form-control" placeholder="Search '+ title +'" />';
            //     $(this).html(inp);
            // } );
         
            // // DataTable
            // var table = $('#myTable').DataTable({
            //                 "processing": true,
            //                 "serverSide": true,
            //                 "ajax": {
            //                     "url":"isi url nya",
            //                     "type": "POST"
            //                 }
            //             });
         
            // // Apply the search
            // table.columns().every( function () {
            //     var that = this;
         
            //     $( 'input', this.footer() ).on( 'keyup change', function () {
            //         if ( that.search() !== this.value ) {
            //             that
            //                 .search( this.value )
            //                 .draw();
            //         }
            //     } );
            // } );
          });
        </script>