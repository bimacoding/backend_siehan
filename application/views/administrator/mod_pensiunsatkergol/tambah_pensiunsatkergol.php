        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_pensiunsatkergol',$attributes); ?>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode UO</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" placeholder="Masukan kode uo">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama UO</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="">-- Pilih UO --</option>
                      <option value="KEMENTRIAN PERTAHANAN">KEMHAN</option>
                      <option value="MABES TNI">MABES TNI</option>
                      <option value="MABES AD">TNI AD</option>
                      <option value="MABES AU">TNI AU</option>
                      <option value="MABES AL">TNI AL</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker</label>
                  <div class="col-sm-10">
                   <input type="number" name="c" class="form-control" placeholder="masukan kode satker">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="masukan nama satker">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Golongan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="e" placeholder="masukan kode golongan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="masukan nama golongan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">nama Golongan TNI</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="masukan nama golongan tni">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah TNI</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="h" placeholder="Masukan jumlah tni">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah PNS</label>
                  <div class="col-sm-10">
                      <input type="number" name="i" class="form-control" placeholder="masukan jumlah pns">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                      <select name="j" class="form-control">
                          <option value="">-- Pilih Bulan --</option>
                          <?php

                          $bulan = array(1=>"januari","febuari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
                          for ($i=1; $i <=12 ; $i++) { ?>
                            <option value="<?=$i?>"><?=$bulan[$i]?></option>
                          <?php } ?>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                      <input type="number" name="k" class="form-control" placeholder="masukan tahun">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/pensiunsatkergol');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>