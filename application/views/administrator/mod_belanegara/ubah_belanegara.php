        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_belanegara',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nomer Urut</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" value="<?=$row['urutan']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Wilayah</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="selecProv" name="b">
                      <option value="<?=$row['wilayah']?>"><?=$row['wilayah']?></option>
                    </select>
                  </div>
                </div>
                <script type="text/javascript">
                 $(document).ready(function(){

                    $("#selecProv").select2({
                       ajax: { 
                         url: '<?= base_url() ?>/Ajax/getProvinsi',
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
                  <label class="col-sm-2 col-form-label">Pusdik</label>
                  <div class="col-sm-10">
                    <input type="text" name="c" class="form-control" value="<?=$row['pusdik']?>">
                  </div>
                </div>
   
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="d" value="<?=$row['jumlah']?>">
                  </div>
                </div> 

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['sumber']?>">
                  </div>
                </div> 

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea name="f" class="textarea"><?=$row['keterangan']?></textarea>
                  </div>
                </div>           
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/belanegara');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>