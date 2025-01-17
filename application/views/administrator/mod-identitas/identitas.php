        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Logo Website</h3>
            </div>
              
            <div class="card-body">

              <?php 
              $get = $this->uri->segment(4);
              $logo = $this->db->query("SELECT logo FROM tbl_identitas WHERE id_identitas = 1 ORDER BY id_identitas LIMIT 1")->row_array();
              echo "<center><img src='".base_url()."/assets/images/$logo[logo]' width='100' class='img-thumbnail'></center>";
              ?>


              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/add_logo',$attributes); ?>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="file" class="form-control" name="logo" id="logos">
                    <small class="text-dark">upload logo dengan pixel (square) cth: 200px x 200px, format hanya boleh .png max size 1 Mb</small>
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info' id="tombol">Simpan</button>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <div class="col-9">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php 
              $get = $this->uri->segment(4);
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
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/identitaswebsite',$attributes); ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Website</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['id_identitas']?>">
                    <input type="text" name="a" class="form-control" value="<?=$row['nama_website']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b"  value="<?=$row['email']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Token API</label>
                  <div class="col-sm-10">
                    <input type="text" name="key" class="form-control" value="<?=$row['key']?>">
                   
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" value="<?=$row['url']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No.Telp</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" value="<?=$row['no_telp']?>">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Meta Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['meta_deskripsi']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Meta Keyword</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['meta_keyword']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Favicon Saat ini</label>
                  <div class="col-sm-10">
                    <img src="<?php echo base_url().'assets/images/'.$row['favicon']?>" width="50">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Favicon</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="g">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Maps</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" value="<?=$row['maps']?>">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/identitaswebsite');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>