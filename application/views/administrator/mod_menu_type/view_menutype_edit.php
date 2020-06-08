
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Menu Type Manager</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_menutype',$attributes);  ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Name Type Menu</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$rows['id_menu_type']?>">
                    <input type='text' class='form-control' name='a' value='<?=$rows['nm_menutype']?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Description Type Menu</label>
                  <div class="col-sm-10">
                    <input type='text' class='form-control' name='c' value='<?=$rows['des_menutype']?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Template</label>
                  <div class="col-sm-10">
                    <?php if ($rows['type_menu'] == 'statis'){
                            echo "<input type='radio' name='b' value='statis' checked> Content 
                                  <input type='radio' name='b' value='berita'> News
                                  <input type='radio' name='b' value='files'> Files 
                                  <input type='radio' name='b' value='gallery'> Images Gallery";
                          }elseif($rows['type_menu'] == 'berita'){
                             echo "<input type='radio' name='b' value='statis'> Content 
                                  <input type='radio' name='b' value='berita' checked> News
                                  <input type='radio' name='b' value='files'> Files 
                                  <input type='radio' name='b' value='gallery'> Images Gallery";
                          }elseif ($rows['type_menu'] == 'files') {
                             echo "<input type='radio' name='b' value='statis'> Content 
                                  <input type='radio' name='b' value='berita'> News
                                  <input type='radio' name='b' value='files' checked> Files 
                                  <input type='radio' name='b' value='gallery'> Images Gallery";
                          }else{
                             echo "<input type='radio' name='b' value='statis' checked> Content 
                                  <input type='radio' name='b' value='berita'> News
                                  <input type='radio' name='b' value='files'> Files 
                                  <input type='radio' name='b' value='gallery' checked> Images Gallery";
                          }
                    ?>
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/menutype');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>