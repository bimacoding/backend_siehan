        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_perskorp',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Korp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" max="3" >
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Korp 2</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" placeholder="Masukan kode korp 2">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Korp </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" placeholder="Masukan nama korp ">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Singkatan </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan nama singkatan ">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/perskorp');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>