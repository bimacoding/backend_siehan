    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <?php 
            foreach (ticker() as $t) {
              echo "<marquee><a href='' style='color:#fff;font-size: 12pt;padding: 5px 0px'><strong>$t[nm_ticker]</strong> : ".html_entity_decode($t['des_ticker'])."</a></marquee>";
            }
          ?>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area hidden-xs"><a href="<?=base_url()?>" class="logo"><img src="<?=logo()?>" alt="" width="100"></a></div>
          <div class="add_banner"><a href="#"><img src="https://via.placeholder.com/728x90.png?text=Space+Available+728x90" alt=""></a></div>
        </div>
      </div>
    </div>

    