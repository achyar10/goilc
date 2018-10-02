<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/gallery/add') ?>" class="btn btn-warning btn-sm pull-right">Tambah Gallery</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($gallery)) {
								$i = 1;
								foreach ($gallery as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['gallery_name']; ?></td>
										<td>
											<a href="<?php echo site_url('manage/gallery/edit/'.$row['gallery_id']) ?>" class="btn btn-success btn-xs">Edit</a>
										</td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="3" align="center">Data Empty</td>
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