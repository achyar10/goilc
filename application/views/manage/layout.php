<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link rel="shortcut icon" href="<?php echo media_url('ico/favicon.png') ?>"/>
  <title>iLC <?php echo isset($title) ? ' | ' . $title : null; ?></title>
  
  <link rel="stylesheet" href="<?php echo media_url('library/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('library/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/jquery.toast.css') ?>">

  <link rel="stylesheet" href="<?php echo media_url('library/animate.css/animate.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('library/perfect-scrollbar/css/perfect-scrollbar.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/core.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/app.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/bootstrap-datepicker.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/bootstrap-datetimepicker.min.css') ?>">
  <!-- endbuild -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
  <script src="<?php echo media_url('library/breakpoints.js/dist/breakpoints.min.js') ?>"></script>
  <script>
    Breakpoints();
  </script>
  <script src="<?php echo media_url('library/jquery/dist/jquery.js') ?>"></script>
  
</head>

<body class="menubar-left menubar-unfold menubar-light theme-warning">
  <!--============= start main area -->

  <!-- APP NAVBAR ==========-->
  <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top warning">

    <!-- navbar header -->
    <div class="navbar-header">
      <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
      </button>

      <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="zmdi zmdi-hc-lg zmdi-more"></span>
      </button>

      <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="zmdi zmdi-hc-lg zmdi-search"></span>
      </button>

      <a href="<?php echo site_url('manage') ?>" class="navbar-brand">
        <img src="<?php echo media_url('img/logo.png') ?>" class="hidden-xs">
      </a>
    </div><!-- .navbar-header -->

    <div class="navbar-container container-fluid">
      <div class="collapse navbar-collapse" id="app-navbar-collapse">

        <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">

          <li class="dropdown">
            <a href="javascript:void(0)" class="side-panel-toggle" data-toggle="class" data-target="#side-panel" data-class="open" role="button"><i class="zmdi zmdi-hc-lg zmdi-apps"></i></a>
          </li>
        </ul>
      </div>
    </div><!-- navbar-container -->
  </nav>
  <!--========== END app navbar -->

  <!-- APP ASIDE ==========-->
  <?php $this->load->view('manage/sidebar'); ?>
  <!--========== END app aside -->


  <!-- APP MAIN ==========-->
  <main id="app-main" class="app-main">
    <div class="wrap">
     <?php isset($main) ? $this->load->view($main) : null; ?>
   </div><!-- .wrap -->
   
 </main>
 <!--========== END app main -->



 <!-- SIDE PANEL -->
 <div id="side-panel" class="side-panel">
  <div class="panel-header">
    <h4 class="panel-title">Account</h4>
  </div>
  <div class="scrollable-container">
    <div class="media-group">
      <a href="<?php echo site_url('manage/profile') ?>" class="media-group-item">
        <div class="media">
          <div class="media-left">
           <i class="menu-icon zmdi zmdi-account zmdi-hc-lg"></i>
         </div>
         <div class="media-body">
          <h5 class="media-heading">&nbsp;&nbsp;Profile</h5>
        </div>
      </div>
    </a><!-- .media-group-item -->

    <a href="<?php echo site_url('manage/auth/logout?location=' . htmlspecialchars($_SERVER['REQUEST_URI'])) ?>" class="media-group-item">
      <div class="media">
        <div class="media-left">
         <i class="menu-icon zmdi zmdi-sign-in zmdi-hc-lg"></i>
       </div>
       <div class="media-body">
        <h5 class="media-heading">&nbsp;&nbsp;Logout</h5>
      </div>
    </div>
  </a><!-- .media-group-item -->


</div>
</div><!-- .scrollable-container -->
</div><!-- /#side-panel -->

<!-- build:js ../assets/js/core.min.js -->

<script src="<?php echo media_url('library/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="<?php echo media_url('library/jQuery-Storage-API/jquery.storageapi.min.js') ?>"></script>
<script src="<?php echo media_url('library/bootstrap-sass/assets/javascripts/bootstrap.js') ?>"></script>
<script src="<?php echo media_url('library/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>
<script src="<?php echo media_url('library/perfect-scrollbar/js/perfect-scrollbar.jquery.js') ?>"></script>
<script src="<?php echo media_url('library/PACE/pace.min.js') ?>"></script>

<!-- endbuild -->

<!-- build:js ../assets/js/app.min.js -->
<script src="<?php echo media_url('js/library.js') ?>"></script>
<script src="<?php echo media_url('js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo media_url('js/bootstrap-datetimepicker.min.js') ?>"></script>
<script src="<?php echo media_url('js/plugins.js') ?>"></script>
<script src="<?php echo media_url('js/app.js') ?>"></script>
<script src="<?php echo media_url('js/jquery.toast.js') ?>"></script>
<script src="<?php echo media_url('js/jquery.inputmask.bundle.js') ?>"></script>
<!-- endbuild -->

<script type="text/javascript">

  // $(".time").datetimepicker({
  //   format: "LT",
  //   autoclose: true
  // });

  $(".date").datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
  });

  $(document).ready(function(){
    $('.numeric').inputmask("numeric", {
      removeMaskOnSubmit: true,
      radixPoint: ".",
      groupSeparator: ",",
      digits: 2,
      autoGroup: true,
            prefix: 'Rp ', //Space after $, this will not truncate the first character.
            rightAlign: false,

          });
  });
</script>

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