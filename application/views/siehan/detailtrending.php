<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8">
    <div class="left_content">
      <div class="single_page">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li><a href="#"><?=ucwords(strtolower($rows['kategori']))?></a></li>
          <li class="active"><?=$rows['judul']?></li>
        </ol>
        <h1><?=$rows['judul']?></h1>

        <div class="post_commentbox"> 
          <a href="#"><i class="fa fa-user"></i><?=$rows['created_by']?></a> 
          <span><i class="fa fa-calendar"></i><?=tgl_indo($rows['created_on'])?></span>  
        </div>

        <div class="single_page_content"> 
          <img class="img-center" src="https://via.placeholder.com/300x150.png?text=KEMHAN+RI" alt="">
          <p><?=html_entity_decode($rows['isi'])?></p>
        </div>

        <!-- <div class="related_post">
          <h2>Trending Terkait <i class="fa fa-thumbs-o-up"></i></h2>
          <ul class="spost_nav wow fadeInDown animated">

            <li>
              <div class="media"> <a class="media-left" href="single_page.html"> <img src="https://via.placeholder.com/300x150.png?text=KEMHAN RI" alt=""> </a>
                <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
              </div>
            </li>
            
          </ul>
        </div> -->

      </div>
    </div>
  </div>
  
   <div class="col-lg-4 col-md-4 col-sm-4">
    <?php include 'sidebar-detail.php'; ?>
  </div>
</div>