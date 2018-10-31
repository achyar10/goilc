<!DOCTYPE html>
<html>
<head>
	<title><?php echo $register['register_corporate'].'_'.$register['register_no'] ?></title>
	<style type="text/css">
	body {
		font-family: sans-serif;
	}
	@page {
		margin-top: 1cm;
		margin-bottom: 0.2cm;
		margin-left: 1.5cm; 
		margin-right: 1.5cm;
	} 
	table	{
		border-collapse: collapse;
		font-size: 12pt;
	}
	td{
		height: 30px;
	}
	th{
		height: 40px;
	}
</style>
</head>
<body>
	<img src="<?php echo media_url('img/logo.png') ?>" style="height: 80px">
	<h3 style="margin-top: -60px;margin-left:200px; background-color: red;color: #fff;padding: 10px;">&nbsp;&nbsp;FORMULIR PENDAFTARAN TRAINING / WORKSHOP</h3>
	<table width="100%" border="1px">
		<tr>
			<td style="font-weight: bold;">JUDUL TRAINING / WORKSHOP</td>
			<td>: <?php echo $register['training_name'] ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">TANGGAL PELAKSANAAN</td>
			<td>: <?php echo pretty_date($register['training_date_start'], 'd F Y',false) . ' s.d '.pretty_date($register['training_date_end'], 'd F Y',false) ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">PERUSAHAAN</td>
			<td>: <?php echo $register['register_corporate'] ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">NOMOR PENDAFTARAN</td>
			<td>: <?php echo $register['register_no'] ?></td>
		</tr>
	</table>
	<br>
	<table width="100%" border="1px">
		<tr style="white-space: nowrap;">
			<th>NO</th>
			<th>NAMA</th>
			<th>JABATAN</th>
			<th>NO HANDPHONE</th>
			<th>EMAIL</th>
		</tr>
		<?php 
		$i =1;
		foreach($member as $key): ?>
			<tr style="white-space: nowrap;">
				<td style="text-align: center;"><?php echo $i; ?></td>
				<td><?php echo $key['member_name'] ?></td>
				<td><?php echo $key['member_jab'] ?></td>
				<td><?php echo $key['member_phone'] ?></td>
				<td><?php echo $key['member_email'] ?></td>
			</tr>
			<?php 
			$i++;
		endforeach; ?>
	</table>
	<br>
	<table width="100%" border="1px">
		<tr style="white-space: nowrap;">
			<th colspan="2" align="center">PENANGGUNG JAWAB PENDAFTARAN</th>
			<td rowspan="7" style="background-color: #19b5fe">&nbsp;</td>
			<th colspan="2" align="center">PENANGGUNG JAWAB PEMBAYARAN</th>
		</tr>
		<tr>
			<td style="font-weight:bold">NAMA</td>
			<td><?php echo $register['register_pic_name'] ?></td>
			<td style="font-weight:bold">NAMA</td>
			<td><?php echo $register['register_pay_name'] ?></td>
		</tr>
		<tr>
			<td style="font-weight:bold">JABATAN</td>
			<td><?php echo $register['register_pic_jab'] ?></td>
			<td style="font-weight:bold">JABATAN</td>
			<td><?php echo $register['register_pay_jab'] ?></td>
		</tr>
		<tr>
			<td style="font-weight:bold">TELP (Ext.)</td>
			<td><?php echo $register['register_pic_tlp'] ?></td>
			<td style="font-weight:bold">TELP (Ext.)</td>
			<td><?php echo $register['register_pay_tlp'] ?></td>
		</tr>
		<tr>
			<td style="font-weight:bold">FAX</td>
			<td><?php echo $register['register_pic_fax'] ?></td>
			<td style="font-weight:bold">FAX</td>
			<td><?php echo $register['register_pay_fax'] ?></td>
		</tr>
		<tr>
			<td style="font-weight:bold">HANDPHONE</td>
			<td><?php echo $register['register_pic_phone'] ?></td>
			<td style="font-weight:bold">HANDPHONE</td>
			<td><?php echo $register['register_pay_phone'] ?></td>
		</tr>
		<tr>
			<td style="font-weight:bold">EMAIL</td>
			<td><?php echo $register['register_pic_email'] ?></td>
			<td style="font-weight:bold">ALAMAT PENGIRIMAN INVOICE</td>
			<td><?php echo $register['register_add_inv'] ?></td>
		</tr>
	</table>
	<br>
	<table width="100%" border="1px">
		<tr>
			<td style="text-align: center;font-weight: bold;">TANDA TANGAN DAN STEMPEL PERUSAHAAN</td>
			<td rowspan="2" style="text-align: justify;font-size: 11pt">Kebijakan Pembatalan Training/Workshop :<br><br>
				1. Pembatalan dilakukan secara tertulis (email atau surat resmi).<br>
				2. Pembatalan H-3 di kenakan biaya pembatalan sebesar 100% dari biaya. <br><br>
				* Kebijakan biaya pembatalan training/workshop diperlukan demi menjaga jumlah minimum peserta saat training berlangsung. <br><br>
			** Formulir pendaftaran yang telah di lengkapi di kembalikan via email ke : <u>rahmayuniarti.ilc@gmail.com;</u> <u>adesepti.ilc@gmail.com;</u></td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>


</body>
</html>