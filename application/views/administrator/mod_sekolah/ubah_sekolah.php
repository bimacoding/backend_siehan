        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_sekolah',$attributes); ?>
               <div class="form-group row">
                <input type="hidden" name=" id" value="<?=$row['id']?>">
                  <label class="col-sm-2 col-form-label">Nomer Urut</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" value="<?=$row['nourut']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Wilayah Provinsi</label>
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
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name="c" class="form-control">
                          <option value="<?=$row['category']?>"> <?=$row['category']?> </option>
                          <option value="sd">SD</option>
                          <option value="smp">SMP</option>
                          <option value="sma">SMA</option>
                          <option value="smk">SMK</option>
                          <option value="slb">SLB</option>
                          <option value="sekolah_tinggi">SEKOLAH TINGGI</option>
                          <option value="politeknik">POLITEKNIK</option>
                          <option value="akademik">AKADEMIK</option>
                          <option value="akademik_komun">AKADEMIK KOMUNITAS</option>
                          <option value="institut">INSTITUT</option>
                          <option value="universitas">UNIVERSITAS</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori</label>
                  <div class="col-sm-10">
                    <select name="d" class="form-control">
                      <option value="<?=$row['subcategory']?>"><?=$row['subcategory']?></option>
                      <option value="swasta">SWASTA</option>
                      <option value="negeri">NEGERI</option>
                    </select>
                  </div>
                </div> 
                     
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="e" value="<?=$row['jumlah']?>">
                  </div>
                </div>              
                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/sekolah');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>