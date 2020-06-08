        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_pangkat',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Pangkat</label>
                  <div class="col-sm-10">
                    <input type="text" name="a" class="form-control" placeholder="masukan kode pangkat">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat</label>
                  <div class="col-sm-10">
                   <input type="text" name="b" class="form-control" placeholder="masukan nama pangkat">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Eselon</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="c" placeholder="Masukan eselon">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="Masukan golongan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Golongan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="e" placeholder="Masukan kode golongan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="Masukan nama golongan">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/pangkat');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>