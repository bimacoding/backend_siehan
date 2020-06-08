        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_tanah/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                   <select name="a" class="form-control" readonly="on">
                      <option value="<?=strtoupper($this->uri->segment(4))?>" selected> <?=strtoupper($this->uri->segment(4))?> </option>
                      <option value="bangunan">BANGUNAN</option>
                      <option value="tanah">TANAH</option>
                   </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Bidang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="Masukan nama agama">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">UO</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control" readonly="on">
                        <option value="<?=str_replace('-',' ', strtoupper($this->uri->segment(3)))?>" selected> <?=str_replace('-',' ', strtoupper($this->uri->segment(3)))?> </option>
                        <option value="KEMHAN">KEMHAN</option>
                        <option value="MABES TNI">MABES TNI</option>
                        <option value="MABES AD">MABES AD</option>
                        <option value="MABES AL">MABES AL</option>
                        <option value="MABES AU">MABES AU</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kotama</label>
                  <div class="col-sm-10">
                       <input type="text" name="c" class="form-control" placeholder="masukan nama kotama">
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber</label>
                  <div class="col-sm-10">
                       <input type="text" name="f" class="form-control" placeholder="masukan nama kodama">
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nilai</label>
                  <div class="col-sm-10">
                    <input type="number" name="e" class="form-control" placeholder="masukan nilai">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/tanah');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>