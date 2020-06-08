        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_data_covid',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Benua</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['idcountry']?>">
                    <input type="text" class="form-control" name="a" value="<?=$row['benua']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub-Benua</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['subbenua']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Negara</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['negara']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['code']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Coor</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['coord']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Longitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['long']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Latitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['lat']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/covid');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>