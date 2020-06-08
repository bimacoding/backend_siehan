        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/tambah_mastersatker',$attributes); ?>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode UO</label>
                  <div class="col-sm-10">
                    <input type="number" name="a" class="form-control" placeholder="masukan kode uo">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama UO</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="">-- Pilih UO --</option>
                      <?php
                      $uo = array(1=>"KEMHAN","MABESTNI","TNI AD","TNI AU","TNI AL");
                      for ($i=1; $i <=5 ; $i++) { ?>
                        <option value="<?=$uo[$i]?>"><?=$uo[$i]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Kotama</label>
                  <div class="col-sm-10">
                    <input type="number" name="c" class="form-control" placeholder="masukan kode kotama">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Kotama</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" placeholder="masukan nama kotama">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker</label>
                  <div class="col-sm-10">
                    <input type="number" name="e" class="form-control" placeholder="masukan kode satker">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <input type="text" name="f" class="form-control" placeholder="masukan kode satker">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="number" name="g" class="form-control" placeholder="masukan kode sub Satker">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="text" name="h" class="form-control" placeholder="masukan nama sub satker">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Satker Simak</label>
                  <div class="col-sm-10">
                    <input type="number" name="i" class="form-control" placeholder="masukan kode satker simak">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="j" class="textarea"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">X Coordinate</label>
                  <div class="col-sm-10">
                    <input type="number" name="l" class="form-control" placeholder="masukan x coordinate">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Y Coordinate</label>
                  <div class="col-sm-10">
                    <input type="number" name="m" class="form-control" placeholder="masukan Y Coordinate">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="k"></textarea>
                  </div>
                </div>
                           
                <hr>  
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/mastersatker');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>