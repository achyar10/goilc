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
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('css/frontend.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/jquery.toast.css') ?>">
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
  </div> 
  <?php 
  $CI = & get_instance();
  $CI->load->model('client/Client_model');
  $result = $CI->Client_model->get();
  ?>
  <!-- Header -->
  <?php $this->load->view('frontend/header') ?>
  <!-- Header -->

  <?php isset($main) ? $this->load->view($main) : null; ?>

  <div class="contactdetail-block">
    <div class="container">
      <div class="section-header">
        <h3>Client <span>Kami</span></h3>
        <?php foreach($result as $row): ?>
          <div class="col-md-2 col-sm-2 col-xs-2 contactinfo-box">
            <img src="<?php echo upload_url('client/'.$row['client_image']) ?>" class="img-responsive">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <footer class="footer-main footer2 container-fluid no-padding"> 
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <aside class="ftr-widget about_widget">
            <h3 class="widget-title">PT INOVASI LENTERA CIPTA KREASI</h3>
            <p><span class="icon icon-Plaine"></span>Gedung Senayan Trade Center [ STC ] Senayan Lt. 4 No. 69 A, Jl. Asia Afrika, Senayan, Jakarta Pusat 10270.</p>
            <p><span class="icon icon-Phone2"></span>Phone : <a title="57939389" href="tel:+57939389">(021) 5793-9389</a></p>
            <p><span class="icon icon-Fax"></span>Fax : <a title="57939389" href="#">(021) 2954-3463</a></p>
            <p><span class="icon icon-Mail"></span>Email : <a title="info@goilc.co.id" href="mailto:info@goilc.co.id">info@goilc.co.id</a></p>
          </aside>
        </div>
        <div class="col-md-4 col-sm-6"> 
          <aside class="ftr-widget about_widget">
            <h3 class="widget-title">Contact Support</h3>
            <p><span class="icon icon-User"></span>Rahma Yuniarti : <a title="087885818700" href="tel:+087885818700">0878-8581-8700</a></p>
            <p><span class="icon icon-User"></span>Ade Septiani : <a title="081511653822" href="tel:+081511653822">0815-1165-3822</a></p>
          </aside>
        </div>
        
        <div class="col-md-4 col-sm-6">
          <aside class="ftr-widget newsletter_widget">
            <h3 class="widget-title">News Letters</h3>
            <p>Jadwal Pelatihan Agar Anda selalu Update Dengan Program Yang Kami sediakan</p>
            <form action="<?php echo site_url('home') ?>" method="POST">
              <div class="input-group">
                <input type="email" name="subscriber_email" class="form-control" placeholder="Enter your email">
                <span class="input-group-btn">
                  <button class="btn" type="submit" title="Go"><i class="icon icon-Plaine"></i></button>
                </span>
              </div>
            </form>
            <ul>
              <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li> 
              <li><a href="#" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
              <li><a href="#" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
            </ul>
          </aside>
        </div>
      </div>
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
              <li><a href="<?php echo site_url('home') ?>" title="Beranda">Beranda</a></li>
              <li><a href="<?php echo site_url('activity') ?>" title="Kegiatan">Kegiatan</a></li>
              <li><a href="<?php echo site_url('about') ?>" title="Tentang Kami">Tentang Kami</a></li>
              <li><a href="<?php echo site_url('contact') ?>" title="Blog">Hubungi Kami</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </footer>

  <!-- Library - Js -->
  <script src="<?php echo media_url('js/jquery.toast.js') ?>"></script>
  <script src="<?php echo media_url('frontend/libraries/lib.js') ?>"></script><!-- Bootstrap JS File v3.3.5 -->

  <!-- Library - Theme JS -->
  <script src="<?php echo media_url('frontend/js/functions.js') ?>"></script>

  <?php if ($this->session->flashdata('success')) { ?>
    <script>
      $(document).ready(function() {
        $.toast({
         heading: 'Berhasil',
         text: '<?php echo $this->session->flashdata('success') ?>',
         position: 'top-right',
         loaderBg: '#ff6849',
         icon: 'success',
         hideAfter: 3500,
         stack: 6
       })
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('failed')) { ?>
    <script>
      $(document).ready(function() {
        $.toast({
         heading: 'Gagal',
         text: '<?php echo $this->session->flashdata('failed') ?>',
         position: 'top-right',
         loaderBg: '#ff6849',
         icon: 'error',
         hideAfter: 3500,
         stack: 6
       })
      });
    </script>
  <?php } ?>

</body>
</html>