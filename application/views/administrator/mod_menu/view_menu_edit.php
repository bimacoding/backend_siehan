
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Menu Website</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_menuwebsite',$attributes);  ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Menu</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$rows['id_menu']?>">
                    <input type='text' class='form-control' name='c' value='<?=$rows['nama_menu']?>'>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Menu Type</label>
                  <div class="col-sm-10">
                   <select name='tp' class='form-control'>
                      <option value='0'>-- PILIH --</option>
                      <?php 

                      $rcx = $this->db->query("SELECT * FROM tbl_menu_type");
                      foreach ($rcx->result_array() as $rwx){
                        
                        if ($rows['id_menu_type']==$rwx['id_menu_type']) {

                          $pilih = 'selected';
                          echo "<option value='$rwx[id_menu_type]' $pilih> $rwx[nm_menutype] </option>";

                        }else{

                          echo "<option value='$rwx[id_menu_type]'> $rwx[nm_menutype] </option>";

                        } 
                      
                      }

                      ?>
                    </select>
                  </div>
                </div>



                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Link Menu</label>
                  <div class="col-sm-10">
                    <input type='hidden' name='id' value='<?=$rows['id_menu']?>'>
                    <select name='a' class='form-control'>
                      <option value='0'>-- PILIH --</option>
                      <?php 

                      $stss = $this->db->query("SELECT * FROM tbl_statis ORDER BY id_statis DESC");
                      foreach ($stss->result_array() as $rsts){
                        if ('statis/index/'.$rsts['seo_statis']==$rows['link']) {
                          $pilih = 'selected';
                          echo "<option value='statis/index/$rsts[seo_statis]' $pilih> $rsts[nm_statis] </option>";
                        }else{
                          echo "<option value='statis/index/$rsts[seo_statis]'> $rsts[nm_statis] </option>";
                        } 
                      }

                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Level Menu</label>
                  <div class="col-sm-10">
                   <select name='b' class='form-control'>
                      <option value='0'>Menu Utama</option>
                      <?php foreach ($record as $row){
                        if ($row['id_menu']==$rows['id_parent']){
                          echo "<option value='$row[id_menu]' selected>$row[nama_menu] </option>";
                        }else{
                          echo "<option value='$row[id_menu]'>$row[nama_menu]</option>";
                        }
                      } ?>
                   </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Posisi</label>
                  <div class="col-sm-10">
                    <?php if ($rows['position'] == 'Top'){
                            echo "<input type='radio' name='d' value='Top' checked> Top 
                                  <input type='radio' name='d' value='Bottom'> Bottom";
                          }else{
                            echo "<input type='radio' name='d' value='Top'> Top 
                                  <input type='radio' name='d' value='Bottom' checked> Bottom";
                          }
                    ?>
                  </div>
                </div>

                

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Urutan</label>
                  <div class="col-sm-10">
                   <input type='number' class='form-control' name='e' style='width:70px' value='<?=$rows['urutan']?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Aktif</label>
                  <div class="col-sm-10">
                    <?php if ($rows['aktif'] == 'Ya'){
                            echo "<input type='radio' name='f' value='Ya' checked> Ya 
                                  <input type='radio' name='f' value='Tidak'> Tidak";
                          }else{
                            echo "<input type='radio' name='f' value='Ya'> Ya 
                                  <input type='radio' name='f' value='Tidak' checked> Tidak";
                          }
                    ?>
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/menuwebsite');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>