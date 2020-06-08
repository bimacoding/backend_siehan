<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8">
    <div class="left_content">
      <div class="single_page">
        <?php if ($this->uri->segment(3)=='') { ?>
          <div class="single_page_content"> 
            <p><?=$this->uri->segment(3)?></p>
          </div>
        <?php }else{ ?>
          <h1><?=$rows['nm_statis']?></h1>

          <div class="single_page_content"> 
            <p><?=html_entity_decode($rows['des_statis'])?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  
   <div class="col-lg-4 col-md-4 col-sm-4">
    <?php include 'sidebar-detail.php'; ?>
  </div>
</div>