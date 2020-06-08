        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open('administrator/tambah_perstniad',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" name="a" class="form-control" placeholder="masukan NRP">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Personel</label>
                  <div class="col-sm-10">
                   <input type="text" name="b" class="form-control" placeholder="masukan nama personel">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="l" placeholder="Masukan tempat lahir">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" placeholder="Masukan tempat lahir">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select name="r" class="form-control" id="kodepangkat" >
                    <option value=""> -- Pilih Agama --</option>
                      <?php

                      $q = $this->db->query("SELECT KDAGAMA,AGAMA FROM tbl_agama ORDER BY KDAGAMA ASC");
                      foreach ($q->result_array() as $key ) {?>
                        <option value="<?=$key['KDAGAMA']?>"><?=$key['AGAMA']?></option>
                  
                       <?php }  ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pangkat</label>
                  <div class="col-sm-10">
                    <select name="c" class="form-control" id="kodepangkat" >
                    <option value=""> -- Pilih Pangkat --</option>
                      <?php

                      $q = $this->db->query("SELECT kd_pkt,nm_pkt FROM tbl_pkt ORDER BY kd_pkt ASC");
                      foreach ($q->result_array() as $key ) {?>
                        <option value="<?=$key['kd_pkt']?>"><?=$key['nm_pkt']?></option>
                  
                       <?php }  ?>
                    </select>
                  </div>
                </div>

                <!-- Input Data ktm -->
                <input type="hidden" name="f" value="10">
                <!-- end data ktm -->

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Pangkat</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="d" placeholder="Masukan tanggal panggkat">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" placeholder="Masukan kode jabatan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" placeholder="Masukan nama jabatan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Jabatan</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="j" placeholder="Masukan tanggal jabatan">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Korp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="Masukan nama korp">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode SMK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="Masukan nama golongan">
                  </div>
                </div>

                <hr>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/perstniad');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>