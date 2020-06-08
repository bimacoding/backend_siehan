        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_diklatdetil',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Matra</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="a">
                      <option value="<?=$row['matra']?>"><?=$row['matra']?></option>
                      <?php 

                      $matra = array(1=>"KEMHAN","MABES TNI","TNI AD","TNI AU","TNI AL");
                      for ($i=1; $i <=5 ; $i++) {?> 
                        <option value="<?=$matra[$i]?>"><?=$matra[$i]?></option>
                     <?php } ?>  
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Wilayah</label>
                  <div class="col-sm-10">
                   <input type="text" name="b" class="form-control" value="<?=$row['wilayah']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Detail Wilayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['subwilayah']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lokasi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['lokasi']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Luas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['luas']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status Kepemilikan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['status']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select name="h" class="form-control">
                      <option value="<?=$row['sts']?>"><?=$row['sts']?></option>
                      <option value="1">Aktif</option>
                      <option value="2">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/diklatdetil');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>