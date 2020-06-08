    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="<?=base_url()?>" class="brand-link visible-xs" style="color:rgba(255, 255, 255, 0.8);">
          <img src="<?=logo()?>" alt="Famscode Logo" class="brand-image img-circle elevation-3" style="width: 44px; margin: 3px;">
          <span class="brand-text font-weight-light">SIEHAN KEMHAN <strong>RI</strong></span>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <?php 
            function main_menu() {
          $ci = & get_instance();
              $query = $ci->db->query("SELECT id_menu, nama_menu, link, id_parent FROM tbl_menu where aktif='Ya' AND position='Bottom' order by urutan");
              $menu = array('items' => array(),'parents' => array());
              foreach ($query->result() as $menus) {
                  $menu['items'][$menus->id_menu] = $menus;
                  $menu['parents'][$menus->id_parent][] = $menus->id_menu;
              }
              if ($menu) {
                  $result = build_main_menu(0, $menu);
                  return $result;
              }else{
                  return FALSE;
              }
          }

        function build_main_menu($parent, $menu) {
              $html = "";
              if (isset($menu['parents'][$parent])) {
                if ($parent=='0'){
                    $html .= "<ul class='nav navbar-nav main_nav'>";
                }else{
                  $html .= "<ul class='dropdown-menu' role='menu'>";
                }
                  foreach ($menu['parents'][$parent] as $itemId) {
                      if (!isset($menu['parents'][$itemId])) {
                          if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
                              $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
                          }else{
                              $html .= "<li><a href='".base_url().''.$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
                          }
                      }
                      if (isset($menu['parents'][$itemId])) {
                          if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
                              $html .= "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false' target='_BLANK' href='".$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a>";
                          }else{
                              $html .= "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false' href='".base_url().''.$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a>";
                          }
                          $html .= build_main_menu($itemId, $menu);
                          $html .= "</li>";
                      }
                  }
                  $html .= "</ul>";
              }
              return $html;
          }
          echo main_menu();
          ?>
      </div>
    </nav>