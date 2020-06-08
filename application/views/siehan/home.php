    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <?php
            $py = $penyakit->row_array();
            $pyt = $penyakit->result_array();
          ?>
          <div class="single_post_content">
            <h2><span><?=$py['kategori']?></span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="<?=base_url().'berita/detail/'.enskrip($py['id'])?>" class="featured_img"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN+RI"> <span class="overlay"></span> </a>
                    <figcaption> <a href="<?=base_url().'berita/detail/'.enskrip($py['id'])?>"><?=$py['judul']?></a> </figcaption>
                      <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($py['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$py['created_by']?></i></small>
                      <p><?=html_entity_decode(substr($py['isi'], 0, 200))?> ...</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">

                <?php foreach ($pyt as $pnykt) { ?>
                    <li>
                      <div class="media wow fadeInDown"> <a href="<?=base_url().'berita/detail/'.enskrip($pnykt['id'])?>" class="media-left"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN RI"> </a>
                        <div class="media-body"> <a href="<?=base_url().'berita/detail/'.enskrip($pnykt['id'])?>" class="catg_title"> <?=$pnykt['judul']?></a>
                      <br>  <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($pnykt['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$pnykt['created_by']?></i></small>
                      </div>
                      </div>
                    </li>
                <?php } ?>

              </ul>
            </div>
          </div>

          <div class="fashion_technology_area">
            <div class="fashion">
              <?php
                $tr = $teroris->row_array();
                $trs = $teroris->result_array();
              ?>
              <div class="single_post_content">
                <h2><span><?=$tr['kategori']?></span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="<?=base_url().'berita/detail/'.enskrip($tr['id'])?>" class="featured_img"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN RI"> <span class="overlay"></span> </a>
                      <figcaption> <a href="<?=base_url().'berita/detail/'.enskrip($tr['id'])?>"><?=$tr['judul']?></a> </figcaption>
                      <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($tr['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$tr['created_by']?></i></small>
                      <p><?=html_entity_decode(substr($tr['isi'], 0, 200))?> ...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">

                  <?php foreach ($trs as $tror) { ?>
                      <li>
                        <div class="media wow fadeInDown"> <a href="<?=base_url().'berita/detail/'.enskrip($tror['id'])?>" class="media-left"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN RI"> </a>
                          <div class="media-body"> <a href="<?=base_url().'berita/detail/'.enskrip($tror['id'])?>" class="catg_title"> <?=$tror['judul']?></a>
                        <br>  <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($tror['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$tror['created_by']?></i></small>
                        </div>
                        </div>
                      </li>
                  <?php } ?>

                </ul>
              </div>
            </div>

            <div class="technology">
              <?php
                $cb = $cyber->row_array();
                $cyb = $cyber->result_array();
              ?>
              <div class="single_post_content">
                <h2><span><?=$cb['kategori']?></span></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="<?=base_url().'berita/detail/'.enskrip($cb['id'])?>" class="featured_img"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN RI"> <span class="overlay"></span> </a>
                      <figcaption> <a href="<?=base_url().'berita/detail/'.enskrip($cb['id'])?>"><?=$cb['judul']?></a> </figcaption>
                      <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($cb['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$cb['created_by']?></i></small>
                      <p><?=html_entity_decode(substr($cb['isi'], 0, 200))?> ...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">

                  <?php foreach ($cyb as $cber) { ?>
                      <li>
                        <div class="media wow fadeInDown"> <a href="<?=base_url().'berita/detail/'.enskrip($cber['id'])?>" class="media-left"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN RI"> </a>
                          <div class="media-body"> <a href="<?=base_url().'berita/detail/'.enskrip($cber['id'])?>" class="catg_title"> <?=$cber['judul']?></a>
                        <br>  <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($cber['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$cber['created_by']?></i></small>
                        </div>
                        </div>
                      </li>
                  <?php } ?>
                  
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <?php include 'sidebar.php'; ?>
      </div>
    </div>