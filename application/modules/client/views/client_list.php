<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/client/add') ?>" class="btn btn-warning btn-sm pull-right">Tambah Client</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Client</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($client)) {
								$i = 1;
								foreach ($client as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['client_name']; ?></td>
										<td><img src="<?php echo upload_url('client/'.$row['client_image']) ?>"></td>
										<td>
											<a href="<?php echo site_url('manage/client/edit/'.$row['client_id']) ?>" class="btn btn-success btn-xs">Edit</a>
										</td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="4" align="center">Data Empty</td>
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