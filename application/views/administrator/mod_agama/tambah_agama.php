        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_agama',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Agama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" placeholder="Masukan kode agama">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Agama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan nama agama">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/agama');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>