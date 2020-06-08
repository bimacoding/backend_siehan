        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/tambah_halaman_statis',$attributes); ?>
                <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='140px' scope='row'>Judul</th><td><input type='text' class='form-control' name='a' placeholder="Masukan judul halaman statis"></td></tr>
                    <tr><th width='140px' scope='row'>Isi</th>
                      <td>
                        <textarea name="b" class="textarea"></textarea>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='<?=base_url('administrator/halaman_statis');?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>