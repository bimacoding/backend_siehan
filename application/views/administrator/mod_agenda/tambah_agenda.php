        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_agenda',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Agenda <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <select class="form-control" name="a" required>
                      <option value="-">-- PILIH AGENDA --</option>
                      <option value="MENHAN"> MENHAN </option>
                      <option value="WAMENHAN"> WAMENHAN </option>
                    </select>
                    <small class="text-danger">*</small><small class="text-dark">pilih agenda untuk menhan atau wamen.</small>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul Agenda <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan judul agenda" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi Agenda</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="c"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterngan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="Masukan Keterangan Singkat">
                    <small class="text-danger">*</small><small class="text-dark">Biarkan kosong jika tidak ada keterangan.</small>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="Masukan Keterangan Singkat">
                    <small class="text-danger">*</small><small class="text-dark">Biarkan kosong jika tidak ada sumber.</small>
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/agenda');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>