        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_newsmanager',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <input type="hidden" name="tblx" value="<?=$this->uri->segment(4)?>">
                    <input type="text" name="a" class="form-control" value="<?=$row['judul']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Table Berita <small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <select class="form-control required" name="tbl">
                      <?php  
                        $ct = $this->db->query("SELECT * FROM tbl_newscategory WHERE aktif = 'Ya'")->result_array();
                        foreach ($ct as $kat) {
                          if ($kat['tb_news']==$this->uri->segment(4)) {
                             $pilih = 'selected';
                             echo "<option value=\"$kat[tb_news]\" $pilih> $kat[nm_news] </option>";
                          }else{
                             echo "<option value=\"$kat[tb_news]\"> $kat[nm_news] </option>";
                          }
                         
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori<small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                    <input type="text" name="b" class="form-control" value="<?=$row['kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi newsmanager</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="c"><?=$row['isi']?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
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
                    <a href='<?=base_url('administrator/newsmanager');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>