<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<div class="row">
					<div class="col-md-3">
						<?php if (isset($training) AND $training['training_brocure'] != NULL) { ?>
							<img src="<?php echo upload_url('training/' . $training['training_brocure']) ?>" class="img-responsive img-thumbnail">
						<?php } else { ?>
							<img src="<?php echo media_url('img/missing.png') ?>" class="img-responsive img-thumbnail">
						<?php } ?>
					</div>
					<div class="col-md-9">
						<div class="table-responsive">
							<table class="table table-hover">
								<tr>
									<td>Nama Pelatihan</td>
									<td>:</td>
									<td><?php echo $training['training_name'] ?></td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td>:</td>
									<td><?php echo $training['category_name'] ?></td>
								</tr>
								<tr>
									<td>Tempat</td>
									<td>:</td>
									<td><?php echo $training['training_place'] ?></td>
								</tr>
								<tr>
									<td>Tanggal Pelaksanaan</td>
									<td>:</td>
									<td><?php echo pretty_date($training['training_date_start'],'d F Y',false) .' s/d '.pretty_date($training['training_date_end'],'d F Y',false) ?></td>
								</tr>
								<tr>
									<td>Waktu Pelatihan</td>
									<td>:</td>
									<td><?php echo $training['training_time']. ' WIB' ?></td>
								</tr>
								<tr>
									<td>Harga</td>
									<td>:</td>
									<td><?php echo 'Rp. '. number_format($training['training_price']) ?></td>
								</tr>
								<tr>
									<td>Tanggal Buat</td>
									<td>:</td>
									<td><?php echo pretty_date($training['training_input_date'],'d F Y H:i:s',false) ?></td>
								</tr>
							</table>
							<a href="<?php echo site_url('manage/training') ?>" class="btn btn-primary btn-sm">Back</a>
							<a href="<?php echo site_url('manage/training/edit/'.$training['training_id']) ?>" class="btn btn-success btn-sm">Edit</a>
							<button type="button" data-target="#deleteModal" class="btn btn-sm btn-danger" data-toggle="modal">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="deleteModal">
	<div class="modal-dialog">
		<form method="POST" action="<?php echo site_url('manage/training/delete/'.$training['training_id']) ?>">
			<input type="hidden" name="training_id">
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