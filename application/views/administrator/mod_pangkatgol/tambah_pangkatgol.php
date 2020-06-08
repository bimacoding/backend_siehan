        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_pangkatgol',$attributes); ?>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Golongan</label>
                  <div class="col-sm-10">
                    <input type="number" name="a" class="form-control" placeholder="masukan kode golongan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" name="b" class="form-control" placeholder="masukan nama golongan">
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Group PNS</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" placeholder="masukan group pns">
                  </div>
                </div>
                     
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat PNS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" placeholder="masukan nama pangkat pns ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Group TNI</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="masukan group tni ">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat TNI</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="masukan nama pangkat tni ">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat AD </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="masukan nama pangkat ad ">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat AL </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" placeholder="masukan nama pangkat al ">
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat AU </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" placeholder="masukan nama pangkat au ">
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gaji </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="j" placeholder="masukan nama pangkat au ">
                  </div>
                </div>                          
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/pangkatgol');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>