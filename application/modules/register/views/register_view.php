<section class="app-content">
	<div class="widget p-lg">
		<h4 class="m-b-lg"><?php echo $register['register_corporate'] ?> <?php echo ($register['register_status']==1) ? '<label class="label label-success">Disetujui</label>' : (($register['register_status']==2) ? '<label class="label label-danger">Ditolak</label>' : NULL ) ?> <a target="_blank" href="<?php echo site_url('manage/register/print_reg/'.$register['register_id']) ?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-file-pdf-o"></i> Cetak Formulir</a></h4>
		<h4><?php echo $register['training_name'] ?></h4>
		<div class="row">
			<div class="col-md-6">
				<div class="table-responsive">
					<table class="table table-hover">
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
							<td>Telepon / Fax</td>
							<td>:</td>
							<td><?php echo $register['register_pic_phone'].' / '.$register['register_pic_fax'] ?></td>
						</tr>
						<tr>
							<td>Handphone PIC Pendaftaran</td>
							<td>:</td>
							<td><?php echo $register['register_pic_phone'] ?></td>
						</tr>
						<tr>
							<td>Email PIC Pendaftaran</td>
							<td>:</td>
							<td><?php echo $register['register_pic_email'] ?></td>
						</tr>
						<tr>
							<td>Nomor Register</td>
							<td>:</td>
							<td><?php echo $register['register_no'] ?></td>
						</tr>
						<tr>
							<td>Tanggal Pendaftaran</td>
							<td>:</td>
							<td><?php echo pretty_date($register['register_input_date'],'d F Y',false) ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<td>Nama PIC Pembayaran</td>
							<td>:</td>
							<td><?php echo $register['register_pay_name'] ?></td>
						</tr>
						<tr>
							<td>Jabatan PIC Pembayaran</td>
							<td>:</td>
							<td><?php echo $register['register_pay_jab'] ?></td>
						</tr>
						<tr>
							<td>Telepon / Fax</td>
							<td>:</td>
							<td><?php echo $register['register_pay_tlp'].' / '.$register['register_pay_fax'] ?></td>
						</tr>
						<tr>
							<td>Handphone PIC Pembayaran</td>
							<td>:</td>
							<td><?php echo $register['register_pay_phone'] ?></td>
						</tr>
						<tr>
							<td>Alamat Pengiriman Invoice</td>
							<td>:</td>
							<td><?php echo $register['register_add_inv'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<br>
		<a href="<?php echo site_url('manage/register') ?>" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
		<?php if($register['register_status']==0) { ?>
			<a href="<?php echo site_url('manage/register/approve/'.$register['register_id']) ?>" class="btn btn-xs btn-success" onclick="return confirm('Apakah anda yakin akan menyetujui?');"><i class="fa fa-check"></i> Approve</a>
			<a href="<?php echo site_url('manage/register/reject/'.$register['register_id']) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin akan menolak?');"><i class="fa fa-times"></i> Reject</a>
		<?php } ?>
	</div>
</section>
<section class="app-content">
	<div class="widget p-lg">
		<h4 class="m-b-lg">Detail Peserta</h4>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>No</th>
					<th>Nama Peserta</th>
					<th>Jabatan</th>
					<th>Handphone</th>
					<th>Email</th>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					foreach($member as $row): ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row['member_name'] ?></td>
							<td><?php echo $row['member_jab'] ?></td>
							<td><?php echo $row['member_phone'] ?></td>
							<td><?php echo $row['member_email'] ?></td>
						</tr>
						<?php 
						$i++;
					endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>