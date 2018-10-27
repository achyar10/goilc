<?php
$this->load->view('manage/tinymce_init');
if (isset($recruitment)) {
	$id 						= $recruitment['recruitment_id'];
	$inputNameValue = $recruitment['recruitment_title'];
	$inputLetterValue = $recruitment['recruitment_letter'];
	$inputStatus = $recruitment['recruitment_status'];
} else {
	$inputNameValue = set_value('recruitment_name');
	$inputLetterValue = set_value('recruitment_letter');
	$inputStatus = set_value('recruitment_status');

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
					<?php if (isset($recruitment)) { ?>
						<input type="hidden" name="recruitment_id" value="<?php echo $recruitment['recruitment_id']; ?>">
					<?php } ?>

					<div class="form-group">
						<label>Judul</label>
						<input name="recruitment_title" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Judul">
					</div>
					<div class="form-group">
						<label>Detil Karir</label>
						<textarea rows="15" class="mce-init" name="recruitment_letter" placeholder="Isi"><?php echo $inputLetterValue ?></textarea>
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
						<input type="radio" name="recruitment_status" value="1" <?php echo ($inputStatus == 1) ? 'checked' : '' ?>> Publish
					</label>&nbsp;&nbsp;&nbsp;
					<label>
						<input type="radio" name="recruitment_status" value="0" <?php echo ($inputStatus == 0) ? 'checked' : '' ?>> Draft
					</label>
					</div>

					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/recruitment') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
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