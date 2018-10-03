

<div class="container-fluid no-padding contactus-section">
	<div class="container">
		<div class="row">
			<form class="contactus-form" action="<?php echo site_url('register') ?>" method="POST">
				<div class="col-md-6">
					<div class="getintouch">
						<h3>Register</h3>
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
									<input type="text" required="" placeholder="Telepon" class="form-control" name="register_pic_tlp">
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
				<div class="getintouch">
					<h3>&nbsp;</h3>
					<div class="col-md-6">
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
								<input type="text" required="" placeholder="Tlp PIC Pembayaran" class="form-control" name="register_pay_tlp">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<input type="text" required="" placeholder="Fax PIC Pembayaran" class="form-control" name="register_pay_fax">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<input type="text" required="" placeholder="Handphone PIC Pembayaran" class="form-control" name="register_pay_phone">
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
								<input type="submit" title="Send" value="Kirim">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="section-padding"></div>
	</div>

</div>