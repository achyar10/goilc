<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>iLC <?php echo isset($title) ? ' | ' . $title : null; ?></title>
  <!-- Standard Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo media_url('ico/favicon.png') ?>"/>
  
  <!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/libraries/lib.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/libraries/Stroke-Gap-Icon/stroke-gap-icon.css') ?>">
  
  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,300,300italic,500,700' rel='stylesheet' type='text/css'> 
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>
  
  
  <!-- Custom - Common CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/css/plugins.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/css/navigation-menu.css') ?>">
  
  <!-- Custom - Theme CSS --> 
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/css/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/css/shortcode.css') ?>">

  <script src="<?php echo media_url('frontend/js/jquery.min.js') ?>"></script>
  
  <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
  <!-- LOADER -->
  <div id="site-loader" class="load-complete">
    <div class="loader">
      <div class="loader-inner ball-clip-rotate">
        <div></div>
      </div>
    </div>
  </div><!-- Loader /- -->  
  <!-- Header -->
  <header class="header-main container-fluid no-padding">
    <!-- Top Header -->
    <div class="top-header container-fluid no-padding">
      <div class="container">
        <div class="topheader-left">
          <a href="tel:+5198759822" title="5198759822"><i class="fa fa-mobile" aria-hidden="true"></i>(021) - 123 - 456 </a>
          <a href="mailto:Support@info.com" title="Support@info.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: info@goilc.co.id</a>
        </div>
        <div class="topheader-right">
          <a href="<?php echo site_url('manage') ?>" title="Login"><i class="fa fa-sign-out" aria-hidden="true"></i>Login</a>
          <a href="#" title="Register">Register</a>
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
                <img src="<?php echo media_url('img/logo.png') ?>" style="margin-top: 15px; ;height: 80px;" alt="logo"/>
              </div>
            </div>
            <div class="col-md-9">
              <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav menubar">
                   <li><a title="Contact" href="#">Beranda</a></li>
                   <li><a title="Contact" href="#">Kegiatan</a></li>
                  
                  <li class="dropdown">
                    <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Pages" href="#">Layanan Kami</a>
                    <i class="ddl-switch fa fa-angle-down"></i>
                    <ul class="dropdown-menu">
                      <li><a title="Home 2" href="#">Home 2</a></li>
                      <li><a title="Course Detail" href="#">Course Detail</a></li>
                      <li><a title="BlogPost" href="#">BlogPost</a></li>
                    </ul>
                  </li>
                  <li><a title="Contact" href="#">Tentang Kami</a></li>
                  <li><a title="Contact" href="#">Hubungi Kami</a></li>
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
      </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
  </header><!-- Header /- -->
  <!-- PhotoSlider Section -->

  <?php isset($main) ? $this->load->view($main) : null; ?>
  
      <!-- Footer Bottom -->
      <div class="footer-bottom col-md-12 col-sm-12 no-padding">
        <div class="copyright no-padding">
          <span>Copyright &copy; <?php echo date('Y') ?>. All Rights Reserved.</span>
        </div>
        <nav class="navbar ow-navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar2" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.html" title="Home">Home</a></li>
              <li><a href="courses-page.html" title="COURSE">COURS</a></li>
              <li><a href="events-page.html" title="Events">Events</a></li>
              <li><a href="blog-page.html" title="Blog">Blog</a></li>
              <li><a href="about-page.html" title="About">About</a></li>
            </ul>
          </div>
        </nav>
      </div><!-- Footer Bottom /- -->
    </div><!-- Container /- -->
  </footer><!-- Footer /- -->
  
  <!-- JQuery v1.11.3 --> 
  
  <!--script src="js/jquery.knob.js"></script-->
  
  <!-- Library - Js -->
  <script src="<?php echo media_url('frontend/libraries/lib.js') ?>"></script><!-- Bootstrap JS File v3.3.5 -->
  <!-- Library - Google Map API -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  
  <!-- Library - Theme JS -->
  <script src="<?php echo media_url('frontend/js/functions.js') ?>"></script>
</body>
</html>