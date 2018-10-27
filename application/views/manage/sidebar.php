<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <?php if ($this->session->userdata('user_image') != null) { ?>
            <img src="<?php echo upload_url().'/users/'.$this->session->userdata('user_image'); ?>" class="img-responsive">
          <?php } else { ?>
            <img src="<?php echo media_url() ?>img/user.png" class="img-responsive">
          <?php } ?>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username"><?php echo ucfirst($this->session->userdata('ufullname')); ?></a></h5>
          <ul>
            <li class="dropdown">
                <small><?php echo ucfirst($this->session->userdata('urolename')); ?></small>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">

        <li>
          <a href="<?php echo site_url('home') ?>" target="_blank">
            <i class="menu-icon zmdi zmdi-globe zmdi-hc-lg"></i>
            <span class="menu-text">Lihat Website</span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'dashboard' OR $this->uri->segment(2) == NULL) ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage') ?>">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'training') ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage/training') ?>">
            <i class="menu-icon zmdi zmdi-assignment-check zmdi-hc-lg"></i>
            <span class="menu-text">Jadwal Pelatihan</span>
          </a>
        </li>

        <li class="has-submenu <?php echo ($this->uri->segment(2) == 'category') ? 'active' : '' ?>">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-assignment zmdi-hc-lg"></i>
            <span class="menu-text">Master Pelatihan</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li class="<?php echo ($this->uri->segment(2) == 'category') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/category') ?>"><span class="menu-text">Daftar Kategori</span></a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'service') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/service') ?>"><span class="menu-text">Daftar Pelayanan</span></a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'blasting') ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage/blasting') ?>">
            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
            <span class="menu-text">Blasting</span>
          </a>
        </li>
        <li class="<?php echo ($this->uri->segment(2) == 'register') ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage/register') ?>">
            <i class="menu-icon zmdi zmdi-accounts-alt zmdi-hc-lg"></i>
            <span class="menu-text">Pendaftaran</span>
          </a>
        </li>
        <li class="<?php echo ($this->uri->segment(2) == 'mailbox') ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage/mailbox') ?>">
            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
            <span class="menu-text">Mailbox</span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'subscriber') ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage/subscriber') ?>">
            <i class="menu-icon zmdi zmdi-notifications-active zmdi-hc-lg"></i>
            <span class="menu-text">Subscribers</span>
          </a>
        </li>

        <li class="has-submenu <?php echo ($this->uri->segment(2) == 'gallery' OR $this->uri->segment(2) == 'slideshow') ? 'active' : '' ?>">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-picture-in-picture zmdi-hc-lg"></i>
            <span class="menu-text">Media</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li class="<?php echo ($this->uri->segment(2) == 'gallery') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/gallery') ?>"><span class="menu-text">Galeri</span></a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'slideshow') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/slideshow') ?>"><span class="menu-text">Slideshow</span></a>
            </li>
          </ul>
        </li>


        <li class="has-submenu <?php echo ($this->uri->segment(2) == 'users') ? 'active' : '' ?>">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-account zmdi-hc-lg"></i>
            <span class="menu-text">Manage Users</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li class="<?php echo ($this->uri->segment(2) == 'users') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/users') ?>"><span class="menu-text">Users List</span></a>
            </li>
          </ul>
        </li>

        <li class="has-submenu <?php echo ($this->uri->segment(2) == 'setting' OR $this->uri->segment(2) == 'client') ? 'active' : '' ?>">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
            <span class="menu-text">Pengaturan</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li class="<?php echo ($this->uri->segment(2) == 'setting') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/setting') ?>"><span class="menu-text">Pengaturan Umum</span></a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'recruitment') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/recruitment') ?>"><span class="menu-text">Karir</span></a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'client') ? 'active' : '' ?>">
              <a href="<?php echo site_url('manage/client') ?>"><span class="menu-text">Client</span></a>
            </li>
          </ul>
        </li>

      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
