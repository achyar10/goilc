<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<div class="row">
					<div class="col-md-3">
						<?php if (isset($user) AND $user['user_image'] != NULL) { ?>
							<img src="<?php echo upload_url('users/' . $user['user_image']) ?>" class="img-responsive img-thumbnail">
						<?php } else { ?>
							<img src="<?php echo media_url('img/missing.png') ?>" class="img-responsive img-thumbnail">
						<?php } ?>
					</div>
					<div class="col-md-9">
						<div class="table-responsive">
							<table class="table table-hover">
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $user['user_email'] ?></td>
								</tr>
								<tr>
									<td>Full Name</td>
									<td>:</td>
									<td><?php echo $user['user_full_name'] ?></td>
								</tr>
								<tr>
									<td>Description</td>
									<td>:</td>
									<td><?php echo $user['user_description'] ?></td>
								</tr>
								<tr>
									<td>Roles</td>
									<td>:</td>
									<td><?php echo $user['role_name'] ?></td>
								</tr>
								<tr>
									<td>Created Date</td>
									<td>:</td>
									<td><?php echo pretty_date($user['user_input_date'],'d F Y',false) ?></td>
								</tr>
							</table>
							<a href="<?php echo site_url('manage/profile') ?>" class="btn btn-primary btn-sm">Back</a>
							<a href="<?php echo site_url('manage/profile/edit') ?>" class="btn btn-success btn-sm">Edit</a>
							<a href="<?php echo site_url('manage/profile/cpw') ?>" class="btn btn-warning btn-sm">Change Password</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>