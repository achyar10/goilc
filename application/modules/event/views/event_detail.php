<div class="container-fluid no-padding pagebanner">
	<div class="container">
		<div class="pagebanner-content">
			<h3 style="margin-top: -60px;"><?php echo $event['gallery_name'] ?></h3>
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
		<div class="col-md-7 col-sm-8 event-contentarea">
			<div class="coursesdetail-block">
				<img src="<?php echo upload_url('gallery/'.$event['gallery_image']) ?>">
			</div>
		</div>
		<div class="col-md-4">
			<h4>Place</h4>
			<?php echo $event['gallery_place'] ?>
			<h4>Date</h4>
			<?php echo pretty_date($event['gallery_date'],'d F Y',false) ?>
			<h4>Description</h4>
			<?php echo $event['gallery_desc'] ?>
		</div>
		
	</div>
</div>