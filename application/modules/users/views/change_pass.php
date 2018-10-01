<section class="app-content">
	<?php echo form_open(current_url()); ?>
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-9">
			<div class="widget">
				<header class="widget-header">
					<h4 class="widget-title"><?php echo isset($title) ? '' . $title : null; ?></h4>
				</header><!-- .widget-header -->
				<hr class="widget-separator">
				<div class="widget-body">
					<?php echo validation_errors(); ?>
					<?php if ($this->uri->segment(3) == 'cpw') { ?>
						<div class="form-group">
							<label >Old Password *</label>
							<input type="password" name="user_current_password" class="form-control" placeholder="Old Password">
						</div>
					<?php } ?>
					<div class="form-group">
						<label>New Password*</label>
						<input type="password" name="user_password" class="form-control" placeholder="New Password">
						<?php if ($this->uri->segment(3) == 'cpw') { ?>
							<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('uid'); ?>" >
						<?php } else { ?>
							<input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>" >
						<?php } ?>
					</div>
					<div class="form-group">
						<label> New Password Confirmation*</label>
						<input type="password" name="passconf" class="form-control" placeholder="New Password Confirmation" >
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<button type="submit" class="btn btn-block btn-success">Save</button>
					<a href="<?php echo site_url('manage/users'); ?>" class="btn btn-block btn-info">Cancel</a>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</section>