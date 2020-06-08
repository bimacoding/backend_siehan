        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/ubah_mastersatker',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode UO</label>
                  <div class="col-sm-10">
                    <input type="number" name="a" class="form-control" value="<?=$row['kd_uo']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama UO</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="<?=$row['nm_uo']?>"><?=$row['nm_uo']?></option>
                      <?php

                      $uo = array(1=>"KEMHAN","MABESTNI","TNI AD","TNI AU","TNI AL");
                      for ($i=1; $i <=5 ; $i++) { ?>
                        <option value="<?=$uo[$i]?>"><?=$uo[$i]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Kotama</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" value="<?=$row['kd_kotama']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Kotama</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" value="<?=$row['nm_kotama']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker</label>
                  <div class="col-sm-10">
                    <input type="number" name="e" class="form-control" value="<?=$row['kd_satker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <input type="text" name="f" class="form-control" value="<?=$row['nm_satker']?>" >
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="number" name="g" class="form-control" value="<?=$row['kd_subsatker']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="text" name="h" class="form-control" value="<?=$row['nm_subsatker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker Simak</label>
                  <div class="col-sm-10">
                    <input type="number" name="i" class="form-control" value="<?=$row['kd_satker_simak']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                   <textarea name="j" class="textarea"><?=$row['alamat']?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">X Coordinate</label>
                  <div class="col-sm-10">
                    <input type="text" name="l" class="form-control" value="<?=$row['x_coord']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Y Coordinate</label>
                  <div class="col-sm-10">
                    <input type="text" name="m" class="form-control" value="<?=$row['y_coord']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="k"><?=$row['keterangan']?></textarea>
                  </div>
                </div>
                           
                <hr>  
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/mastersatker');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>