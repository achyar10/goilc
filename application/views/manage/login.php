<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PT INOVASI LENTERA CIPTA KREASI - Login Admin</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link rel="shortcut icon" href="<?php echo media_url('ico/favicon.png') ?>"/>
  
  <link rel="stylesheet" href="<?php echo media_url('library/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('library/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('library/animate.css/animate.min.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/core.css') ?>">
  <link rel="stylesheet" href="<?php echo media_url('css/misc-pages.css') ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
  <div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
      <a href="<?php echo site_url('manage') ?>">
        <img src="<?php echo media_url('img/logo.png') ?>">
        <span>iLC Learning Center</span>
      </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
  <h4 class="form-title m-b-xl text-center">Sign In With Your Account</h4>
  <?php echo form_open('manage/auth/login'); ?>
      <?php
      if (isset($_GET['location'])) {
        echo '<input type="hidden" name="location" value="';
        if (isset($_GET['location'])) {
          echo htmlspecialchars($_GET['location']);
        }
        echo '" />';
      } ?>

      <?php if ($this->session->flashdata('failed')) { ?>
      <div class="alert alert-danger alert-dismissible">
        <h5><i class="fa fa-ban"></i> Email atau Password salah!</h5>

      </div>
      <?php } ?>
    <div class="form-group">
      <input id="sign-in-email" name="email" type="email" class="form-control" placeholder="Email" autofocus="">
    </div>

    <div class="form-group">
      <input id="sign-in-password" name="password" type="password" class="form-control" placeholder="Password">
    </div>

    <div class="form-group m-b-xl">
      <div class="checkbox checkbox-danger">
        <input type="checkbox" id="keep_me_logged_in"/>
        <label for="keep_me_logged_in">Keep me signed in</label>
      </div>
    </div>
    <input type="submit" class="btn btn-warning" value="SIGN IN">
  <?php echo form_close(); ?>
</div><!-- #login-form -->


  </div><!-- .simple-page-wrap -->
</body>
</html>