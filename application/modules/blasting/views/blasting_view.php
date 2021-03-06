<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo $blasting['blasting_title'] ?></h4>
				<hr>
				<div class="text-justify">
					<?php echo $blasting['blasting_letter'] ?>
					<br>
					<p>Pembuat : <?php echo $blasting['user_full_name'] ?></p>
					<p>Tanggal : <?php echo pretty_date($blasting['blasting_input_date'], 'd F Y H:i:s',false) ?></p>
					<br>
					<a href="<?php echo site_url('manage/blasting') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
					<a href="<?php echo site_url('manage/blasting/edit/'.$blasting['blasting_id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
					<button type="button" data-target="#deleteModal" class="btn btn-sm btn-danger" data-toggle="modal"><i class="fa fa-trash"></i> Delete</button>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="deleteModal">
	<div class="modal-dialog">
		<form method="POST" action="<?php echo site_url('manage/blasting/delete/'.$blasting['blasting_id']) ?>">
			<input type="hidden" name="blasting_id">
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