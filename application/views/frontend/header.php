<header class="header-main container-fluid no-padding">
  <!-- Top Header -->
  <div class="top-header container-fluid no-padding">
    <div class="container">
      <div class="topheader-left">
        <a href="tel:+57939389" title="57939389"><i class="fa fa-mobile" aria-hidden="true"></i><?php echo phone() ?> </a>
        <a href="mailto:<?php echo email() ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: <?php echo email() ?></a>
      </div>
      <div class="topheader-right">
        <a href="<?php echo site_url('manage') ?>" title="Login"><i class="fa fa-sign-out" aria-hidden="true"></i>Login</a>
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
              <a href="<?php echo site_url('/') ?>">
                <img src="<?php echo media_url('img/logo.png') ?>" style="height: 50px;" alt="logo" class="hidden-lg hidden-sm hidden-md">
                <img src="<?php echo media_url('img/logo.png') ?>" style="margin-top:15px;height: 80px;" alt="logo" class="hidden-xs">
              </a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="navbar-collapse collapse" id="navbar">
              <ul class="nav navbar-nav menubar">
               <li><a href="<?php echo site_url('/') ?>">Home</a></li>
               <li><a href="<?php echo site_url('training') ?>">Training</a></li>
               <li><a href="<?php echo site_url('event') ?>">Gallery</a></li>
               <li><a href="<?php echo site_url('client') ?>">Client</a></li>
               <li><a href="<?php echo site_url('about') ?>">About Us</a></li>
               <li><a href="<?php echo site_url('contact') ?>">Contact Us</a></li>
               <li><a href="<?php echo site_url('recruitment') ?>">Career</a></li>
             </ul>
           </div>
         </div>
       </nav><!-- Navigation /- -->
       <div class="menu-search hide">
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