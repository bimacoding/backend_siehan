        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_ticker',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Ticker<small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                   <input type="text" name="a" class="form-control" value="<?=$row['nm_ticker']?>" required >
                  </div> 
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori Ticker<small class="text-danger">*</small></label>
                  <div class="col-sm-10">
                   <select class="form-control" name="kt">
                     <option value="-">-- PILIH KATEGORI --</option>
                     <?php   
                        $qkat = $this->db->query("SELECT * FROM tbl_ticker_kat ORDER BY id_tick DESC")->result_array();
                        foreach ($qkat as $d) {
                          if ($row['id_tick']==$d['id_tick']) {
                            $pilih = 'selected';
                            echo "<option value='$d[id_tick]' $pilih> $d[nm_kat] </option>";
                          }else{
                            echo "<option value='$d[id_tick]'> $d[nm_kat] </option>";
                          }
                        }
                     ?>
                   </select>
                  </div> 
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['des_ticker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select name="c" class="form-control">
                      <option value="<?=$row['aktif']?>"><?=$row['aktif']?></option>
                      <option value="Ya">Aktif</option>
                      <option value="Tidak">Tidak Aktif</option>
                    </select>
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/ticker');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>