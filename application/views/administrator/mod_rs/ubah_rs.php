        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/ubah_rs',$attributes); ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Provinsi</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="provinsi" id="provinsi">
                        <?php
                        foreach ($prov as $value) {
                          $pilih = 'selected';
                          if ($value['kd_prov']==$row['kd_prov']) {
                            echo "<option value='$value[kd_prov]' $pilih>$value[kd_prov] - $value[provinsi]</option>";
                          }else{
                            echo "<option value='$value[kd_prov]'>$value[kd_prov] - $value[provinsi]</option>";
                          }
                        }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kabupaten</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="kabupaten" id="kabupaten">
                      
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="kecamatan" id="kecamatan">
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Provinsi</label>
                  <div class="col-sm-10">
                  	<input type="hidden" name="id" value="<?=$row['autono']?>">
                    <input type="text" class="form-control" name="a" value="<?=$row['nama_prop']?>">
                    <small class="text-danger">Sebutan provinsi cth : NANGGROE ACEH DARUSSALAM menjadi ACEH atau KEPULAIAN RIAU menjadi R I A U</small>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?=$row['autono']?>">
                    <input type="text" class="form-control" name="prov" id="nmprov" readonly="on">
                    <small class="text-danger">Otomatis terisi dengan sendirinya</small>
                  </div>
                </div>
                

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Rs</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" value="<?=$row['kode_rs']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Rs</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" value="<?=$row['nama_rs']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" value="<?=$row['alamat']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" value="<?=$row['telp']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="f">
                    	<option value="<?=$row['kelas']?>"> Kelas <?=$row['kelas']?> </option>
                    	<option value="A"> Kelas A </option>
                    	<option value="B"> Kelas B </option>
                    	<option value="C"> Kelas C </option>
                    	<option value="D"> Kelas D </option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis RS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" value="<?=$row['jenis_rs']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pemilik</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" value="<?=$row['pemilik']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah VVIP</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="i" value="<?=$row['vvip']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah VIP</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="j" value="<?=$row['vip']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah Kelas 1</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k" value="<?=$row['kls1']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah Kelas 2</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="l" value="<?=$row['kls2']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah Kelas 3</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="m" value="<?=$row['kls3']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="n" value="<?=$row['tahun']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Rujukan Covid</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="o" value="<?=$row['covid19']?>">
                  </div>
                  <small>Masukan Y jika Iya, biarkan Kosong jika bukan.</small>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah Dokter</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="p" value="<?=$row['jml_dokter']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUmlah Perawat</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="q" value="<?=$row['jml_perawat']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Longitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="r" value="<?=$row['kor_long']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lattitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s" value="<?=$row['kor_lat']?>">
                  </div>
                </div>
                

                <hr>

                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/rs')?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>
        <script>
            var kk = $("#provinsi").val();
            var nm = $("#provinsi option:selected").html();
            var kv = nm.substring(5);
                $("#nmprov").val(kv);
            var kl = $("#kabupaten").val();

            var pil = 'selected';
            var sel = "<?php echo $row['kd_kab'];?>";
            var sell = "<?php echo $row['kd_kec'];?>";
            console.log(sel);
            console.log(nm);
              $.ajax({
                url : "<?php echo base_url();?>/ajax/get_kab",
                method : "POST",
                data : {kd_prov:kk},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      if (sel==data[i].kd_kab) {
                        html += '<option value='+data[i].kd_kab+' '+pil+'>'+data[i].kd_kab+' - '+data[i].kabupaten+'</option>';
                      }else{
                        html += '<option value='+data[i].kd_kab+'>'+data[i].kd_kab+' - '+data[i].kabupaten+'</option>';
                      }
                    }
                    $('#kabupaten').html(html);
                }
              });

              $.ajax({
                    url : "<?php echo base_url();?>/ajax/get_kec",
                    method : "POST",
                    data : {kd_kab:sel},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                          if (sell==data[i].kd_kec) {
                            html += '<option value='+data[i].kd_kec+' '+pil+'>'+data[i].kd_kec+' - '+data[i].kecamatan+'</option>';
                          }else{
                            html += '<option value='+data[i].kd_kec+'>'+data[i].kd_kec+' - '+data[i].kecamatan+'</option>';
                          }
                            
                        }
                        $('#kecamatan').html(html);

                    }
                });

            $("#provinsi").change(function(){

                // variabel dari nilai combo box provinsi
                var kd_prov = $("#provinsi").val();
                var nm = $("#provinsi option:selected").html();
                var kv = nm.substring(5);
                $("#nmprov").val(kv);

                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url : "<?php echo base_url();?>/ajax/get_kab",
                    method : "POST",
                    data : {kd_prov:kd_prov},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kd_kab+'> '+data[i].kd_kab+' - '+data[i].kabupaten+'</option>';
                        }
                        $('#kabupaten').html(html);
                    }
                });
            });

            $("#kabupaten").change(function(){
                // variabel dari nilai combo box provinsi
                var kd_kab = $("#kabupaten").val();
                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url : "<?php echo base_url();?>/ajax/get_kec",
                    method : "POST",
                    data : {kd_kab:kd_kab},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kd_kec+'>'+data[i].kd_kec+' - '+data[i].kecamatan+'</option>';
                        }
                        $('#kecamatan').html(html);

                    }
                });
            });
        </script>