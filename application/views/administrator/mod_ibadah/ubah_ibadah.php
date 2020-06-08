        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_ibadah',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Wilayah</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="selecProv" name="a">
                      <option value="<?=$row['wilayah']?>"> <?=$row['wilayah']?> </option>
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
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                   <select name="b" class="form-control">
                    <option value="<?=$row['kategori']?>"><?=$row['kategori']?></option>
                    <option value="VIHARA">VIHARA</option>
                    <option value="PURA">PURA</option>
                    <option value="MASJID">MASJID</option>
                    <option value="GEREJA KRISTEN">GEREJA KRISTEN</option>
                   <option value="GEREJA KATOLIK"> GEREJA KATOLIK</option>
                  </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['jumlah']?>">
                  </div>
                </div>
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/ibadah');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>