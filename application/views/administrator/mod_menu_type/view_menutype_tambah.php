        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Type Menu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_menutype',$attributes);  ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Name Type Menu</label>
                  <div class="col-sm-10">
                    <input type="text" name="a" class="form-control" placeholder="nama type menu">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Description Type Menu</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" placeholder="Description type menu">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Template</label>
                  <div class="col-sm-10">
                    <input type='radio' name='b' value='statis'> Content&nbsp;
                    <input type='radio' name='b' value='berita'> News&nbsp;
                    <input type='radio' name='b' value='files'> Files&nbsp;
                    <input type='radio' name='b' value='gallery'> Images Gallery
                  </div>
                </div>
                
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/menutype');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>