        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_cctv',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No Urut</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" value="<?=$row['id_kat']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Kamera</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['nama']?>">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lokasi CCTV</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" value="<?=$row['kategori']?>">
                  </div>
                </div> 

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Link </label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" value="<?=$row['link']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber </label>
                  <div class="col-sm-10">
                    <input type="text" name="e" class="form-control" value="<?=$row['sumber']?>">
                  </div>
                </div> 
               
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubahh</button>
                    <a href='<?=base_url('administrator/cctv');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>