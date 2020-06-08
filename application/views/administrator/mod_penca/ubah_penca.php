        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_penca',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">UO</label>
                  <div class="col-sm-10">
                    <select name="a" class="form-control">
                      <option value="<?=$row['uo']?>"><?=$row['uo']?></option>
                      <option value="KEMHAN">KEMHAN</option>
                      <option value="MABES TNI">MABES TNI</option>
                      <option value="TNI AD">TNI AD</option>
                      <option value="TNI AU">TNI AU</option>
                      <option value="TNI AL">TNI AL</option>
                    </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kotama</label>
                  <div class="col-sm-10">
                    <input type="text" name="b" class="form-control" value="<?=$row['kotama']?>">
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" value="<?=$row['sumber']?>">
                  </div>
                </div>
                     
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="c" value="<?=$row['jumlah']?>">
                  </div>
                </div>              
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/penca');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>