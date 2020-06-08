        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_tniau',$attributes); ?>
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
                    <input type="text" class="form-control" name="b" value="<?=$row['NAMA']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['TMLAHIR']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir </label>
                  <div class="col-sm-10">
                    <input type="date" name="e" class="form-control" value="<?=$row['TGLAHIR']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Pangkat</label>
                  <div class="col-sm-10">
                    <input type="number"  name="d" class="form-control" value="<?=$row['KDPKT']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pangkat</label>
                  <div class="col-sm-10">
                    <input type="text"  name="c" class="form-control" value="<?=$row['PKT']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="g" class="form-control" value="<?=$row['KODEJAB']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="h" class="form-control" value="<?=$row['JABBARU']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Korp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" value="<?=$row['KORP']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satuan</label>
                  <div class="col-sm-10">
                    <input type="text" name="j" class="form-control" value="<?=$row['KDSAT']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-10">
                    <input type="text" name="i" class="form-control" value="<?=$row['SATUAN']?>">
                  </div>
                </div>
                <input type="hidden" name="l" value="5">
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/tni_au');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>