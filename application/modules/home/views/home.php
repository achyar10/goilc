<style type="text/css">
a{
  color:#fff;
}
</style>
<div class="photoslider-section container-fluid no-padding">
  <div id="home-slider" class="carousel slide" data-ride="carousel" data-interval="3500">
    <div class="carousel-inner" role="listbox">
      <?php $active = 'active' ?>
      <?php foreach ($slide as $row): ?>
        <div class="item <?php echo $active ?>">
          <img src="<?php echo upload_url('slideshow/'.$row['slideshow_image']) ?>" alt="photoslider1" width="1920" height="801"/>
          <div class="carousel-caption" style="display:block;">
            <div class="container">
              <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-right no-padding">
                <h4 data-animation="animated bounceInLeft">iLC</h4>
                <h3 data-animation="animated fadeInDown"><span>Learning Center</span></h3>
                <p data-animation="animated bounceInRight">We believe nothing is more important than education. The best learning institution</p>
              </div>
            </div>
          </div>
        </div>
        <?php $active = NULL ?>
      <?php endforeach; ?>
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
    <h3>Running soon workshop <span>&</span> discussion</h3>
  </div>
  


  <div class="row">
    <div class="col-xs-12 col-md-12">

      <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi">
        <div class="carousel-inner">
          <?php $active = 'active' ?>
          <?php foreach ($training as $row): ?>
            <div class="item <?php echo $active ?>">
              <div class="carousel-col">
                <div class="img-responsive">
                  <div class="welcome-box">
                    <div class="imgLiquidFill imgLiquid" style="width:auto; height:300px;">
                      <img src="<?php echo upload_url('training/'.$row['training_brocure']) ?>">
                    </div>
                    <div class="welcome-title">
                      <h3><?php echo $row['training_name'] ?></h3>
                    </div>  
                    <div class="welcome-content">
                      <p><?php echo $row['category_name'] ?></p>
                      <ul class="course-detail">
                        <li><i class="fa fa-calendar" aria-hidden="true"></i>Date : <span><?php echo pretty_date($row['training_date_start'],'d-M-Y',false) . ' - '.pretty_date($row['training_date_end'],'d-M-Y',false) ?></span></li>
                        <li><i class="fa fa-dollar" aria-hidden="true"></i> Price : <span><?php echo 'Rp. '. number_format($row['training_price']).' /participant' ?></span></li>
                        <li><i class="fa fa-building" aria-hidden="true"></i>Place : <span><?php echo $row['training_place'] ?></span></li>
                      </ul>
                      <a href="<?php echo training_url($row) ?>">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $active = NULL ?>
          <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <div class="left carousel-control">
          <a href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
        </div>
        <div class="right carousel-control">
          <a href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </div>
  </div>

  
  <div class="section-header-block">
    <a href="<?php echo site_url('training') ?>" class="" >View All</a>
  </div>
  <div class="section-padding"></div>
</div><!-- Welcome Section /- -->

<!-- Event Section -->
<div class="container event-section">
  <div class="section-padding"></div> 
  <div class="section-header-block">
    <div class="section-header">
      <h3>Available Training Public <span>&</span> In House</h3>
    </div>
    <a href="<?php echo site_url('training') ?>" title="View All">View All</a>
  </div>
  <div class="event-block">
    <?php foreach($inhouse as $row): ?>
      <div class="event-box">
        <div class="row">
          <div class="col-md-9">
            <h3><a href="<?php echo training_url($row) ?>"><?php echo $row['training_name'] ?></a></h3>
            <div class="event-meta">
              <span><i aria-hidden="true" class="fa fa-calendar"></i><?php echo pretty_date($row['training_date_start'],'d F Y',false) ?></span>
              <span><i aria-hidden="true" class="fa fa-map-marker"></i><?php echo $row['training_place'] ?></span>
            </div>
            <p><?php echo strip_tags(character_limiter($row['training_cover_letter'],20)) ?></p>
          </div>
          <div class="col-md-3 col-sm-2 col-xs-12">
            <a href="<?php echo training_url($row) ?>" class="readmore" title="Read More">Read More</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="section-padding"></div>
</div><!-- Event Section /- --> 
<script src="<?php echo media_url('frontend/js/slick.js') ?>">
</script>

<div class="container">
  <div class="section-header">
    <h3 style="margin-top: 20px;">Our <span>Client</span></h3>
    <section class="customer-logos slider">
      <?php foreach($client as $row): ?>
        <div class="slide">
          <img src="<?php echo upload_url('client/'.$row['client_image']) ?>">
        </div>
      <?php endforeach; ?>
    </section>
  </div>
</div>