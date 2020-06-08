        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_anggarantotal',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No Urut</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" placeholder="Masukan No.Indeks ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="b" placeholder="Masukan Tahun ">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">UO</label>
                  <div class="col-sm-10">
                    <select name="c" class="form-control">
                      <option value="">-- Pilih UO -- </option>
                      <option value="KEMHAN">KEMHAN</option>
                      <option value="MABES TNI">MABES TNI</option>
                      <option value="TNI AD">TNI AD</option>
                      <option value="TNI AU">TNI AU</option>
                      <option value="TNI AL">TNI AL</option>
                    </select>
                  </div>
                </div> 

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="d" class="form-control" placeholder="masukan jumlah ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber </label>
                  <div class="col-sm-10">
                    <input type="text" name="f" class="form-control" placeholder="masukan nama sumber">
                  </div>
                </div> 

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan </label>
                  <div class="col-sm-10">
                    <textarea name="e" class="textarea"> </textarea>
                  </div>
                </div> 
               
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/anggarantotal');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>