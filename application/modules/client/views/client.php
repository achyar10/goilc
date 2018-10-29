<div class="container-fluid no-padding contactus-section">
	<div class="container">
		<div class="section-header">
			<h3>Client <span>Kami</span></h3>
			<?php foreach($client as $row): ?>
				<div class="col-md-2 col-sm-3 col-xs-6">
					<img src="<?php echo upload_url('client/'.$row['client_image']) ?>" class="img-responsive">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>