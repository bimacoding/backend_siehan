        <div class="col-12">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title"><?=$title;?></h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');

              echo form_open_multipart('administrator/ubah_gis',$attributes); ?>

                <input type="hidden" name="id" value="<?=$row['gid']?>">

              <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Parent id</label>

                  <div class="col-sm-10">

                    <input type="number" name="a" class="form-control" value="<?=$row['parent_id']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">tree view</label>

                  <div class="col-sm-10">

                    <input type="text" name="b" class="form-control" value="<?=$row['treeview']?>">

                  </div>

                </div>

               

                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Tipe Organisasi</label>

                  <div class="col-sm-10">

                    <input type="text" name="c" class="form-control" value="<?=$row['tipe_org']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode UO</label>

                  <div class="col-sm-10">

                    <input type="number" name="d" class="form-control" value="<?=$row['kd_uo']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Parent Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="f" class="form-control" value="<?=$row['parent_satker']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Satker</label>

                  <div class="col-sm-10">

                    <select name="g" id="satker" class="form-control" placeholder="Pilih Satker">
                      <option value=""></option>

                      <?php 
                        foreach ($satker as $key => $value) {

                              if($value['id'] == $row['kd_satker']){

                                echo "<option value=".$value['id']." selected>".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              } else {

                                echo "<option value=".$value['id'].">".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              }

                        }
                         
                      ?>
                      
                    </select>

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Sub Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="h" class="form-control" value="<?=$row['kd_subsatker']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jenis Satker</label>

                  <div class="col-sm-10">

                    <input type="text" name="u" class="form-control" value="<?=$row['jns_satker']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Satker Simak</label>

                  <div class="col-sm-10">

                    <input type="number" name="i" class="form-control" value="<?=$row['kd_satker_simak']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Nama Pimpinan</label>

                  <div class="col-sm-10">

                    <input type="text" name="y" class="form-control" value="<?=$row['pimpinan']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Nama Lokasi</label>

                  <div class="col-sm-10">

                    <input type="text" name="j" class="form-control" value="<?=$row['nama']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Lokasi</label>

                  <div class="col-sm-10">

                    <input type="text" name="k" class="form-control" value="<?=$row['lokasi']?>">

                  </div>

                </div>


                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Provinsi</label>

                  <div class="col-sm-10">

                    <select name="n" id="provinsi" class="form-control" placeholder="Pilih Provinsi">
                    <option value=""></option>

                    <?php 
                        foreach ($provinsi as $key => $value) {

                              if($value['id'] == $row['kd_prop']){

                                echo "<option value=".$value['id']." selected>".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              } else {

                                echo "<option value=".$value['id'].">".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              }
                              
                        }
                         
                    ?>

                    </select>

                   <!--  <input type="number" name="n" class="form-control" value="<?=$row['kd_prop']?>"> -->

                  </div>

                </div>


                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Kabupaten</label>

                  <div class="col-sm-10">

                    <select name="m" id="kabupaten" class="form-control" placeholder="Pilih Kabupaten">
                    <option value=""></option>

                    <?php 
                        foreach ($kabupaten as $key => $value) {

                              if($value['id'] == $row['kd_kab']){

                                echo "<option value=".$value['id']." selected>".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              } else {

                                echo "<option value=".$value['id'].">".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              }
                              
                        }
                         
                    ?>
                    </select>

                    <!-- <input type="number" name="m" class="form-control" value="<?=$row['kd_kab']?>"> -->

                  </div>

                </div>


                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Kecamatan</label>

                  <div class="col-sm-10">

                    <select name="l" id="kecamatan" class="form-control" placeholder="Pilih Kecamatan">
                    <option value=""></option>

                    <?php 
                        foreach ($kecamatan as $key => $value) {

                              if($value['id'] == $row['kd_kec']){

                                echo "<option value=".$value['id']." selected>".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              } else {

                                echo "<option value=".$value['id'].">".$value['id']." - ".$value['teks']."</option>".PHP_EOL;

                              }
                              
                        }
                         
                    ?>
                    </select>

                   <!--  <input type="number" name="l" class="form-control" value="<?=$row['kd_kec']?>"> -->

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Deskripsi</label>

                  <div class="col-sm-10">

                    <input type="text" name="o" class="form-control" value="<?=$row['deskripsi']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Logo</label>

                  <div class="col-sm-10">

                    <input type="text" name="p" class="form-control" value="<?=$row['logo']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Simbol</label>

                  <div class="col-sm-10">

                    <input type="text" name="q" class="form-control" value="<?=$row['simbol']?>">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Foto Satker</label>

                  <div class="col-sm-10">

                    <input type="text" name="r" class="form-control" value="<?=$row['foto_satke']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">X Coordinate</label>

                  <div class="col-sm-10">

                    <input type="number" name="s" class="form-control" value="<?=$row['xcoord']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Y Coordinate</label>

                  <div class="col-sm-10">

                    <input type="number" name="t" class="form-control" value="<?=$row['ycoord']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Personil</label>

                  <div class="col-sm-10">

                    <input type="number" name="v" class="form-control" value="<?=$row['kd_pers']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode SMK</label>

                  <div class="col-sm-10">

                    <input type="number" name="w" class="form-control" value="<?=$row['kd_smk']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">GEO</label>

                  <div class="col-sm-10">

                    <input type="text" name="x" class="form-control" value="<?=$row['geom']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah TNI</label>

                  <div class="col-sm-10">

                    <input type="number" name="z" class="form-control" value="<?=$row['jml_tni']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah PNS</label>

                  <div class="col-sm-10">

                    <input type="number" name="pns" class="form-control" value="<?=$row['jml_pns']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="satker" class="form-control" value="<?=$row['jml_satker']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah Sub Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="subsatker" class="form-control" value="<?=$row['jml_subsatker']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Icon</label>

                  <div class="col-sm-10">

                    <input type="text" name="icon" class="form-control" value="<?=$row['icon']?>">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Keterangan</label>

                  <div class="col-sm-10">

                    <textarea class="textarea" name="ket"><?=$row['keterangan']?></textarea>

                  </div>

                </div>

                           

                <hr>

                <div class='box-footer'>

                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>

                    <a href='<?=base_url('administrator/gis');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>

                </div>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>

        <?php echo form_close(); ?>


        <script type="text/javascript">
          $(document).ready(function(){

            $("#provinsi").change(function(){
                var kode = $(this).val();

                $.ajax({
                    url: '../getkab',
                    type: 'post',
                    data: {prov:kode},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;;

                        $("#kabupaten").empty();
                        $("#kecamatan").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['teks'];
                            
                            $("#kabupaten").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });


            $("#kabupaten").change(function(){
                var kode = $(this).val();
                var p = $('#provinsi option:selected').val();

                $.ajax({
                    url: '../getkec',
                    type: 'post',
                    data: {prov:p, kab: kode},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;;

                        $("#kecamatan").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['teks'];
                            
                            $("#kecamatan").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
        </script>