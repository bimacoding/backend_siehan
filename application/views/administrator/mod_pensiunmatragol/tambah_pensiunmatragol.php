        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_pensiunmatragol',$attributes); ?>
          
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Matra</label>
                  <div class="col-sm-10">
                    <select name="a" class="form-control" id="kodematra"  onChange='javascript:document.getElementById("nmmatra").value=document.getElementById("kodematra").options[document.getElementById("kodematra").selectedIndex].text' onMouseOver='javascript:document.getElementById("nmmatra").value=document.getElementById("kodematra").options[document.getElementById("kodematra").selectedIndex].text'>
                      <option value="">-- Pilih Matra --</option>
                       <?php

                       $q = array(1=>'TNI AD','TNI AL','TNI AU','PNS');
                       for ($i=1; $i <=4 ; $i++) {?>
                         <option value="<?=$i?>"><?=$q[$i]?></option>
                      <?php }

                       ?>
                    </select>
                    <input type=text hidden name="b" id="nmmatra" value="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Golongan</label>
                  <div class="col-sm-10">
                    <input type="number" name="c" class="form-control" placeholder="masukan kode golongan ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" placeholder="masukan nama golongan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="e" class="form-control" placeholder="masukan jumlah ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan Pensiun</label>
                  <div class="col-sm-10">
                    <select name="f" class="form-control">
                      <option value="">-- Pilih Bulan --</option>
                        <?php

                          $q = array(1=>'Januari','Febuari','Maret','April','Mei','Juni','Agustus','Juli','September','Oktober','November','Desember');
                          for ($i=1; $i <=12; $i++) {?> 
                            <option value="<?=$i?>"><?=$q[$i]?></option>

                          <?php } ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="g" placeholder="masukan tahun">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/pensiunmatragol');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>                                               