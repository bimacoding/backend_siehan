        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_newsmanager',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="text" name="a" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Table Berita <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <select class="form-control required" name="tbl">
                      <option value="-">-- Select Category --</option>
                      <?php  
                        $ct = $this->db->query("SELECT * FROM tbl_newscategory WHERE aktif = 'Ya'")->result_array();
                        foreach ($ct as $kat) {
                          echo "<option value=\"$kat[tb_news]\"> $kat[nm_news] </option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori<small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="text" name="b" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi newsmanager</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="c"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
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
                    <a href='<?=base_url('administrator/newsmanager');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>