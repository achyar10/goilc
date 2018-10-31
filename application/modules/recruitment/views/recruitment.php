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
</div>
<div class="container event-section">
	<div class="section-padding"></div>			
	<div class="event-block">
		<?php 
		if (!empty($recruitment)) {
			foreach($recruitment as $row): ?>
				<div class="event-box">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-5">
							<div class="imgLiquidFill imgLiquid" style="width:260px; height:160px;">
								<img src="<?php echo media_url('frontend/images/carrer.jpg') ?>">
							</div>
						</div>
						<div class="col-md-7 col-sm-6 col-xs-7">
							<h3><a href="<?php echo site_url('recruitment/detail/'.$row['recruitment_id']) ?>"><?php echo $row['recruitment_title'] ?></a></h3>
							<p><?php echo $row['recruitment_letter'] ?></p>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<a href="<?php echo site_url('recruitment/detail/'.$row['recruitment_id']) ?>" class="readmore" title="Read More">Read More</a>
						</div>
					</div>
				</div>
			<?php endforeach; 
		} else {
			?>
			<div class="section-header">
				<h3>Maaf Lowongan Belum Tersedia</h3>
			</div>
		<?php } ?>
	</div>
	<?php echo $this->pagination->create_links(); ?>
	<div class="section-padding"></div>
</div>