        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','encytype'=>'multipart/form-data');
              echo form_open_multipart('administrator/ubah_files',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$row['judul']?>" name="a">
                  </div>
                </div>

                
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tentang</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name="b" value="<?=$row['tentang']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="c"><?=$row['ket']?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">File Saat ini</label>
                  <div class="col-sm-10">
                    <a href="<?=base_url().'files_download/'.$row['files']?>" target="_blank"><?=$row['files']?></a>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">File</label>
                  <div class="col-sm-10">
                   <input type="file" name="d" class="form-control">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/files');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>