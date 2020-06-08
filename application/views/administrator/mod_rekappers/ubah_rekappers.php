        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_rekappers',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama UO</label>
                  <div class="col-sm-10">
                   <select name="a" class="form-control"> 
                      <option value="<?=$row['uo']?>"><?=$row['uo']?></option>
                      <?php

                        $q = array(1=>'KEMHAN','MABES TNI','TNI AD','TNI AL','TNI AU');
                        for($i=1; $i<=5;$i++){?>
                          <option value="<?=$i?>"><?=$q[$i]?></option>
                       <?php  } ?>
                   </select>
                  </div>
                </div>

                <input type="hidden" name="b" value="1">

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Matra</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="g" required>
                      <option value="<?=$row['nama_matra']?>"><?=$row['nama_matra']?></option>
                      <?php

                      $matra = array(1=>"TNI AD","TNI AL","TNI AU","PNS");
                      for ($i=1; $i <=4 ; $i++) {?> 
                        <option value="<?=$matra[$i]?>"><?=$matra[$i]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <select name="d" class="form-control" id="kdgol" onChange='javascript:document.getElementById("nmgol").value=document.getElementById("kdgol").options[document.getElementById("kdgol").selectedIndex].text' onMouseOver='javascript:document.getElementById("nmgol").value=document.getElementById("kdgol").options[document.getElementById("kdgol").selectedIndex].text'>
                      
                      <option value="<?=$row['kode_gol']?>"><?=$row['nama_gol']?> </option>
                      <?php

                        $qu = $this->db->query("SELECT kode_gol ,nama_gol FROM tbl_rekappers ORDER BY kode_gol ASC");
                          foreach ($qu->result_array() as $key ) {?>
                            <option value="<?=$key['kode_gol']?>"><?=$key['nama_gol']?></option>
                      <?php  } ?>
                    </select>
                    <input type=text hidden name="f" id="nmgol" value="<?=$row['nama_gol']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Singkatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="e" class="form-control" value="<?=$row['singkatan']?>">
                  </div>
                </div>

                <!-- <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="number" name="h" class="form-control" placeholder="masukan jumlah sub satker">
                  </div>
                </div>
 -->

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="h" class="form-control" value="<?=$row['jumlah']?>">
                  </div>
                </div>

                

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/rekappers');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>