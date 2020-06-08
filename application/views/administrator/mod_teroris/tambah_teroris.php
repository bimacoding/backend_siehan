        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_teroris',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                   <select name="a" class="form-control">
                      <option value="">-- Pilih Kategori -- </option>
                      <option value="INDIVIDU">INDIVIDU</option>
                      <option value="ENTITAS">ENTITAS</option>
                   </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Teroris</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan nama teroris">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alias</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" placeholder="Masukan nama alias">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Lahir </label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="d"></textarea>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Warga Negara</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="Masukan warga negara">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="f"></textarea>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kondisi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="Masukan kondisi">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="h"></textarea>
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/teroris');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>