<!DOCTYPE html>
<html>
<head>
	<title><?php echo $register['register_no'] ?></title>
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
</style>
</head>
<body>
	<img src="<?php echo media_url('img/logo.png') ?>" style="height: 80px">
	<table width="100%" border="1px">
		<tr>
			<td>JUDUL TRAINING / WORKSHOP</td>
			<td>: <?php echo $register['training_name'] ?></td>
		</tr>
		<tr>
			<td>TANGGAL PELAKSANAAN</td>
			<td>: <?php echo pretty_date($register['training_date_start'], 'd F Y',false) . ' s.d '.pretty_date($register['training_date_end'], 'd F Y',false) ?></td>
		</tr>
		<tr>
			<td>PERUSAHAAN</td>
			<td>: <?php echo $register['register_corporate'] ?></td>
		</tr>
	</table>
	<br>
	<table width="100%" border="1px">
		<tr>
			<td>NO</td>
			<td>NAMA</td>
			<td>JABATAN</td>
			<td>NO HANDPHONE</td>
			<td>EMAIL</td>
		</tr>
		<?php 
		$i =1;
		foreach($member as $key): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $key['member_name'] ?></td>
				<td><?php echo $key['member_jab'] ?></td>
				<td><?php echo $key['member_phone'] ?></td>
				<td><?php echo $key['member_email'] ?></td>
			</tr>
			<?php 
			$i++;
		endforeach; ?>
	</table>


</body>
</html>