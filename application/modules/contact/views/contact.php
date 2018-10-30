<div class="container-fluid no-padding pagebanner">
	<div class="container">
		<div class="pagebanner-content">
			<h3 style="margin-top: -60px;"><?php echo $title ?></h3>
			<ol class="breadcrumb" style="margin-top: -60px;">
				<li><a href="<?php echo site_url('home') ?>">Home</a></li>
				<li><?php echo $title ?></li>
			</ol>
		</div>
	</div>
</div>

<div class="container-fluid no-padding contactus-section">
	<div class="container">
		<div class="section-padding"></div>
		<div class="row">
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7932.544712542197!2d106.79877500000002!3d-6.227778!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x517f9905c97f6936!2sSTC+Senayan!5e0!3m2!1sen!2sid!4v1538468097232" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-md-6">
				<div class="getintouch">
					<h3>Hubungi Kami </h3>
					<p>Anda Dapat Menghubungi Kami Melalui Pesan ini</p>
					<form class="contactus-form" action="<?php echo site_url('contact') ?>" method="POST">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" required="" placeholder="Name" class="form-control" name="mailbox_name">
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" required="" placeholder="Perusahaan" class="form-control" name="mailbox_corporate">
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="email" required="" placeholder="Email" class="form-control" name="mailbox_email">
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" required="" placeholder="Telepon" class="form-control" name="mailbox_phone">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" required="" placeholder="Subjek" class="form-control" name="mailbox_subject">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<textarea placeholder="Pesan" class="form-control" name="mailbox_desc" rows="5"></textarea>
								</div>
							</div>	
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="submit" title="Send" value="Kirim">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="section-padding"></div>
	</div>
</div>