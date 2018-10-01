<?php

if (isset($infografis)) {
	$id 						= $infografis['infografis_id'];
	$inputNameValue = $infografis['infografis_name'];
	$inputSourceValue = $infografis['infografis_source'];
	$inputDescValue = $infografis['infografis_desc'];
} else {
	$inputNameValue = set_value('infografis_name');
	$inputSourceValue = set_value('infografis_source');
	$inputDescValue = set_value('infografis_desc');
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
					<?php if (isset($infografis)) { ?>
						<input type="hidden" name="infografis_id" value="<?php echo $infografis['infografis_id']; ?>">
					<?php } ?>
					

					<div class="form-group">
						<label>Title</label>
						<input name="infografis_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Title">
					</div>


					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="infografis_desc" placeholder="Description"><?php echo $inputDescValue ?></textarea>
					</div>
					
					<div class="form-group">
						<label>Data Source</label>
						<input name="infografis_source" type="text" class="form-control" value="<?php echo $inputSourceValue ?>" placeholder="Data Source">
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<div class="form-group">
						<label for="exampleInputFile">Upload Image</label>
						<a href="#" class="thumbnail">
							<?php if (isset($infografis) AND $infografis['infografis_image'] != NULL) { ?>
								<img src="<?php echo upload_url('infografis/' . $infografis['infografis_image']) ?>" class="img-responsive img-thumbnail">
							<?php } else { ?>
								<img id="target" src="<?php echo media_url('img/missing_image.png') ?>" alt="Choose image to upload">
							<?php } ?>
						</a>
						<input type='file' id="infografis_image" name="infografis_image">
					</div>
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/infografis') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
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

	$("#infografis_image").change(function() {
		readURL(this);
	});
</script>