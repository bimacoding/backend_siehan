        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_perstnial',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['row_id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" name="a" class="form-control" value="<?=$row['NRP']?>">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Personel</label>
                  <div class="col-sm-10">
                   <input type="text" name="b" class="form-control" value="<?=$row['NAMA']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['TMLAHIR']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="i" value="<?=$row['LAHIR']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pangkat</label>
                  <div class="col-sm-10">
                    <select name="d" class="form-control" id="kdpangkat" onChange='javascript:document.getElementById("nmpangkat").value=document.getElementById("kdpangkat").options[document.getElementById("kdpangkat").selectedIndex].text'onMouseOver='javascript:document.getElementById("nmpangkat").value=document.getElementById("kdpangkat").options[document.getElementById("kdpangkat").selectedIndex].text' >
                      
                      <option value="<?=$row['KDPKT']?>"><?=$row['PKT']?></option>
                      <?php

                        $qu = $this->db->query("SELECT kd_pkt,nm_pkt FROM tbl_pkt ORDER BY kd_pkt ASC");
                        foreach ($qu->result_array() as $key ) {?>
                          <option value="<?=$key['kd_pkt']?>"><?=$key['nm_pkt']?></option>
                       <?php } ?>
                    </select>
                    <input type=text hidden name="c" id="nmpangkat" value="<?=$row['PKT']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Korp</label>
                  <div class="col-sm-10">
                    <input type="text" name="e" class="form-control" value="<?=$row['KORPS']?>">
                  </div>
                </div>

                <input type="hidden" name="f" value="5">

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="m" class="form-control" value="<?=$row['JABATAN']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kotama</label>
                  <div class="col-sm-10">
                    <input type="text" name="j" class="form-control" value="<?=$row['KOTAMA']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satminkal</label>
                  <div class="col-sm-10">
                    <input type="text" name="k" class="form-control" value="<?=$row['SATMINKAL']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satminkal 1</label>
                  <div class="col-sm-10">
                    <input type="text" name="l" class="form-control" value="<?=$row['SATMINKAL1']?>">
                  </div>
                </div>


                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/perstnial');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>