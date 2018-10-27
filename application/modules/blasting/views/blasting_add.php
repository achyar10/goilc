<?php
$this->load->view('manage/tinymce_init');
if (isset($blasting)) {
	$id 						= $blasting['blasting_id'];
	$inputNameValue = $blasting['blasting_title'];
	$inputLetterValue = $blasting['blasting_letter'];
} else {
	$inputNameValue = set_value('blasting_name');
	$inputLetterValue = set_value('blasting_letter');

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
					<?php if (isset($blasting)) { ?>
						<input type="hidden" name="blasting_id" value="<?php echo $blasting['blasting_id']; ?>">
					<?php } ?>

					<div class="form-group">
						<label>Judul</label>
						<input name="blasting_title" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Nama Pelayanan">
					</div>
					<div class="form-group">
						<label>Isi</label>
						<textarea rows="15" class="mce-init" name="blasting_letter" placeholder="Isi"><?php echo $inputLetterValue ?></textarea>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/blasting') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

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