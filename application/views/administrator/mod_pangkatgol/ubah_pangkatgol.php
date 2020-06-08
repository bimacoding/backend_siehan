        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_pangkatgol',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['autono']?>">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Golongan</label>
                  <div class="col-sm-10">
                    <input type="number" name="a" class="form-control" value="<?=$row['kdgol']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" name="b" class="form-control" value="<?=$row['nmgol']?>">
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Group PNS</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" value="<?=$row['group_pns']?>">
                  </div>
                </div>
                     
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat PNS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['pns']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Group TNI</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['group_tni']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat TNI</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['tni']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat AD </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['ad']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat AL </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" value="<?=$row['al']?>">
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pangkat AU </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" value="<?=$row['au']?>">
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gaji </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="j" value="<?=$row['gaji']?>">
                  </div>
                </div>                          
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/pangkatgol');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>