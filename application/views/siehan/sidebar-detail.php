<aside class="right_content">

  <div class="single_sidebar">
    <h2><span>Trending Topic</span></h2>
    <ul class="spost_nav">
      <?php foreach ($trending->result_array() as $trd) { ?>
          <li>
            <div class="media wow fadeInDown"> <a href="<?=base_url().'trending/detail/'.enskrip($trd['id'])?>" class="media-left"> <img alt="" src="https://via.placeholder.com/300x150.png?text=KEMHAN+RI"> </a>
              <div class="media-body"> <a href="<?=base_url().'trending/detail/'.enskrip($trd['id'])?>" class="catg_title"> <?=html_entity_decode($trd['judul'])?></a> 

              </div>
              <small><i class="fa fa-calendar">&nbsp;<?=tgl_indo($trd['created_on'])?></i> | <i class="fa fa-user">&nbsp;<?=$trd['created_by']?></i> | <span class="btn btn-primary btn-xs">#<?=html_entity_decode($trd['kategori'])?></span></small>
            </div>
          </li>
      <?php } ?>
    </ul>
  </div>

</aside>