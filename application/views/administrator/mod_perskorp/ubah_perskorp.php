        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_perskorp',$attributes); ?>
              <input type="hidden" name="id" max="3" value="<?=$row['KDKORP']?>">
                  
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Korp </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" max="10" value="<?=$row['KDKORP2']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Korp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['NMKORP2']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Singkatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['NMKORP']?>">
                  </div>
                </div>

                
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/perskorp');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>