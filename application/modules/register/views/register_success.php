<div class="container-fluid no-padding contactus-section">
	<div class="container">
		<h2>Pendaftaran Berhasil</h2>
		<div class="table-responsive" style="margin-bottom: 50px;">
			<table class="table table-hover">
				<tr>
					<td>Nama Perusahaan</td>
					<td>:</td>
					<td><?php echo $register['register_corporate'] ?></td>
				</tr>
				<tr>
					<td>Nama PIC Pendaftaran</td>
					<td>:</td>
					<td><?php echo $register['register_pic_name'] ?></td>
				</tr>
				<tr>
					<td>Jabatan PIC Pendaftaran</td>
					<td>:</td>
					<td><?php echo $register['register_pic_jab'] ?></td>
				</tr>
				<tr>
					<td>Email PIC Pendaftaran</td>
					<td>:</td>
					<td><?php echo $register['register_pic_email'] ?></td>
				</tr>
				<tr>
					<td>Nomor Pendaftaran</td>
					<td>:</td>
					<td><?php echo $register['register_no'] ?></td>
				</tr>
				<tr>
					<td>Tanggal Pendaftaran</td>
					<td>:</td>
					<td><?php echo pretty_date($register['register_input_date'],'d F Y',false) ?></td>
				</tr>
			</table>
			<a target="_blank" href="<?php echo site_url('register/print_reg/'.$register['register_id']) ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak Formulir Pendaftaran</a>
		</div>
	</div>
</div>