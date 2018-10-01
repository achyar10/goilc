<?php

if (isset($visualisation)) {
	$id 						= $visualisation['visualisation_id'];
	$inputNameValue = $visualisation['visualisation_name'];
	$inputDataValue = $visualisation['visualisation_dataset'];
	$inputSourceValue = $visualisation['visualisation_source'];
	$inputDescValue = $visualisation['visualisation_desc'];
	$inputLinkValue = $visualisation['visualisation_link'];
} else {
	$inputNameValue = set_value('visualisation_name');
	$inputDataValue = set_value('visualisation_dataset');
	$inputSourceValue = set_value('visualisation_source');
	$inputDescValue = set_value('visualisation_desc');
	$inputLinkValue = set_value('visualisation_link');
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
					<?php if (isset($visualisation)) { ?>
						<input type="hidden" name="visualisation_id" value="<?php echo $visualisation['visualisation_id']; ?>">
					<?php } ?>
					

					<div class="form-group">
						<label>Title</label>
						<input name="visualisation_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Title">
					</div>


					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="visualisation_desc" placeholder="Description"><?php echo $inputDescValue ?></textarea>
					</div>
					<div class="form-group">
						<label>Link Dataset</label>
						<input name="visualisation_dataset" type="text" class="form-control" value="<?php echo $inputDataValue ?>" placeholder="Link Dataset">
					</div>
					<div class="form-group">
						<label>Data Source</label>
						<input name="visualisation_source" type="text" class="form-control" value="<?php echo $inputSourceValue ?>" placeholder="Data Source">
					</div>

					<div class="form-group">
						<label>Embed Tableau</label>
						<textarea class="form-control" name="visualisation_link" placeholder="Embed Link Tableau"><?php echo $inputLinkValue ?></textarea>
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
							<?php if (isset($visualisation) AND $visualisation['visualisation_image'] != NULL) { ?>
								<img src="<?php echo upload_url('visualisation/' . $visualisation['visualisation_image']) ?>" class="img-responsive img-thumbnail">
							<?php } else { ?>
								<img id="target" src="<?php echo media_url('img/missing_image.png') ?>" alt="Choose image to upload">
							<?php } ?>
						</a>
						<input type='file' id="visualisation_image" name="visualisation_image">
					</div>
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/visualisation') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
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

	$("#visualisation_image").change(function() {
		readURL(this);
	});
</script>