<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<div class="table-responsive">
					<h4>Petunjuk Singkat</h4>
					<p>Penginputan data Email Subscriber bisa dilakukan dengan mengcopy data dari file Ms. Excel. Format file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya <a href="<?php echo site_url('manage/subscriber/download');?>"><span class="label label-success">Disini</span></a></p>
					<hr>

					<?php echo form_open_multipart(current_url()) ?>

					<div class="form-group">
						<textarea placeholder="Copy data yang akan dimasukan dari file excel, dan paste disini" rows="10" class="form-control" name="rows" required=""></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-flat">Import</button>
						<a href="<?php echo site_url('manage/subscriber') ?>" class="btn btn-info btn-sm btn-flat">Kembali</a>
					</div>
					<?php echo form_close() ?>

				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$('form').submit(function(event) {
		if ($(this).hasClass('submitted')) {
			event.preventDefault();
		} else {
			$(this).find(':submit')
			.html('<i class="fa fa-spinner fa-spin"></i> Loading...')
			.attr('disabled', 'disabled');
			$(this).addClass('submitted');
		}
	});
</script>