<style type="text/css">
a{
  color:#fff;
}
</style>
<div class="photoslider-section container-fluid no-padding">
  <div id="home-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo media_url('frontend/images/slide-1.jpg') ?>" alt="photoslider1" width="1920" height="801"/>
        <div class="carousel-caption">
          <div class="container">
            <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-right no-padding">
              <h4 data-animation="animated bounceInLeft">iLC</h4>
              <h3 data-animation="animated fadeInDown"><span>Learning Center</span></h3>
              <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="<?php echo media_url('frontend/images/slide-2.jpg') ?>" alt="photoslider2" width="1920" height="801"/>
        <div class="carousel-caption">
          <div class="container">
            <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-left no-padding">
              <h4 data-animation="animated bounceInLeft">iLC</h4>
              <h3 data-animation="animated fadeInDown"><span>Learning Center</span></h3>
              <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
</div><!-- PhotoSlider Section /- --> 
<!-- Welcome Section -->
<div class="container welcome-section">
  <div class="section-padding"></div>
  <div class="section-header">
    <h3>Pelatihan <span>Terbaru</span></h3>
  </div>
  <div class="row">
    <?php foreach($training as $row): ?>
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="welcome-box">
          <div class="imgLiquidFill imgLiquid" style="width:auto; height:300px;">
            <img src="<?php echo upload_url('training/'.$row['training_brocure']) ?>">
          </div>
          <div class="welcome-title">
            <h3><?php echo $row['training_name'] ?></h3>
          </div>  
          <div class="welcome-content">
            <br>
            <ul class="course-detail">
              <li><i class="fa fa-calendar" aria-hidden="true"></i>Date : <span><?php echo pretty_date($row['training_date_start'],'d-M-Y',false) . ' - '.pretty_date($row['training_date_end'],'d-M-Y',false) ?></span></li>
              <li><i class="fa fa-dollar" aria-hidden="true"></i> Price : <span><?php echo 'Rp. '. number_format($row['training_price']) ?></span></li>
              <li><i class="fa fa-building" aria-hidden="true"></i>Place : <span><?php echo $row['training_place'] ?></span></li>
            </ul>
            <a href="<?php echo training_url($row) ?>">Detail</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="section-padding"></div>
</div><!-- Welcome Section /- -->

<!-- Event Section -->
<div class="container event-section">
  <div class="section-padding"></div> 
  <div class="section-header-block">
    <div class="section-header">
      <h3>Our <span>Events</span></h3>
    </div>
    <a href="<?php echo site_url('event') ?>" title="View All">View All</a>
  </div>
  <div class="event-block">
    <?php foreach($event as $row): ?>
      <div class="event-box">
        <div class="row">
          <div class="col-md-3 col-sm-4 col-xs-5">
            <div class="imgLiquidFill imgLiquid" style="width:260px; height:160px;">
              <img src="<?php echo upload_url('gallery/'.$row['gallery_image']) ?>">
            </div>
          </div>
          <div class="col-md-7 col-sm-6 col-xs-7">
            <h3><a href="#"><?php echo $row['gallery_name'] ?></a></h3>
            <div class="event-meta">
              <span><i aria-hidden="true" class="fa fa-calendar"></i><?php echo pretty_date($row['gallery_date'],'d F Y',false) ?></span>
              <span><i aria-hidden="true" class="fa fa-map-marker"></i><?php echo $row['gallery_place'] ?></span>
            </div>
            <p><?php echo $row['gallery_desc'] ?></p>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <a href="<?php echo site_url('event/detail/'.$row['gallery_id']) ?>" class="readmore" title="Read More">Read More</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="section-padding"></div>
</div><!-- Event Section /- --> 

<div style="background-color: #eee">
  <div class="container">
    <div class="section-header">
      <h3 style="margin-top: 20px;">Our <span>Client</span></h3>
      <?php foreach($client as $row): ?>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <div class="imgLiquidFill imgLiquid" style="width:100px; height:100px;">
            <img src="<?php echo upload_url('client/'.$row['client_image']) ?>">
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>