        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_ticker_kat',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id_tick']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Ticker Ketegori<small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                   <input type="text" name="a" class="form-control" value="<?=$row['nm_kat']?>" required >
                  </div> 
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/ticker_kat');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>