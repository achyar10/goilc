<header class="header-main container-fluid no-padding">
  <!-- Top Header -->
  <div class="top-header container-fluid no-padding">
    <div class="container">
      <div class="topheader-left">
        <a href="tel:+57939389" title="57939389"><i class="fa fa-mobile" aria-hidden="true"></i>(021) - 5793 - 9389 </a>
        <a href="mailto:Support@info.com" title="Support@info.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: info@goilc.co.id</a>
      </div>
      <div class="topheader-right">
        <a href="<?php echo site_url('manage') ?>" title="Login"><i class="fa fa-sign-out" aria-hidden="true"></i>Login</a>
        <a href="<?php echo site_url('register') ?>">Register Pelatihan</a>
      </div>
    </div>
  </div><!-- Top Header /- -->

  <!-- Menu Block -->
  <div class="menu-block container-fluid no-padding">
    <!-- Container -->
    <div class="container">
      <div class="row">
        <!-- Navigation -->
        <nav class="navbar ow-navigation">
          <div class="col-md-3">
            <div class="navbar-header">
              <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <img src="<?php echo media_url('img/logo.png') ?>" style="margin-top: 15px; ;height: 80px;" alt="logo" class="">
            </div>
          </div>
          <div class="col-md-9">
            <div class="navbar-collapse collapse" id="navbar">
              <ul class="nav navbar-nav menubar">
               <li><a title="Contact" href="<?php echo site_url('home') ?>">Beranda</a></li>
               <li><a title="Contact" href="<?php echo site_url('activity') ?>">Kegiatan</a></li>

               <li class="dropdown">
                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Pages" href="#">Layanan Kami</a>
                <i class="ddl-switch fa fa-angle-down"></i>
                <ul class="dropdown-menu">
                  <li><a title="Home 2" href="<?php echo site_url('training') ?>">Pelatihan</a></li>
                </ul>
              </li>
              <li><a title="Contact" href="<?php echo site_url('about') ?>">Tentang Kami</a></li>
              <li><a title="Contact" href="<?php echo site_url('contact') ?>">Hubungi Kami</a></li>
            </ul>
          </div>
        </div>
      </nav><!-- Navigation /- -->
      <div class="menu-search">
        <div id="sb-search" class="sb-search">
          <form>
            <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search" />
            <button class="sb-search-submit"><i class="fa fa-search"></i></button>
            <span class="sb-icon-search"></span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</header>