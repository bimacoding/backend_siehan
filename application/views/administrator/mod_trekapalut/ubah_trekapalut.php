        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_trekapalut',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Matra</label>
                  <div class="col-sm-10">
                    <select name="a" class="form-control">
                      <option value="<?=$row['matra']?>"><?=$row['matra']?></option>
                      <option value="AD">TNI AD</option>
                      <option value="AU">TNI AU</option>
                      <option value="AL">TNI AL</option>
                      <option value="PNS">PNS</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name="b" class="form-control">
                      <option value="<?=$row['kategori']?>"><?=$row['kategori']?> </option>
                        <?php

                          $data = array(1=>"ANTI TANK","ARTILERI","KAVALERI","KAPAL","PESAWAT","RANPUR","SENJATA");
                          for ($i=1; $i <=7 ; $i++) { ?>
                            <option value="<?=$data[$i]?>"><?=$data[$i]?></option>
                          <?php  } ?>                         
                    </select> 
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['subkategori']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['jenis']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                      <input type="number" name="e" class="form-control" value="<?=$row['jumlah']?>">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/trekapalut');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>