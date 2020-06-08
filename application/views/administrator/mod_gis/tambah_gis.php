        <div class="col-12">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title"><?=$title;?></h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');

              echo form_open_multipart('administrator/tambah_gis',$attributes); ?>

               <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Parent id</label>

                  <div class="col-sm-10">

                    <input type="number" name="a" class="form-control" placeholder="masukan parent id">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">tree view</label>

                  <div class="col-sm-10">

                    <input type="text" name="b" class="form-control" placeholder="masukan tree view">

                  </div>

                </div>

               

                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Tipe Organisasi</label>

                  <div class="col-sm-10">

                    <input type="text" name="c" class="form-control" placeholder="masukan tipe organisasi">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode UO</label>

                  <div class="col-sm-10">

                    <input type="number" name="d" class="form-control" placeholder="masukan kode uo">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Parent Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="f" class="form-control" placeholder="masukan parent satrker">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Satker</label>

                  <div class="col-sm-10">

                    <select name="g" id="satker" class="form-control" placeholder="Pilih Satker">
                      <option value=""></option>
                      <?php 
                        foreach ($satker as $key => $value) {
                               echo "<option value=".$value['id'].">".$value['id']." - ".$value['teks']."</option>".PHP_EOL;
                        } 
                      ?>
                      
                    </select>

                    <!-- <input type="number" name="g" class="form-control" placeholder="masukan kode satker"> -->

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Sub Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="h" class="form-control" placeholder="masukan kode sub Satker">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jenis Satker</label>

                  <div class="col-sm-10">

                    <input type="text" name="u" class="form-control" placeholder="masukan foto satker">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Satker Simak</label>

                  <div class="col-sm-10">

                    <input type="number" name="i" class="form-control" placeholder="masukan kode satker simak">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Nama Pimpinan</label>

                  <div class="col-sm-10">

                    <input type="text" name="y" class="form-control" placeholder="masukan foto satker">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Nama Lokasi</label>

                  <div class="col-sm-10">

                    <input type="text" name="j" class="form-control" placeholder="masukan nama lokasi">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Lokasi</label>

                  <div class="col-sm-10">

                    <input type="text" name="k" class="form-control" placeholder="masukan lokasi">

                  </div>

                </div>


                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Provinsi</label>

                  <div class="col-sm-10">

                    <select name="n" id="provinsi" class="form-control" placeholder="pilih provinsi">
                      <option value=""></option>
                      <?php 
                        foreach ($provinsi as $key => $value) {
                               echo "<option value=".$value['id'].">".$value['teks']."</option>".PHP_EOL;
                        } 
                      ?>
                      
                    </select>

                   <!--  <input type="number" name="n" class="form-control" placeholder="masukan kode provinisi"> -->

                  </div>

                </div>


                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Kabupaten</label>

                  <div class="col-sm-10">

                    <select name="m" id="kabupaten" class="form-control" placeholder="pilih kabupaten">
                      <option value=""></option> 
                    </select>

                    <!-- <input type="number" name="m" class="form-control" placeholder="masukan kode kabupaten"> -->

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Kecamatan</label>

                  <div class="col-sm-10">

                    <select name="l" id="kecamatan" class="form-control" placeholder="pilih kecamatan">
                      <option value=""></option>
                    </select>

                    <!-- <input type="number" name="l" class="form-control" placeholder="masukan kode Kecematan"> -->

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Deskripsi</label>

                  <div class="col-sm-10">

                    <input type="text" name="o" class="form-control" placeholder="masukan deskripsi">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Logo</label>

                  <div class="col-sm-10">

                    <input type="text" name="p" class="form-control" placeholder="masukan logo">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Simbol</label>

                  <div class="col-sm-10">

                    <input type="text" name="q" class="form-control" placeholder="masukan simbol">

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Foto Satker</label>

                  <div class="col-sm-10">

                    <input type="text" name="r" class="form-control" placeholder="masukan foto satker">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">X Coordinate</label>

                  <div class="col-sm-10">

                    <input type="number" name="s" class="form-control" placeholder="masukan X coordinate">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Y Coordinate</label>

                  <div class="col-sm-10">

                    <input type="number" name="t" class="form-control" placeholder="masukan Y coordinate">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode Personil</label>

                  <div class="col-sm-10">

                    <input type="number" name="v" class="form-control" placeholder="masukan kode Personil">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kode SMK</label>

                  <div class="col-sm-10">

                    <input type="number" name="w" class="form-control" placeholder="masukan kode smk">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">GEO</label>

                  <div class="col-sm-10">

                    <input type="text" name="x" class="form-control" placeholder="masukan geo ">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah TNI</label>

                  <div class="col-sm-10">

                    <input type="number" name="z" class="form-control" placeholder="masukan jumlah tni">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah PNS</label>

                  <div class="col-sm-10">

                    <input type="number" name="pns" class="form-control" placeholder="masukan jumlah pns">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="satker" class="form-control" placeholder="masukan jumlah satker">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Jumlah Sub Satker</label>

                  <div class="col-sm-10">

                    <input type="number" name="subsatker" class="form-control" placeholder="masukan jumlah sub satker">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Icon</label>

                  <div class="col-sm-10">

                    <input type="text" name="icon" class="form-control" placeholder="masukan icon">

                  </div>

                </div>



                 <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Keterangan</label>

                  <div class="col-sm-10">

                    <textarea class="textarea" name="ket"></textarea>

                  </div>

                </div>

                           

                <hr>  

                <div class='box-footer'>

                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>

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
                    url: './getkab',
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
                    url: './getkec',
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