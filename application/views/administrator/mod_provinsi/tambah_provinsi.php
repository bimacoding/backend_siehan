        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_provinsi',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" placeholder="Masukan nama provinsi">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Ibu Kota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan nama ibu kota ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun Peresmian</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" placeholder="Masukan tahun peresmian ">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Luas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="Masukan luas">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/provinsi');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>