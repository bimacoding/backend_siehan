<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8">
    <div class="left_content">
      <div class="single_page">
        <ol class="breadcrumb">
          <li style="color: #fff;"><strong><?=$title?></strong></li>
        </ol>
        
        <ul class="spost_nav">

        <?php foreach ($berita->result_array() as $brt) { ?>
            <li>
              <div class="media wow fadeInDown"> <a href="#" class="media-left"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN RI"> </a>
                <div class="media-body"> 
                  <a href="<?=base_url().'berita/detail/'.enskrip($brt['id'])?>" class="catg_title"> <?=html_entity_decode($brt['judul'])?></a>
                  <div style="clear:both"></div>
                  <small>
                    <i class="fa fa-calendar">&nbsp;<?=tgl_indo($brt['created_on'])?></i> | 
                    <i class="fa fa-user">&nbsp;<?=$brt['created_by']?></i> | 
                    <span class="btn btn-primary btn-xs"><i class="fa fa-tag"></i> <?=$brt['kategori']?></span>
                  </small>
                  <p><?=html_entity_decode(substr($brt['isi'], 0, 165))?> ...</p>
              </div>
              </div>
            </li>
        <?php } ?>

        </ul>
        <div style="clear:both"></div>
        <?php echo $this->pagination->create_links(); ?>

        <!-- <div class="related_post">
          <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
          <ul class="spost_nav wow fadeInDown animated">

            <li>
              <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img1.jpg" alt=""> </a>
                <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
              </div>
            </li>
            
          </ul>
        </div> -->

      </div>
    </div>
  </div>
  
   <div class="col-lg-4 col-md-4 col-sm-4">
    <?php include 'sidebar.php'; ?>
  </div>
</div>