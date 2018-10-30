<style type="text/css">
  a{
    color:#fff;
  }
</style>
<div class="photoslider-section container-fluid no-padding">
  <div id="home-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo media_url('frontend/images/photoslider1.jpg') ?>" alt="photoslider1" width="1920" height="801"/>
        <div class="carousel-caption">
          <div class="container">
            <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-right no-padding">
              <h4 data-animation="animated bounceInLeft">Welcome</h4>
              <h3 data-animation="animated fadeInDown">To Our<span>University</span></h3>
              <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="<?php echo media_url('frontend/images/photoslider2.jpg') ?>" alt="photoslider2" width="1920" height="801"/>
        <div class="carousel-caption">
          <div class="container">
            <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-left no-padding">
              <h4 data-animation="animated bounceInLeft">Welcome</h4>
              <h3 data-animation="animated fadeInDown">To Our<span>University</span></h3>
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
      <div class="event-box">
        <div class="row">
          <div class="col-md-3 col-sm-4 col-xs-5">
            <img src="<?php echo media_url('frontend/images/event1.jpg') ?>" alt="event1" width="260" height="160"/>
          </div>
          <div class="col-md-7 col-sm-6 col-xs-7">
            <h3><a href="#" title="Science In The New Era">Science In The New Era</a></h3>
            <div class="event-meta">
              <span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
              <span><i aria-hidden="true" class="fa fa-map-marker"></i>London, UK</span>
            </div>
            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <a href="#" class="readmore" title="Read More">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="section-padding"></div>
  </div><!-- Event Section /- --> 
  
  
  <!-- LatestBlog Section -->
  <div class="container-fulid no-padding latestblog-section">
    <div class="section-padding"></div>
    <div class="container">
      <div class="section-header">
        <h3>Latest <span> Blog Post</span></h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-6">
          <article class="type-post">
            <div class="entry-cover">
              <a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="<?php echo media_url('frontend/images/latestblog1.jpg') ?>"></a>
            </div>
            <div class="entry-block">
              <div class="entry-contentblock">
                <div class="entry-meta">
                  <span class="postdate">25th May 2016</span>
                  <span class="postby">Posted by <a href="#" title="Methov jos">Methov jos</a></span>
                </div>
                <div class="entry-block">
                  <div class="entry-title">
                    <a title="Doloremque laudantium totam..." href="blogpost-page.html"><h3>Doloremque laudantium totam...</h3></a>
                  </div>
                </div>
              </div>
              <div class="post-ic"><span class="icon icon-Pencil"></span></div>
            </div>
          </article>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
          <article class="type-post">
            <div class="entry-cover">
              <a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="<?php echo media_url('frontend/images/latestblog2.jpg') ?>"></a>
            </div>
            <div class="entry-block">
              <div class="entry-contentblock">
                <div class="entry-meta">
                  <span class="postdate">25th May 2016</span>
                  <span class="postby">Posted by <a href="#" title="Methov jos">Jennu Doe</a></span>
                </div>
                <div class="entry-block">
                  <div class="entry-title">
                    <a title="Minim veniam quis nostrud..." href="blogpost-page.html"><h3>Minim veniam quis nostrud...</h3></a>
                  </div>
                </div>
              </div>
              <div class="post-ic"><span class="icon icon-MusicMixer"></span></div>
            </div>
          </article>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
          <article class="type-post">
            <div class="entry-cover">
              <a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="<?php echo media_url('frontend/images/latestblog3.jpg') ?>"></a>
            </div>
            <div class="entry-block">
              <div class="entry-contentblock">
                <div class="entry-meta">
                  <span class="postdate">25th May 2016</span>
                  <span class="postby">Posted by <a href="#" title="Methov jos">Steave Smith</a></span>
                </div>
                <div class="entry-block">
                  <div class="entry-title">
                    <a title="Perspiciatis unde omnis iste..." href="blogpost-page.html"><h3>Perspiciatis unde omnis iste...</h3></a>
                  </div>
                </div>
              </div>
              <div class="post-ic"><span class="icon icon-Starship"></span></div>
            </div>
          </article>
        </div>
      </div>
      <div class="post-viewall">
        <a href="blog-page.html"  title="View All post">View All post</a>
      </div>
    </div>
    <div class="section-padding"></div>
  </div>