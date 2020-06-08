        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_mabestni',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" name="b" class="form-control" placeholder="masukan NRP">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Personel</label>
                  <div class="col-sm-10">
                   <input type="text" name="a" class="form-control" placeholder="masukan nama personel">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pangkat</label>
                  <div class="col-sm-10">
                    <select name="d" class="form-control" id="kodepangkat" onChange='javascript:document.getElementById("namapangkat").value=document.getElementById("kodepangkat").options[document.getElementById("kodepangkat").selectedIndex].text' onMouseOver='javascript:document.getElementById("namapangkat").value=document.getElementById("kodepangkat").options[document.getElementById("kodepangkat").selectedIndex].text'>
                    <option value=""> -- Pilih Pangkat --</option>
                      <?php

                      $q = $this->db->query("SELECT kd_pkt,nm_pkt FROM tbl_pkt ORDER BY kd_pkt ASC");
                      foreach ($q->result_array() as $key ) {?>
                        <option value="<?=$key['kd_pkt']?>"><?=$key['nm_pkt']?></option>
                  
                       <?php }  ?>
                    </select>
                    <input type=text hidden  name="c" id="namapangkat">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Korps</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="Masukan nama korps">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="Masukan nama jabatan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kotama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="Masukan nama kotama">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satminkal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" placeholder="Masukan nama Satminkal">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Matra</label>
                  <div class="col-sm-10">
                   <select name="i" class="form-control">
                     <option value="">-- Pilih Matra --</option>
                        <?php

                          $q = array(1=>'TNI AD','TNI AL','TNI AU','PNS');
                          for ($i=1; $i <=4 ; $i++) { ?>
                            <option value="<?=$i?>"><?=$q[$i]?></option>
                         <?php } ?>
                   </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="k" placeholder="Masukan nama Satminkal">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/pangkat');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>