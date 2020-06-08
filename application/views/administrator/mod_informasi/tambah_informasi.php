        <div class="col-12">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title"><?=$title;?></h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');

              echo form_open('administrator/tambah_informasi',$attributes); ?>





                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Kategori<small class="text-danger">*</small></label>

                  <div class="col-sm-10">

                    <select class="form-control" name="a" required>

                      <option value="-">-- PILIH KATEGORI --</option>

                      <option value="TERORISME"> TERORISME </option>

                      <option value="BENCANA"> BENCANA </option>

                      <option value="CYBER"> CYBER </option>

                      <option value="PERAMPOKAN"> PERAMPOKAN </option>

                      <option value="PENYAKIT"> PENYAKIT </option>

                      <option value="PERBATASAN"> PERBATASAN </option>

                      <option value="SEPARATISME"> SEPARATISME </option>


                    </select>

                  </div>

                </div>





                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Judul informasi <small class="text-danger">*</small></label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="b" placeholder="Masukan judul informasi" required>

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Deskripsi</label>

                  <div class="col-sm-10">

                    <textarea class="textarea" name="c"></textarea>

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Keterngan</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="d" placeholder="Masukan Keterangan Singkat">

                    <small class="text-danger">*</small><small class="text-dark">Biarkan kosong jika tidak ada keterangan.</small>

                  </div>

                </div>



                <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Sumber</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="e" placeholder="http://situs-web.com">

                    <small class="text-danger">*</small><small class="text-dark">Biarkan kosong jika tidak ada sumber.</small>

                  </div>

                </div>



                <hr>

                <div class='box-footer'>

                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>

                    <a href='<?=base_url('administrator/informasi');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>

                </div>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>

        <?php echo form_close(); ?>