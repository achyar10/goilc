<?php

if (isset($client)) {
	$id 						= $client['client_id'];
	$inputNameValue = $client['client_name'];
	
} else {
	$inputNameValue = set_value('client_name');
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
					<?php if (isset($client)) { ?>
						<input type="hidden" name="client_id" value="<?php echo $client['client_id']; ?>">
					<?php } ?>
					
					<div class="form-group">
						<label>Nama Client</label>
						<input name="client_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Nama Client">
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<div class="form-group">
						<label for="exampleInputFile">Upload Logo Client</label>
						<a href="#" class="thumbnail">
							<?php if (isset($client) AND $client['client_image'] != NULL) { ?>
								<img src="<?php echo upload_url('client/' . $client['client_image']) ?>" class="img-responsive img-thumbnail">
							<?php } else { ?>
								<img id="target" src="<?php echo media_url('img/missing_image.png') ?>" alt="Choose image to upload">
							<?php } ?>
						</a>
						<input type='file' id="client_image" name="client_image">
					</div>
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/client') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#target').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#client_image").change(function() {
		readURL(this);
	});
</script>