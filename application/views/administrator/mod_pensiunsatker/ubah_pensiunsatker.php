        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_pensiunsatker',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['autono']?>">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['kode_satker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                   <input type="text" name="d" class="form-control" value="<?=$row['nama_satker']?>">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode UO</label>
                  <div class="col-sm-10">
                    <input type="number" name="a" class="form-control" value="<?=$row['kode_uo']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama UO</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="<?=$row['nama_uo']?>"><?=$row['nama_uo']?></option>
                      <option value="KEMHAN">KEMHAN</option>
                      <option value="MABES TNI">MABES TNI</option>
                      <option value="TNI AD">TNI AD</option>
                      <option value="TNI AU">TNI AU</option>
                      <option value="TNI AL">TNI AL</option>
                    </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah TNI</label>
                  <div class="col-sm-10">
                    <input type="number" name="e" class="form-control" value="<?=$row['tni']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah PNS</label>
                  <div class="col-sm-10">
                     <input type="number" name="f" class="form-control" value="<?=$row['pns']?>">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="g" class="form-control">
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
                    <input type="number" class="form-control" name="h" value="<?=$row['thnadk']?>">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/pensiunsatker');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>                                               