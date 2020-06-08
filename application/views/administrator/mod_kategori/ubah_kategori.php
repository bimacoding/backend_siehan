        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/ubah_kategori',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id" value="<?=$row['id_kategori']?>">
                    <input type="text" class="form-control" name="a" value="<?=$row['judul_kategori']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Seo Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['seo_kategori']?>">
                    <small class="text-danger">tidak boleh mengunakan spasi atau spesial karakter, semua spesial karakter akan diubah menjadi (-)</small>
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/kategori');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>