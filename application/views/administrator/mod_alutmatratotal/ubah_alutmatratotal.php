        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/ubah_alutmatratotal',$attributes); ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Urutan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="a" value="<?=$row['urutan']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Matra</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="b" required>
                      <option value="<?=$row['matra']?>"><?=$row['matra']?></option>
                      <?php

                      $matra = array(1=>"KEMHAN","MABES TNI","TNI AD","TNI AL","TNI AU");
                      for ($i=1; $i <=5 ; $i++) {?> 
                        <option value="<?=$matra[$i]?>"><?=$matra[$i]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Satker</label>
                  <div class="col-sm-10">
                    <select name="c" class="form-control" id="kdsatker" onChange='javascript:document.getElementById("nmsatker").value=document.getElementById("kdsatker").options[document.getElementById("kdsatker").selectedIndex].text' onMouseOver='javascript:document.getElementById("nmsatker").value=document.getElementById("kdsatker").options[document.getElementById("kdsatker").selectedIndex].text'>
                      
                      <option value="<?=$row['kdsatker']?>"><?=$row['satker']?> </option>
                      <?php

                        $qu = $this->db->query("SELECT kode_satker ,nama_satker FROM tbl_pers_r_satker ORDER BY kode_satker ASC");
                          foreach ($qu->result_array() as $key ) {?>
                            <option value="<?=$key['kode_satker']?>"><?=$key['nama_satker']?></option>
                      <?php  } ?>
                    </select>
                    <input type=text hidden name="e" id="nmsatker" value="<?=$row['satker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="number" name="d" class="form-control" value="<?=$row['kdsubsatker']?>">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Sub Satker</label>
                  <div class="col-sm-10">
                    <input type="text" name="g" class="form-control" value="<?=$row['subsatker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lokasi</label>
                  <div class="col-sm-10">
                   <textarea class="textarea" name="f"><?=$row['lokasi']?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Uraian Satker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" value="<?=$row['uraiansatker']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" value="<?=$row['kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="j" value="<?=$row['subkategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori Kedua</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" value="<?=$row['sub2kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sub Kategori Ketiga </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="l" value="<?=$row['sub3kategori']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m" value="<?=$row['jenis']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan Angkatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="n" value="<?=$row['satuan']?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Asal Negara</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="selecNegara" name="o">
                      <option value="<?=$row['negara']?>"><?=$row['negara']?></option>
                      <?php 

                        $qu = $this->db->query("SELECT kdwilayah,wilayah FROM tbl_negara ORDER BY kdwilayah");
                        foreach ($qu->result_array() as $key ) {?>
                          <option value="<?=$key['wilayah']?>"><?=$key['wilayah']?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="p" value="<?=$row['tahun']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="q" value="<?=$row['jumlah']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah Kondisi</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="r" value="<?=$row['kondisi_s']?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah Kondisi  </label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="s" value="<?=$row['kondisi_uss']?>">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url('administrator/alutmatratotal');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>