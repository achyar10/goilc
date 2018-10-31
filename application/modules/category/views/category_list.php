<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/category/add') ?>" class="btn btn-warning btn-sm pull-right">Tambah Kategori</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($category)) {
								$i = 1;
								foreach ($category as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['category_name']; ?></td>
										<td>
											<a href="<?php echo site_url('manage/category/edit/'.$row['category_id']) ?>" class="btn btn-success btn-xs">Edit</a>
											<button type="button" data-target="#deleteModal" class="btn btn-xs btn-danger" data-toggle="modal">Delete</button>
										</td>
									</tr>

									<div class="modal fade" id="deleteModal">
										<div class="modal-dialog">
											<form method="POST" action="<?php echo site_url('manage/category/delete/'.$row['category_id']) ?>">
												<input type="hidden" name="category_id">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title">Konfirmasi Hapus</h4>
													</div>
													<div class="modal-body">
														<p class="help-block">Apakah anda yakin ingin menghapus data ini?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
													</div>
												</div>
											</form>
										</div>
									</div>

									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="3" align="center">Data Kosong</td>
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
