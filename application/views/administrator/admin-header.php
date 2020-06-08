    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" tabindex="0" data-toggle="tooltip" data-placement="right" title="Kunjungi Situs"><i class="fas fa-sign-in-alt"></i></a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <?php $nm = $this->db->query('SELECT * FROM tbl_users WHERE username = "'.$this->session->username.'"')->row_array();?>
        <a href="#" class="nav-link"><?=$this->mylibrary->greeting().' <strong>'.$nm['nama'].'</strong>';?></a>
      </li> 
    </ul>

    <!-- SEARCH FORM -->
<!--     <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a href="<?=base_url()?>" class="nav-link" target="_blank">
          <i class="fas fa-share-square"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Selamat Datang</span>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('administrator/logout')?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
      </li>
    </ul>