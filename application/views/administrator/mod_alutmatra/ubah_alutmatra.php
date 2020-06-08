        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_alutmatra',$attributes); ?>
              <div class="form-group row">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                  <label class="col-sm-2 col-form-label">Urutan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" value="<?=$row['urutan']?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Matra</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="b" required>
                      <option value="<?=$row['matra']?>"><?=$row['matra']?></option>
                      <?php

                      $matra = array(1=>"KEMHAN","MABES TNI","TNI AD","TNI AU","TNI AL");
                      for ($i=1; $i <=5 ; $i++) {?> 
                        <option value="<?=$matra[$i]?>"><?=$matra[$i]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['satker']?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="text" name="d" class="form-control" value="<?=$row['subsatker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Uraian Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['uraiansatker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" value="<?=$row['kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['subkategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori Kedua</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" value="<?=$row['sub2kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori Ketiga </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" value="<?=$row['sub3kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="j" value="<?=$row['jenis']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan Angkatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" value="<?=$row['satuan']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Asal Negara</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="selecNegara" name="l">
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
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="m" value="<?=$row['tahun']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="n" value="<?=$row['jumlah']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah Kondisi</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="o" value="<?=$row['kondisi_s']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah Kondisi</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="p" value="<?=$row['kondisi_uss']?>">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/alutmatra');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>