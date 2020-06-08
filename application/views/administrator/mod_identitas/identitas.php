        <div class="col-3">
          <div class="card">

          </div>
        </div>
        

        <div class="col-9">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
              echo form_open_multipart('administrator/identitaswebsite',$attributes); ?>
                <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type="hidden" name="id" value="<?=$record['id_identitas'];?>">
                    <tr>
                      <th width='140px' scope='row'>Nama Website</th>
                      <td>
                        <input type='text' class='form-control' name='a' value="<?=$record['nama_website'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>Email</th>
                      <td>
                        <input type='text' class='form-control' name='b' value="<?=$record['email'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>URL</th>
                      <td>
                        <input type='text' class='form-control' name='c' value="<?=$record['url'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>Facebook</th>
                      <td>
                        <input type='text' class='form-control' name='d' value="<?=$record['facebook'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>No Rekening</th>
                      <td>
                        <input type='text' class='form-control' name='e' value="<?=$record['rekening'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>No Telpon</th>
                      <td>
                        <input type='text' class='form-control' name='f' value="<?=$record['no_telp'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>Meta Deskripsi</th>
                      <td>
                        <input type='text' class='form-control' name='g' value="<?=$record['meta_deskripsi'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th width='140px' scope='row'>Meta Keyword</th>
                      <td>
                        <input type='text' class='form-control' name='h' value="<?=$record['meta_keyword'];?>">
                      </td>
                    </tr>

                    <tr>
                      <th scope='row'>Google Maps</th>
                      <td>
                        <textarea class='form-control' name='i' style='height:80px'><?=$record['maps'];?></textarea>
                      </td>
                    </tr>

                    <tr>
                      <th scope='row'>Favicon</th>                      
                      <td>
                        <input type='file' class='form-control' name='j' value='<?=$record['favicon'];?>'>
                        <small style="color: #bfbfbf">Max file size (500 Kb), Allowed File : gif, jpg, png, ico</small>
                        <hr style='margin:5px'>
                        Favicon Aktif Saat ini : <img style='width:32px; height:32px' src="<?=base_url()."assets/images/".$record['favicon'];?>">
                      </td>
                    </tr>

                  </tbody>
                </table>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?=base_url()."administrator";?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        