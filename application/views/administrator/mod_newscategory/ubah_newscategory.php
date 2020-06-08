        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/ubah_newscategory',$attributes); ?>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">News Category Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['id_newscat']?>">
                    <input type="text" class="form-control" name="a" value="<?=$row['nm_news']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">News Table</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="b">
                      <option value="<?=$row['tb_news']?>" selected> <?=$row['tb_news']?> </option>
                      <option value="tbl_informasi" > Informasi </option>
                      <option value="tbl_ancaman"> Ancaman </option>
                      <option value="tbl_trending"> Trending </option>
                      <option value="tbl_industri"> Industri </option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Aktif</label>
                  <div class="col-sm-10">
                    <?php 
                      if ($row['aktif']=='Ya') {
                        echo "<input type='radio' name='c' value='Ya' checked> Ya
                              <input type='radio' name='c' value='Tidak'> Tidak";
                      }else{
                        echo "<input type='radio' name='c' value='Ya'> Ya
                              <input type='radio' name='c' value='Tidak' checked> Tidak";
                      }
                    ?>
                    
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/newscategory');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>