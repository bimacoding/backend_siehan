        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_tniau',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" name="a" class="form-control" placeholder="masukan nrp">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Personel</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan nama personel">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="Masukan tempat lahir">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir </label>
                  <div class="col-sm-10">
                    <input type="date" name="e" class="form-control" placeholder="masukan tanggal lahir">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Pangkat</label>
                  <div class="col-sm-10">
                    <input type="number"  name="d" class="form-control" placeholder="masukan kode Pangkat">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pangkat</label>
                  <div class="col-sm-10">
                    <input type="text"  name="c" class="form-control" placeholder="masukan nama pangkat">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="g" class="form-control" placeholder="masukan kode jabatan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="h" class="form-control" placeholder="masukan nama jabatan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Korp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" placeholder="Masukan nama korp">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satuan</label>
                  <div class="col-sm-10">
                    <input type="text" name="j" class="form-control" placeholder="masukan kode satuan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-10">
                    <input type="text" name="i" class="form-control" placeholder="masukan nama satuan">
                  </div>
                </div>

                  <input type="hidden" name="l" value="5">

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/tni_au');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>