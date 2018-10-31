<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/recruitment/add') ?>" class="btn btn-warning btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Karir</a></h4>
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
							if (!empty($recruitment)) {
								$i = 1;
								foreach ($recruitment as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['recruitment_title']; ?></td>
										<td><?php echo pretty_date($row['recruitment_input_date'],'d F Y',false); ?></td>
										<td><label class="label <?php echo ($row['recruitment_status']==0) ? 'label-warning' : 'label-success' ?>"><?php echo ($row['recruitment_status']==0) ? 'Draft' : 'Publish' ?></label></td>
										<td>
											<a href="<?php echo site_url('manage/recruitment/view/'.$row['recruitment_id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat</a>
											<a href="<?php echo site_url('manage/recruitment/edit/'.$row['recruitment_id']) ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
										</td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="5" align="center">Data Kosong</td>
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