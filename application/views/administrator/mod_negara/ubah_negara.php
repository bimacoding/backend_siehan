        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_negara',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Wilayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" value="<?=$row['kdwilayah']?>">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Wilayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['wilayah']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/negara');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>