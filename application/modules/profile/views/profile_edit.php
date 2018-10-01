<?php

if (isset($user)) {
	$id = $user['user_id'];
	$inputFullnameValue = $user['user_full_name'];
	$inputRoleValue = $user['user_role_role_id'];
	$inputEmailValue = $user['user_email'];
	$inputDescValue = $user['user_description'];
} else {
	$inputFullnameValue = set_value('user_full_name');
	$inputRoleValue = set_value('user_role_role_id');
	$inputEmailValue = set_value('user_email');
	$inputDescValue = set_value('user_description');
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

					<?php if (isset($user)) { ?>
						<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
					<?php } ?>
					<div class="form-group">
						<label>Email <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
						<input name="user_email" type="text" class="form-control" <?php echo (isset($user)) ? 'disabled' : ''; ?> value="<?php echo $inputEmailValue ?>" placeholder="email">
					</div> 

					<div class="form-group">
						<label>Full Name <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
						<input name="user_full_name" type="text" class="form-control" value="<?php echo $inputFullnameValue ?>" placeholder="Full Name">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="user_description" placeholder="Description"><?php echo $inputDescValue ?></textarea>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<div class="form-group">
					<label >Photo</label>
					<a href="#" class="thumbnail">
						<?php if (isset($user) AND $user['user_image'] != NULL) { ?>
							<img src="<?php echo upload_url('users/' . $user['user_image']) ?>" class="img-responsive avatar">
						<?php } else { ?>
							<img id="target" src="<?php echo media_url('img/missing.png') ?>" alt="Choose image to upload">
						<?php } ?>
					</a>
					<input type='file' id="user_image" name="user_image">
					</div>
					<button type="submit" class="btn btn-block btn-success">Save</button>
					<a href="<?php echo site_url('manage/profile'); ?>" class="btn btn-block btn-info">Cancel</a>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	<!-- /.row -->
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

	$("#user_image").change(function() {
		readURL(this);
	});
</script>