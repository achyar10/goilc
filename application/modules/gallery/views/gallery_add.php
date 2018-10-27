<?php

if (isset($gallery)) {
	$id 						= $gallery['gallery_id'];
	$inputNameValue = $gallery['gallery_name'];
	$inputPlaceValue = $gallery['gallery_place'];
	$inputDescValue = $gallery['gallery_desc'];
	$inputDateValue = $gallery['gallery_date'];
	
} else {
	$inputNameValue = set_value('gallery_name');
	$inputPlaceValue = set_value('gallery_place');
	$inputDescValue = set_value('gallery_desc');
	$inputDateValue = set_value('gallery_date');
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
					<?php if (isset($gallery)) { ?>
						<input type="hidden" name="gallery_id" value="<?php echo $gallery['gallery_id']; ?>">
					<?php } ?>
					
					<div class="form-group">
						<label>Nama Gallery</label>
						<input name="gallery_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Nama gallery">
					</div>

					<div class="form-group">
						<label>Tempat Pelaksanaan</label>
						<input name="gallery_place" type="text" class="form-control" value="<?php echo $inputPlaceValue ?>" placeholder="Tempat Pelaksanaan">
					</div>

					<div class="form-group">
						<label>Tanggal Pelaksanaan</label>
						<input name="gallery_date" type="text" class="form-control date" value="<?php echo $inputDateValue ?>" placeholder="Tanggal Pelaksanaan">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="gallery_desc" placeholder="Deskripsi"><?php echo $inputDescValue ?></textarea>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<div class="form-group">
						<label for="exampleInputFile">Upload</label>
						<a href="#" class="thumbnail">
							<?php if (isset($gallery) AND $gallery['gallery_image'] != NULL) { ?>
								<img src="<?php echo upload_url('gallery/' . $gallery['gallery_image']) ?>" class="img-responsive img-thumbnail">
							<?php } else { ?>
								<img id="target" src="<?php echo media_url('img/missing_image.png') ?>" alt="Choose image to upload">
							<?php } ?>
						</a>
						<input type='file' id="gallery_image" name="gallery_image">
					</div>
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/gallery') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
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

	$("#gallery_image").change(function() {
		readURL(this);
	});
</script>

<script type="text/javascript">
	$('form').submit(function(event) {
		if ($(this).hasClass('submitted')) {
			event.preventDefault();
		} else {
			$(this).find(':submit')
			.html('<i class="fa fa-spinner fa-spin"></i> Loading...')
			.attr('disabled', 'disabled');
			$(this).addClass('submitted');
		}
	});
</script>