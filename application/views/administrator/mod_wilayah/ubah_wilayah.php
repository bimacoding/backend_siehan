        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

               <?php echo($_SESSION['username']); ?>
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/ubah_wilayah',$attributes); ?>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Wilayah</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['autono']?>">
                    <input type="text" class="form-control" name="a" value="<?=$row['kode']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['kd_prov']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Kabupaten</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['kd_kab']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['kd_kec']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Negara</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['negara']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['provinsi']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kabupaten</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['kabupaten']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" value="<?=$row['kecamatan']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Desa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" value="<?=$row['desa']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Longitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="j" value="<?=$row['kor_long']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lattitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" value="<?=$row['kor_lat']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="l" value="<?=$row['keterangan']?>">
                  </div>
                </div>

               

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='<?=base_url('administrator/wilayah')?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>