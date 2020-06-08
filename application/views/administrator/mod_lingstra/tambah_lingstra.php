        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_lingstra',$attributes); ?>
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                  <input type="text" name="a" class="form-control" placeholder="masukan tahun">
                  </div>  
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">kategori Kasus</label>
                  <div class="col-sm-10">
                   <select name="b" class="form-control">
                    <option value=""> -- Pilih Kategori --</option>
                    <?php

                      $q = array(1=>'TERORIS','NARKOBA','PENYAKIT','BENCANA','SIBER','PEROMPAKAN','PERBATASAN','KARHUTLA');
                      for ($i=1; $i <=8 ; $i++) { ?>
                       <option value="<?=$q[$i]?>"><?=$q[$i]?></option>
                     <?php } ?>
          
                  </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Wilayah</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" placeholder="masukan wilayah">
                  </div>
                </div>                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kasus</label>
                  <div class="col-sm-10">
                   <input type="text" name="d" class="form-control" placeholder="Masukan Jenis Kasus">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="e" placeholder="Masukan jumlah kasus">
                  </div>
                </div>

                
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/lingstra');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>