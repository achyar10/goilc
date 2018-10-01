<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <meta name="generator" content="ckan 2.8.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabanan Open Data</title>
  <link rel="stylesheet" type="text/css" href="<?php echo media_url('frontend/css/select2.css') ?>" />
  <link rel="stylesheet" href="<?php echo media_url('library/font-awesome/css/font-awesome.min.css') ?>">

  <link rel="shortcut icon" href="<?php echo media_url('ico/favicon.png') ?>"/>
  <link rel="stylesheet" href="<?php echo media_url('frontend/css/custom.css') ?>" />
  <link rel="stylesheet" href="<?php echo media_url('frontend/css/animate.css') ?>" />
  <link rel="stylesheet" href="<?php echo media_url('css/grid12.css') ?>">

  <script src="<?php echo media_url('library/jquery/dist/jquery.js') ?>"></script>

</head>


<body data-site-root="http://data.tabanankab.go.id/" data-locale-root="http://data.tabanankab.go.id/" >


  <div class="hide"><a href="#content">Skip to content</a></div>


  <header class="account-masthead">
    <div class="container">
      <div class="account avatar authed" data-module="me" data-me="acc796e2-1b6e-415e-9c14-34bfa127fedf">
        <ul class="unstyled">
          <li>
            <a href="<?php echo site_url('manage') ?>">
             <?php if (!$this->session->userdata('logged')){ ?>
              <i class="fa fa-sign-in" aria-hidden="true"></i>
              <span class="">Masuk</span>
            <?php } else { ?>
              <i class="fa fa-dashboard" aria-hidden="true"></i>
              <span class="">Dashboard</span>
            <?php } ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <header class="navbar navbar-static-top masthead">



    <div class="container">
      <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <hgroup class="header-image pull-left" style="margin-top:-10px;">



        <a class="logo" href="http://data.tabanan.go.id">
          <img src="<?php echo media_url('img/tabanan-logo.png') ?>" alt="Tabanan Open Data" style="height: 50px;" title="Tabanan Open Data" />
        </a>
        


      </hgroup>

      <div class="nav-collapse collapse">


        <nav class="section navigation">
          <ul class="nav nav-pills">

            <li><a href="http://data.tabanankab.go.id">Beranda</a></li>
            <li><a href="http://data.tabanankab.go.id/dataset">Data</a></li>
            <li><a href="http://data.tabanankab.go.id/organization">Organisasi</a></li>
            <li><a href="http://data.tabanankab.go.id/group">Topik</a></li>
            <li class="<?php echo ($this->uri->segment(1) == 'infografis') ? 'active' : '' ?>"><a href="<?php echo site_url('infografis') ?>">Infografis</a></li>
            <li class="<?php echo ($this->uri->segment(1) == 'visualisation') ? 'active' : '' ?>"><a href="<?php echo site_url('visualisation') ?>">Visualisasi</a></li>
            <li><a href="http://data.tabanankab.go.id/about">Tentang</a></li>

          </ul>
        </nav>



      </div>
    </div>
  </header>

  
  <div role="main">
    <?php isset($main) ? $this->load->view($main) : null; ?>
  </div>

  <footer class="site-footer">
    <div class="container">

      <div class="row">
        <div class="span10 footer-links">
          <p>
            Copyright &copy; 2018 | Tabanan Open Data
          </p>


          <a href="http://www.opendefinition.org/okd/" target="_blank"><img src="<?php echo media_url('img/od_80x15_blue.png') ?>"></a>

        </div>
        <div class="span2 attribution">
          <div class="soc-media text-left">
            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a>
            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-facebook"></i></a>
            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-youtube"></i></a>
            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>

    </div>

  </footer> 

</body>
</html>