<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/blasting/add') ?>" class="btn btn-warning btn-xs pull-right"><i class="fa fa-plus"></i> Tambah Blasting</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Tanggal Buat</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($blasting)) {
								$i = 1;
								foreach ($blasting as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['blasting_title']; ?></td>
										<td><?php echo pretty_date($row['blasting_input_date'],'d F Y',false); ?></td>
										<td><label class="label <?php echo ($row['blasting_status']==0) ? 'label-warning' : 'label-success' ?>"><?php echo ($row['blasting_status']==0) ? 'Belum Kirim' : 'Sudah Kirim' ?></label></td>
										<td>
											<a href="<?php echo site_url('manage/blasting/view/'.$row['blasting_id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat</a>
											<a href="<?php echo site_url('manage/blasting/edit/'.$row['blasting_id']) ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
											<a href="<?php echo site_url('manage/blasting/send_blasting/'.$row['blasting_id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda akan memblasting pesan ini?')"><i class="fa fa-envelope"></i> Blasting</a>
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