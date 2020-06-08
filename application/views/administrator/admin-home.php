    

    <!-- Main content -->

      <div class="container-fluid">

        <!-- Info boxes -->

        <div class="row">

          <div class="col-12 col-sm-12 col-md-4">

            <div class="info-box mb-3">

              <span class="info-box-icon bg-warning elevation-1"><i class="far fa-user"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Pengguna</span>

                <span class="info-box-number">2</span>

              </div>

            </div>

          </div>

          



          <div class="col-12 col-sm-12 col-md-4">

            <div class="info-box">

              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Berita</span>

                <span class="info-box-number">

                  100

                </span>

              </div>

            </div>

          </div>



          <!-- fix for small devices only -->

          <div class="clearfix hidden-md-up"></div>



          <div class="col-12 col-sm-12 col-md-4">

            <div class="info-box mb-3">

              <span class="info-box-icon bg-success elevation-1"><i class="far fa-comments"></i></span>



              <div class="info-box-content">

                <span class="info-box-text">Trending</span>

                <span class="info-box-number">760</span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </div><!--/. container-fluid -->

    <!-- /.content -->



    <section class="col-lg-12 connectedSortable">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title">Tombol Cepat</h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

      <p>

        Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda atau pilih ikon-ikon pada Control Panel di bawah ini : 

      </p>

      <a href="<?php echo base_url(); ?>administrator/agenda" class='btn btn-app btn-md'><i class='fa fa-calendar'></i> Agenda</a>

      <a href="<?php echo base_url(); ?>administrator/informasi" class='btn btn-app btn-md'><i class='fa fa-file'></i> Informasi</a>

      <a href="<?php echo base_url(); ?>administrator/trending" class='btn btn-app btn-md'><i class='fa fa-star'></i> Trending</a>

      <a href="<?php echo base_url(); ?>administrator/industri" class='btn btn-app btn-md'><i class='fa fa-cubes'></i> Industri</a>

      <a href="<?php echo base_url(); ?>administrator/files" class='btn btn-app btn-md'><i class='fa fa-folder-open'></i> Document</a>

    </div>

  </div>

</section><!-- /.Left col -->

<!--  -->

<section class="col-lg-12 connectedSortable">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title">Last Update Wilayah</h3>

            </div>

             <!--  Last update start -->
             <div class="card-body">

                 <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th style='width:20px'>Id</th>
                            <th>Kode</th>
                            <th>Nama Provinsi</th>
                            <th>Nama Kabupaten</th>
                            <th>Nama Kecamatan</th>
                            <th>Nama Desa</th>
                            <th>Modified By</th>
                            <th>Modified On</th>
                          </tr>
                        </thead>
                    </table>

                  </div>
              </div>

             <!-- Last update end -->

</section><!-- /.Left col -->

<script type="text/javascript">

  $(document).ready(function(){

    $('#datatable1').DataTable( {

        "processing": true,

        "serverSide": true,

        "info": true,

        "searching": false,

        "order": [7, 'desc'],

        "ajax": {

          "url":"<?=base_url().'ajax/last_update'?>",

          "type": "POST"

        }

    } );

  }); // End Document Ready Function

</script>

