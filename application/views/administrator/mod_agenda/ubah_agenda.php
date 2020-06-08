        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_agenda',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Agenda <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <select class="form-control" name="a" required>
                      <option value="<?=$row['sub_kat']?>"> <?=$row['sub_kat']?> </option>
                      <option value="MENHAN"> MENHAN </option>
                      <option value="WAMENHAN"> WAMENHAN </option>
                    </select>
                    <small class="text-danger">*</small><small class="text-dark">pilih agenda untuk menhan atau wamen.</small>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul Agenda <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['judul']?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi Agenda</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="c"><?= html_entity_decode($row['isi'])?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterngan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['keterangan']?>">
                    <small class="text-danger">*</small><small class="text-dark">Biarkan kosong jika tidak ada keterangan.</small>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['sumber']?>">
                    <small class="text-danger">*</small><small class="text-dark">Biarkan kosong jika tidak ada sumber.</small>
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/agenda');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>