<?php
if (isset($slideshow)) {
	$id 						= $slideshow['slideshow_id'];
	$inputNameValue = $slideshow['slideshow_name'];
	$inputStatus = $slideshow['slideshow_status'];
} else {
	$inputNameValue = set_value('slideshow_name');
	$inputStatus = set_value('slideshow_status');

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
					<?php if (isset($slideshow)) { ?>
						<input type="hidden" name="slideshow_id" value="<?php echo $slideshow['slideshow_id']; ?>">
					<?php } ?>

					<div class="form-group">
						<label>Judul</label>
						<input name="slideshow_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Judul">
					</div>
					<div class="form-group">
						<label for="slideshow_image">Upload Gambar Slide Ukuran 1920x801</label>
						<a href="#" class="thumbnail">
							<?php if (isset($slideshow) AND $slideshow['slideshow_image'] != NULL) { ?>
								<img src="<?php echo upload_url('slideshow/' . $slideshow['slideshow_image']) ?>" class="img-responsive img-thumbnail">
							<?php } else { ?>
								<img id="target" src="<?php echo media_url('img/missing_image.png') ?>" alt="Choose image to upload">
							<?php } ?>
						</a>
						<input type='file' id="slideshow_image" name="slideshow_image">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<div class="form-group">
						<label>Status</label><br>
						<label>
						<input type="radio" name="slideshow_status" value="1" <?php echo ($inputStatus == 1) ? 'checked' : '' ?>> Publish
					</label>&nbsp;&nbsp;&nbsp;
					<label>
						<input type="radio" name="slideshow_status" value="0" <?php echo ($inputStatus == 0) ? 'checked' : '' ?>> Draft
					</label>
					</div>

					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/slideshow') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
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

	$("#slideshow_image").change(function() {
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