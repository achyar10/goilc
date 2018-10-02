<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>

				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<td>Nama Pengirim</td>
							<td>:</td>
							<td><?php echo $mailbox['mailbox_name'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo $mailbox['mailbox_email'] ?></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td><?php echo $mailbox['mailbox_phone'] ?></td>
						</tr>
						<tr>
							<td>Perusahaan</td>
							<td>:</td>
							<td><?php echo $mailbox['mailbox_corporate'] ?></td>
						</tr>
						<tr>
							<td>Judul</td>
							<td>:</td>
							<td><?php echo $mailbox['mailbox_subject'] ?></td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td>:</td>
							<td><?php echo $mailbox['mailbox_desc'] ?></td>
						</tr>
						<tr>
							<td>Tanggal Buat</td>
							<td>:</td>
							<td><?php echo pretty_date($mailbox['mailbox_input_date'],'d F Y H:i:s',false) ?></td>
						</tr>
					</table>
					<a href="<?php echo site_url('manage/mailbox') ?>" class="btn btn-primary btn-sm">Back</a>
				</div>
			</div>
		</div>
	</div>
</section>