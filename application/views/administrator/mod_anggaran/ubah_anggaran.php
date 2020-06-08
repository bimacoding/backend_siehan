        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_anggaran',$attributes); ?>
              <input type="hidden" name="id" value="<?php echo $row['autono']?>">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Urutan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="e" value="<?=$row['urutan']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" value="<?=$row['thang']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="<?=$row['bulan']?>"><?=$row['bulan']?></option>
                      <?php

                      $bulan = [1=>"Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus",
                                   "September","Oktober","November","Desember"];
                      for ($i=1; $i<=12 ; $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $bulan[$i];?></option>
                     <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">UO</label>
                  <div class="col-sm-10">
                     <select name="c" class="form-control">
                        <option value="<?=$row['uo']?>"><?=$row['uo']?></option>
                        <option value="KEMHAN">KEMHAN</option>
                        <option value="MABES TNI">MABES TNI</option>
                        <option value="MABES AD">MABES AD</option>
                        <option value="MABES AU">MABES AU</option>
                        <option value="MABES AL">MABES AL</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="d" value="<?=$row['kdsatker']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['nmsatker']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="g" value="<?=$row['pagu']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu Pegawai</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="i" value="<?=$row['p_pegawai']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu Barang</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k" value="<?=$row['p_barang']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu Modal</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="m" value="<?=$row['p_modal']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi </label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="h" value="<?=$row['realisasi']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi Pegawai</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="j" value="<?=$row['r_pegawai']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi Barang</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="l" value="<?=$row['r_barang']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi Modal</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="n" value="<?=$row['r_modal']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/anggaran');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>