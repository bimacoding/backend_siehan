        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_matragol',$attributes); ?>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Matra</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" placeholder="Masukan Kode Matra">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Matra</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="">-- Pilih Matra --</option>
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
                    <input type="number" name="c" class="form-control" placeholder="masukan kode golongan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="masukan nama golongan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select name="e" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin -- </option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                      <select name="f" class="form-control">
                          <option value="">-- Pilih Agama --</option>
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
                    <input type="number" class="form-control" name="g" placeholder="masukan jumlah">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="h" class="form-control">
                        <option value="">-- Pilih Bulan -- </option>
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
                    <input type="number" class="form-control" name="i" placeholder="masukan tahun">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/matragol');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>