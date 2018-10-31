<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/users/add') ?>" class="btn btn-warning btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Pengguna</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>Nama Lengkap</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($user)) {
								$i = 1;
								foreach ($user as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['user_email']; ?></td>
										<td><?php echo $row['user_full_name']; ?></td>
										<td><?php echo $row['role_name']; ?></td>
										<td>
											<?php if ($this->session->userdata('uid') != $row['user_id']) { ?>
											<a href="<?php echo site_url('manage/users/view/' . $row['user_id']) ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
												<?php } else { ?>
													<a href="<?php echo site_url('manage/profile') ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
												<?php } ?>
											<?php if ($this->session->userdata('uid') != $row['user_id']) { ?>
												<a href="<?php echo site_url('manage/users/rpw/' . $row['user_id']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-lock" data-toggle="tooltip" title="Reset Password"></i></a>
											<?php } else {
												?>
												<a href="<?php echo site_url('manage/profile/cpw/'); ?>" class="btn btn-xs btn-warning"><i class="fa fa-rotate-left" data-toggle="tooltip" title="Change Password"></i></a>
											<?php } ?>

										</td>	
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="6" align="center">Data Kosong</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</section>