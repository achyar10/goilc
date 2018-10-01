<?php

if (isset($service)) {
	$id 						= $service['service_id'];
	$inputNameValue = $service['service_name'];
} else {
	$inputNameValue = set_value('service_name');

}
?>

<section class="app-content">
	<div class="row">
		<?php echo form_open_multipart(current_url()); ?>
		<div class="col-md-9">
			<div class="widget">
				<header class="widget-header">
					<h4 class="widget-title"><?php echo isset($title) ? '' . $title : null; ?></h4>
				</header><!-- .widget-header -->
				<hr class="widget-separator">
				<div class="widget-body">
					
					<?php echo validation_errors(); ?>
					<?php if (isset($service)) { ?>
						<input type="hidden" name="service_id" value="<?php echo $service['service_id']; ?>">
					<?php } ?>

					<div class="form-group">
						<label>Nama Pelayanan</label>
						<input name="service_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Nama Pelayanan">
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/service') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>