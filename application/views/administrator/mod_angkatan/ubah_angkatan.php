        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_angkatan',$attributes); ?>
                <div class="form-group row">
                  <input type="hidden" name="id" value="<?=$row['id']?>">
                  <label class="col-sm-2 col-form-label">Nama angkatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['nama_angkatan']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/angkatan');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>