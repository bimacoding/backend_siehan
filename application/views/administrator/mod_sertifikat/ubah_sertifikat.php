        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_sertifikat',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">kategori</label>
                  <div class="col-sm-10">
                    <select name="a" class="form-control">
                        <option value="<?=$row['kategori']?>"><?=$row['kategori']?></option>
                        <option value="SERTIFIKAT">SERTIFIKAT</option>
                        <option value="BELUM SERTIFIKAT">BELUM SERTIFIKAT</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Wilayah</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                        <option value="<?=$row['wilayah']?>"><?=$row['wilayah']?></option>
                        <option value="KEMHAN">KEMHAN</option>
                        <option value="MABES TNI">MABES TNI</option>
                        <option value="MABES AD">MABES AD</option>
                        <option value="MABES AL">MABES AL</option>
                        <option value="MABES AU">MABES AU</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" value="<?=$row['tahun']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="d" class="form-control" value="<?=$row['jumlah']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/sertifikat');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>