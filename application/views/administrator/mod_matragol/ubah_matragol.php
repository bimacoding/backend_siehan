        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_matragol',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['autono']?>">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Matra</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" value="<?=$row['kode_matra']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Matra</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="<?=$row['nama_matra']?>"><?=$row['nama_matra']?></option>
                      <option value="AD">TNI AD</option>
                      <option value="AU">TNI AU</option>
                      <option value="AL">TNI AL</option>
                      <option value="PNS">PNS</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" value="<?=$row['kode_gol']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['nama_gol']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select name="e" class="form-control">
                        <option value="<?=$row['kdkelamin']?>"><?=$row['kdkelamin']?> </option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                      <select name="f" class="form-control">
                          <option value="<?=$row['kdagama']?>"><?=$row['kdagama']?></option>
                          <?php

                          $agama = array(1=>"Islam","Kristen","Katolik","Hindu","Budha","Kong Whu cu","Lainnya");
                          for ($i=1; $i <=7 ; $i++) { ?>
                           <option value="<?=$i?>"><?=$agama[$i]?></option>
                         <?php }?>
                      </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="g" value="<?=$row['jml']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="h" class="form-control">
                        <option value="<?=$row['blnadk']?>"><?=$row['blnadk']?> </option>
                        <?php

                        $bulan = array(1=>"januari","febuari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
                        for ($i=1; $i<=12 ; $i++) {?>
                          <option value="<?=$i?>"><?=$bulan[$i]?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="i" value="<?=$row['thnadk']?>">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/matragol');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>