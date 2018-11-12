<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/training/add') ?>" class="btn btn-warning btn-sm pull-right">Tambah Jadwal</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Nama Pelatihan</th>
							<th>Kategori Pelatihan</th>
							<th>Tanggal Pelaksanaan</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($training)) {
								$i = 1;
								foreach ($training as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['training_name']; ?></td>
										<td><?php echo $row['category_name']; ?></td>
										<td><?php echo pretty_date($row['training_date_start'],'d-m-Y',false).' s.d '.pretty_date($row['training_date_end'],'d-m-Y',false) ?></td>
										<td><span class="label label-<?php echo ($row['training_status']==1) ? 'success' : 'danger'?>"><?php echo ($row['training_status']==1) ? 'Aktif' : 'Tidak Aktif' ?></span></td>
										<td>
											<a href="<?php echo site_url('manage/training/edit/'.$row['training_id']) ?>" class="btn btn-success btn-xs">Edit</a>
											<a href="<?php echo site_url('manage/training/view/'.$row['training_id']) ?>" class="btn btn-info btn-xs">Lihat</a>
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