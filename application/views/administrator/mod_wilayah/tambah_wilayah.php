        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/tambah_wilayah',$attributes); ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Wilayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="a" placeholder="Masukan kode Wiayah">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="b" placeholder="Masukan kode Provinsi">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Kabupaten</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="c" placeholder="Masukan kode Kabupaten">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="d" placeholder="Masukan kode Kecamatan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Negara</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="e" placeholder="Masukan Nama Negara">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f" placeholder="Masukan Nama Provinsi">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kabupaten</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="g" placeholder="Masukan Nama Kabupaten">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="h" placeholder="Masukan Nama Kecamatan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Desa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i" placeholder="Masukan Nama Desa">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Longitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="j" placeholder="Masukan Koordinat Longitude">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Lattitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="k" placeholder="Masukan Koordinat Lattitude">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="l" placeholder="Masukan Keterangan">
                  </div>
                </div>
                

                <hr>

                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/wilayah')?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>