<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<?php echo form_open_multipart(current_url()); ?>

				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" class="form-control" name="setting_pt" value="<?php echo $setting_pt['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Alamat Perusahaan</label>
					<textarea class="form-control" name="setting_address"><?php echo $setting_address['setting_value'] ?></textarea>
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" class="form-control" name="setting_phone" value="<?php echo $setting_phone['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Fax</label>
					<input type="text" class="form-control" name="setting_fax" value="<?php echo $setting_fax['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="setting_email" value="<?php echo $setting_email['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Linkedin</label>
					<input type="text" class="form-control" name="setting_linkedin" value="<?php echo $setting_linkedin['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Facebook</label>
					<input type="text" class="form-control" name="setting_fb" value="<?php echo $setting_fb['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Twitter</label>
					<input type="text" class="form-control" name="setting_twitter" value="<?php echo $setting_twitter['setting_value'] ?>" required>
				</div>
				<div class="form-group">
					<label>Instagram</label>
					<input type="text" class="form-control" name="setting_instagram" value="<?php echo $setting_instagram['setting_value'] ?>" required>
				</div>
				<button type="submit" class="btn btn-success btn-sm">Simpan</button>
				<?php echo form_close(); ?>

			</div>
			<div>
			</div>
		</div>
	</div>
</section>