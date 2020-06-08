        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_anggaran',$attributes); ?>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Urutan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="e" placeholder="Masukan Urutan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" placeholder="Masukan Tahun">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="">-- Pilih Bulan --</option>
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
                        <option value="">-- Pilih UO --</option>
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
                    <input type="number" class="form-control" name="d" placeholder="Masukan Kode Satker">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="Masukan Nama Satker">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="g" placeholder="Masukan Pagu">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu Pegawai</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="i" placeholder="Masukan  Pagu Pegawai">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu Barang</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k" placeholder="Masukan Pagu Barang">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pagu Modal</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="m" placeholder="Masukan Pagu Modal">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi </label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="h" placeholder="Masukan Realisasi">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi Pegawai</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="j" placeholder="Masukan Realisasi Pegawai">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi Barang</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="l" placeholder="Masukan Realisasi Barang">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Realisasi Modal</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="n" placeholder="Masukan Realisasi Modal">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/anggaran');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>