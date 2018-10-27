<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/slideshow/add') ?>" class="btn btn-warning btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Slideshow</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Nama SLide</th>
							<th>Tanggal Buat</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($slideshow)) {
								$i = 1;
								foreach ($slideshow as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['slideshow_name']; ?></td>
										<td><?php echo pretty_date($row['slideshow_input_date'],'d F Y',false); ?></td>
										<td><label class="label <?php echo ($row['slideshow_status']==0) ? 'label-warning' : 'label-success' ?>"><?php echo ($row['slideshow_status']==0) ? 'Draft' : 'Publish' ?></label></td>
										<td>
											<a href="<?php echo site_url('manage/slideshow/view/'.$row['slideshow_id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat</a>
											<a href="<?php echo site_url('manage/slideshow/edit/'.$row['slideshow_id']) ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
										</td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="5" align="center">Data Empty</td>
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