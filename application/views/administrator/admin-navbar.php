    <!-- Brand Logo -->
    <a href="<?php echo base_url('administrator');?>" class="brand-link" style="background-color:#d09710;color:rgba(255, 255, 255, 0.8);">
      <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Famscode Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIEHAN KEMHAN <strong>RI</strong></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-1 mb-1 d-flex">
        <div class="image py-3">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('administrator');?>" class="d-block"><?= $this->session->userdata('level'); ?></a>
          <span class="badge badge-success">Online</span>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url().'administrator';?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/trending';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>Trending Content</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/informasi';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>News Content</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Aset BTB
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    KEMHAN
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/kemhan/tanah'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>TANAH</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/kemhan/bangunan'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>BANGUNAN</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    MABES TNI
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-tni/tanah'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>TANAH</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-tni/bangunan'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>BANGUNAN</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    MABES TNI AD
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-ad/tanah'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>TANAH</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-ad/bangunan'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>BANGUNAN</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    MABES TNI AL
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-al/tanah'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>TANAH</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-al/bangunan'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>BANGUNAN</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    MABES TNI AU
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-au/tanah'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>TANAH</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url().'administrator/tanah/mabes-au/bangunan'?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>BANGUNAN</p>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Document
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/files';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>Document Management</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Ticker
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo base_url().'administrator/ticker_kat';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>Ticker Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo base_url().'administrator/ticker';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>Ticker Management</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/wilayah';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>Wilayah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/gis';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>GIS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/rs';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>RS Detil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/users';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>User Manager</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/usergroup';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>User Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'administrator/identitaswebsite';?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #06d206;"></i>
                  <p>Control Panel</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>