        <div class="col-12">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title">Master Data Rumah Sakit Detil</h3>

              <a class='float-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_rs'>Tambahkan Data</a>

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

              <table id="datatable1" class="table table-bordered table-striped">

                    <thead>

                      <tr>

                        <th style='width:20px'>No</th>

                        <th>Nama Prov</th>

                        <th>Kode Rs</th>

                        <th>Nama RS</th>

                        <th>Kelas</th>

                        <th>Jenis</th>

                        <th>Pemilik</th>

                        <th>Long</th>

                        <th>Lat</th>

                        <th style='width:70px'>Action</th>

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

          $(document).ready(function(){

            $('#datatable1').DataTable( {

                "processing": true,

                "serverSide": true,

                "ajax": {

                  "url":"<?=base_url().'ajax/getRs'?>",

                  "type": "POST"

                }

            } );

          }); // End Document Ready Function

        </script>