        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_kekuatan',$attributes); ?>
                <input type="hidden" name="id" value="<?=$row['id']?>">
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Benua</label>
                  <div class="col-sm-10">
                   <select name="a" class="form-control">
                   <option value="<?=$row['benua']?>"><?=$row['benua']?></option>
                  </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Benua</label>
                  <div class="col-sm-10">
                   <select name="b" class="form-control">
                    <option value="<?=$row['subbenua']?>"><?=$row['subbenua']?></option>
                  </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Negara</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="selecNegara" name="c">
                      <option value="<?=$row['negara']?>"><?=$row['negara']?></option>
                    </select>
                  </div>
                </div>
                <script type="text/javascript">
                 $(document).ready(function(){

                    $("#selecNegara").select2({
                       ajax: { 
                         url: '<?= base_url() ?>/Ajax/getNegara',
                         type: "post",
                         dataType: 'json',
                         delay: 250,
                         data: function (params) {
                            return {
                              searchTerm: params.term
                            };
                         },
                         processResults: function (response) {
                            return {
                               results: response
                            };
                         },
                         cache: true
                       }
                   });
                 });
                </script>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                   <input type="text" name="d" class="form-control" value="<?=$row['category']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['subcategory']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kekuatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['strength']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/kekuatan');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>