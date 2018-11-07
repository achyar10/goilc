<div class="container-fluid no-padding pagebanner">
	<div class="container">
		<div class="pagebanner-content">
			<h3 style="margin-top: -60px;"><?php echo $training['training_name'] ?></h3>
			<ol class="breadcrumb" style="margin-top: -60px;">
				<li><a href="<?php echo site_url('home') ?>">Home</a></li>
				<li><?php echo $title ?></li>
			</ol>
		</div>
	</div>
</div>
<div class="container coursesdetail-section">
	<div class="section-padding"></div>
	<div class="row">
		<div class="col-md-9 col-sm-8 event-contentarea">
			<div class="coursesdetail-block">
				<img src="<?php echo upload_url('training/'.$training['training_brocure']) ?>">
				<div class="course-description">
					<h3 class="course-title">Cover Letter</h3>
					<?php echo $training['training_cover_letter'] ?>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 event-sidebar">
			<div class="courses-features">
				<h3 class="text-left"><?php echo $training['training_name'] ?></h3>
				<h3 style="font-size: 10pt"><?php echo $training['category_name'] ?></h3>
				<hr>
				<div class="featuresbox">
					<i class="fa fa-dollar"></i> <span> <?php echo 'Rp. '. number_format($training['training_price']). '/participant' ?></span>
				</div>
				<div class="featuresbox">
					<i class="fa fa-building"></i> <span><?php echo $training['training_place'] ?></span>
				</div>
				<div class="featuresbox">
					<i class="fa fa-calendar"></i> <span> <?php echo pretty_date($training['training_date_start'],'d-M-Y',false).' s/d '.pretty_date($training['training_date_end'],'d-M-Y',false) ?></span>
				</div>
				<div class="featuresbox">
					<i class="fa fa-clock-o"></i> <span> <?php echo $training['training_time'].' WIB' ?></span>
				</div>
				<div class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
					<a href="<?php echo site_url('register/regtraining/'.$training['training_id']) ?>" class="btn btn-default btn-next">Apply</a>
				</div>
				<div class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
					<a href="<?php echo upload_url('silabus/'.$training['training_silabus']) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download Silabus</a>
				</div>
			</div>
		</div>
	</div>
</div>