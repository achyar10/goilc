<div class="container-fluid no-padding contactus-section">
	<div class="container">
		<div class="row">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#pic">PIC</a></li>
				<li><a data-toggle="tab" href="#peserta">Peserta</a></li>
			</ul>
			<form action="<?php echo site_url('register') ?>" method="POST">
				<div class="tab-content">
					<div id="pic" class="tab-pane fade in active">
						<div class="col-md-6">
							<div class="getintouch">
								<h3>PIC Pendaftaran</h3>
								<p>Penanggung Jawab Pendaftaran</p>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" required="" placeholder="Nama Perusahaan" class="form-control" name="register_corporate">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" required="" placeholder="Nama PIC" class="form-control" name="register_pic_name">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" required="" placeholder="Jabatan" class="form-control" name="register_pic_jab">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" required="" placeholder="Telepon Kantor" class="form-control" name="register_pic_tlp">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" required="" placeholder="Fax" class="form-control" name="register_pic_fax">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" required="" placeholder="Handphone" class="form-control" name="register_pic_phone">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="email" required="" placeholder="Email" class="form-control" name="register_pic_email">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="getintouch">
								<h3>PIC Pembayaran</h3>
								<p>Penanggung Jawab Pembayaran</p>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" required="" placeholder="Nama PIC Pembayaran" class="form-control" name="register_pay_name">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" required="" placeholder="Jabatan PIC Pembayaran" class="form-control" name="register_pay_jab">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="Telepon Kantor PIC Pembayaran" class="form-control" name="register_pay_tlp">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="Fax PIC Pembayaran" class="form-control" name="register_pay_fax">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="Handphone PIC Pembayaran" class="form-control" name="register_pay_phone">
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<textarea placeholder="Alamat Pengiriman Invoice" class="form-control" name="register_add_inv" rows="2"></textarea>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<select class="form-control" name="training_id">
											<option>---Pilih Pelatihan---</option>
											<?php foreach ($training as $row): ?>
												<option value="<?php echo $row['training_id'] ?>"><?php echo $row['training_name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>	
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<a type="button" class="btn btn-success btnNext">Next <i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="peserta" class="tab-pane fade">
						<div class="getintouch">
							<h3>Peserta</h3>
							<div id="p_scents_peserta">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" required="" placeholder="Nama Peserta" class="form-control" name="member_name[]">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" required="" placeholder="Jabatan" class="form-control" name="member_jab[]">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="email" required="" placeholder="Email" class="form-control" name="member_email[]">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" required="" placeholder="No. Handphone" class="form-control" name="member_phone[]">
										</div>
									</div>
								</div>
							</div>
							<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_peserta"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
							<br>
							<div class="form-group">
								<a type="button" class="btn btn-sm btn-info btnPrevious"><i class="fa fa-arrow-left"></i> Previous</a>
								<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="section-padding"></div>
	</div>
</div>

<script type="text/javascript">
	$('.btnNext').click(function() {
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

	$('.btnPrevious').click(function() {
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
</script>
<script>
	$(function() {
		var scntDiv = $('#p_scents_peserta');
		var i = $('#p_scents_peserta .col').size() + 1;

		$("#addScnt_peserta").click(function() {
			$('<div class="col"><hr><div class="row"><div class="col-md-3"><div class="form-group"><input type="text" placeholder="Nama Peserta" class="form-control" name="member_name[]" required=""></div></div><div class="col-md-3"><div class="form-group"><input type="text" placeholder="Jabatan" class="form-control" name="member_jab[]" required=""></div></div><div class="col-md-3"><div class="form-group"><input type="email" placeholder="Email" class="form-control" name="member_email[]" required=""></div></div><div class="col-md-3"><div class="form-group"><input type="text" placeholder="No. Handphone" class="form-control" name="member_phone[]" required=""></div></div></div><a href="#" class="btn btn-xs btn-danger remScnt_peserta"><i class="fa fa-trash"></i> Hapus Baris</a></div>').appendTo(scntDiv);
			i++;
			return false;
		});

		$(document).on("click", ".remScnt_peserta", function() {
			if (i > 1) {
				$(this).parents('.col').remove();
				i--;
			}
			return false;
		});
	});
</script>
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