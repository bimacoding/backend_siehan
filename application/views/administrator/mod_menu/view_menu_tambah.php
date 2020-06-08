
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Menu Website</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_menuwebsite',$attributes);  ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Menu</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" placeholder="nama Menu">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Menu Type</label>
                  <div class="col-sm-10">
                   <select name='tp' class='form-control'>
                      <option value='0'>-- PILIH --</option>
                      <?php 
                      $rc = $this->db->query("SELECT * FROM tbl_menu_type ORDER BY id_menu_type DESC")->result_array();
                      foreach ($rc as $rw){
                          echo "<option value='$rw[id_menu_type]'>$rw[nm_menutype]</option>";
                      } ?>
                    </select>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Link Menu</label>
                  <div class="col-sm-10">
                    <select name='a' class='form-control'>
                      <option value='0'>-- PILIH --</option>
                      <?php 

                      $stss = $this->db->query("SELECT * FROM tbl_statis ORDER BY id_statis DESC");
                      foreach ($stss->result_array() as $rsts){
                        echo "<option value='statis/index/$rsts[seo_statis]'> $rsts[nm_statis] </option>";
                      }

                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Level Menu</label>
                  <div class="col-sm-10">
                   <select name='b' class='form-control'>
                      <option value='0' selected>Menu Utama</option>
                      <?php foreach ($record as $row){
                          echo "<option value='$row[id_menu]'>$row[nama_menu]</option>";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Posisi</label>
                  <div class="col-sm-10">
                    <input type='radio' name='d' value='Top'> Top <input type='radio' name='d' value='Bottom'> Bottom
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Urutan</label>
                  <div class="col-sm-10">
                   <input type="number" name="e" class="form-control">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Aktif</label>
                  <div class="col-sm-10">
                    <input type='radio' name='f' value='Ya'> Ya 
                    <input type='radio' name='f' value='Tidak'> Tidak
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/menuwebsite');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>