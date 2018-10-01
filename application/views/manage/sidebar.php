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
        <li class="<?php echo ($this->uri->segment(2) == 'dashboard' OR $this->uri->segment(2) == NULL) ? 'active' : '' ?>"">
          <a href="<?php echo site_url('manage') ?>">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
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

      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>