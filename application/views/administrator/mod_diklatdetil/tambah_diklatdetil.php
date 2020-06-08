        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_diklatdetil',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Matra</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="a">
                      <option value="">-- Pilih Nama Matra --</option>
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
                   <input type="text" name="b" class="form-control" placeholder="masukan nama wilayah">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Detail Wilayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" placeholder="Masukan detail wilayah">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lokasi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="Masukan lokasi">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="Masukan kategori">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Luas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="Masukan luas">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status Kepemilikan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="masukan status kepemilikan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                   <select name="h" class="form-control" required>
                     <option>-- Pilih Status -- </option>
                     <option value="1">Aktif</option>
                     <option value="2">Tidak Aktif</option>
                   </select>
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/diklatdetil');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>