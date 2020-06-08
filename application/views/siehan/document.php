<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8">
    <div class="left_content">
      <div class="single_page">
        <ol class="breadcrumb">
          <li style="color: #fff;"><strong><?=$title?></strong></li>
        </ol>

        <div class="wow fadeInDown">
          <form action="<?php base_url().'document'?>" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari File / Document disini.." name="qfile">
              <span class="input-group-btn">
                <button class="btn btn-warning" type="submit" name="sfile">Cari</button>
              </span>
            </div>
          </form>
        </div>
        <br>
        <table class="table table-striped">

          <thead style="background-color:black;color:#fff;">
            <tr>
              <th><center>No.</center></th>
              <th>Nama Document</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($document->result_array() as $dc) { ?>
              <tr>
                <td><center><?=$no++?></center></td>
                <td><?=$dc['judul']?></td>
                <td>
                  <?php if ($dc['files']!='') { ?>
                    <center>
                      <a href="<?=base_url().'files/download/'.$dc['files']?>" class="btn btn-success btn-xs" target="_blank">
                        <i class="fa fa-download"></i>
                      </a>
                    </center>
                  <?php }else{ ?>
                    <center>
                      <a data-toggle="modal" href='#modal-id' class="btn btn-success btn-xs">
                        <i class="fa fa-download"></i>
                      </a>
                    </center>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          
        </table>
        
        <div style="clear:both"></div>
        <?php echo $this->pagination->create_links(); ?>

      </div>
    </div>
  </div>
  
   <div class="col-lg-4 col-md-4 col-sm-4">
    <?php include 'sidebar-detail.php'; ?>
  </div>
</div>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <center><h4>Maaf belum ada file yang diupload</h4></center>
      </div>
    </div>
  </div>
</div>