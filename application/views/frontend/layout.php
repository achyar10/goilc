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

  <!-- <div class="contactdetail-block">
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
  </div> -->

  <footer class="footer-main footer2 container-fluid no-padding"> 
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <aside class="ftr-widget about_widget">
            <h3 class="widget-title"><?php echo name_of_pt() ?></h3>
            <p><span class="icon icon-Plaine"></span><?php echo address() ?></p>
            <p><span class="icon icon-Phone2"></span>Phone : <a href="#"><?php echo phone() ?></a></p>
            <p><span class="icon icon-Fax"></span>Fax : <a href="#"><?php echo fax() ?></a></p>
            <p><span class="icon icon-Mail"></span>Email : <a title="<?php echo email() ?>" href="mailto:<?php echo email() ?>"><?php echo email() ?></a></p>
          </aside>
        </div>
        <div class="col-md-4 col-sm-6"> 
          <aside class="ftr-widget about_widget">
            <h3 class="widget-title">CONTACT SUPPORT</h3>
            <p><a target="_blank" href="http://api.whatsapp.com/send?phone=6287885818700"><span class="icon icon-User"></span>Rahma Yuniarti : 0878-8581-8700</a></p>
            <p><a target="_blank" href="http://api.whatsapp.com/send?phone=6281511653822"><span class="icon icon-User"></span>Ade Septiani : 0815-1165-3822</a></p>
          </aside>
        </div>
        
        <div class="col-md-4 col-sm-6">
          <aside class="ftr-widget newsletter_widget">
            <h3 class="widget-title">SUBSCRIBE</h3>
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
              <li><a href="<?php echo (facebook()!= '-') ? facebook() : '#' ?>"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?php echo (twitter()!= '-') ? twitter() : '#' ?>"><i class="fa fa-twitter"></i></a></li>
              <li><a href="<?php echo (linkedin()!= '-') ? linkedin() : '#' ?>"><i class="fa fa-linkedin"></i></a></li> 
              <li><a href="<?php echo (instagram()!= '-') ? instagram() : '#' ?>"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </aside>
        </div>
      </div>
      <div class="footer-bottom col-md-12 col-sm-12 no-padding">
        <div class="copyright no-padding">
          <span>Copyright &copy; <?php echo date('Y') ?>. All Rights Reserved.</span>
        </div>
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