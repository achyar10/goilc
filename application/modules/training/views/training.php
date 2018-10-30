
<div class="container-fluid no-padding pagebanner">
	<div class="container">
		<div class="pagebanner-content">
			<h3 style="margin-top: -60px;"><?php echo $title ?></h3>
			<ol class="breadcrumb" style="margin-top: -60px;">
				<li><a href="<?php echo site_url('home') ?>">Home</a></li>
				<li><?php echo $title ?></li>
			</ol>
		</div>
	</div>
</div><!-- PageBanner /- -->
<!-- Welcome Section -->
<div class="container welcome-section welcome2"> 
	<div class="section-padding"></div>	
	<?php echo form_open(current_url(), array('method' => 'get')) ?>
	<div class="search-result">
		<div class="input-group col-md-2">
			<input type="text" class="form-control" name="n" placeholder="Search training">
			<span class="input-group-btn">
				<button class="btn" type="submit"><i class="fa fa-search"></i></button>
			</span>
		</div>
		<?php echo form_close(); ?>
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
						<a href="<?php echo training_url($row) ?>" style="color: #fff;">Detail</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>
<div class="section-padding"></div>