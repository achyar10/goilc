<?php
$this->load->view('manage/tinymce_init');
if (isset($training)) {
	$id 						= $training['training_id'];
	$inputNameValue = $training['training_name'];
	$inputPlaceValue = $training['training_place'];
	$inputDsValue = $training['training_date_start'];
	$inputDeValue = $training['training_date_end'];
	$inputTimeValue = $training['training_time'];
	$inputPriceValue = $training['training_price'];
	$inputCoverValue = $training['training_cover_letter'];
	$inputStatusValue = $training['training_status'];
	$inputCatValue = $training['category_id'];
	$inputSerValue = $training['service_id'];
} else {
	$inputNameValue = set_value('training_name');
	$inputPlaceValue = set_value('training_place');
	$inputDsValue = set_value('training_date_start');
	$inputDeValue = set_value('training_date_end');
	$inputTimeValue = set_value('training_time');
	$inputPriceValue = set_value('training_price');
	$inputCoverValue = set_value('training_cover_letter');
	$inputStatusValue = set_value('training_status');
	$inputCatValue = set_value('category_id');
	$inputSerValue = set_value('service_id');
}
?>

<section class="app-content">
	<div class="row">
		<?php echo form_open_multipart(current_url()); ?>
		<div class="col-md-9">
			<div class="widget">
				<header class="widget-header">
					<h4 class="widget-title"><?php echo isset($title) ? '' . $title : null; ?></h4>
				</header><!-- .widget-header -->
				<hr class="widget-separator">
				<div class="widget-body">
					
					<?php echo validation_errors(); ?>
					<?php if (isset($training)) { ?>
						<input type="hidden" name="training_id" value="<?php echo $training['training_id']; ?>">
					<?php } ?>
					
					<div class="form-group">
						<label>Nama Pelatihan</label>
						<input name="training_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Nama Pelatihan">
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Kategori <small>*</small></label>
								<select name="category_id" class="form-control">
									<option value="">-Pilih Kategori-</option>
									<?php foreach ($category as $row): ?> 
										<option value="<?php echo $row['category_id']; ?>" <?php echo ($inputCatValue == $row['category_id']) ? 'selected' : '' ?>><?php echo $row['category_name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Pelayanan <small>*</small></label>
								<select name="service_id" class="form-control">
									<option value="">-Pilih Pelayanan-</option>
									<?php foreach ($service as $row): ?> 
										<option value="<?php echo $row['service_id']; ?>" <?php echo ($inputSerValue == $row['service_id']) ? 'selected' : '' ?>><?php echo $row['service_name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Tempat Pelatihan</label>
						<input name="training_place" type="text" class="form-control" value="<?php echo $inputPlaceValue ?>" placeholder="Tempat Pelatihan">
					</div>

					<div class="row">
						<div class="col-md-4">
							<label>Tanggal Mulai</label>
							<div class="form-group">
								<input name="training_date_start" type="text" class="form-control date" value="<?php echo $inputDsValue ?>" placeholder="Tanggal Mulai">
							</div>
						</div>
						<div class="col-md-4">
							<label>Tanggal Selesai</label>
							<div class="form-group">
								<input name="training_date_end" type="text" class="form-control date" value="<?php echo $inputDeValue ?>" placeholder="Tanggal Selesai">
							</div>
						</div>
						<div class="col-md-4">
							<label>Jam Pelatihan</label>
							<div class="form-group">
								<input name="training_time" type="time" class="form-control time" value="<?php echo $inputTimeValue ?>" placeholder="Jam">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Harga Pelatihan</label>
						<input name="training_price" type="text" class="form-control numeric" value="<?php echo $inputPriceValue ?>" placeholder="Harga Pelatihan">
					</div>

					<div class="form-group">
						<label>Cover Letter</label>
						<textarea name="training_cover_letter" rows="10" class="mce-init"><?php echo $inputCoverValue; ?></textarea>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<div class="form-group">
						<label for="exampleInputFile">Upload Brosur</label>
						<a href="#" class="thumbnail">
							<?php if (isset($training) AND $training['training_brocure'] != NULL) { ?>
								<img src="<?php echo upload_url('training/' . $training['training_brocure']) ?>" class="img-responsive img-thumbnail">
							<?php } else { ?>
								<img id="target" src="<?php echo media_url('img/missing_image.png') ?>" alt="Choose image to upload">
							<?php } ?>
						</a>
						<input type='file' id="training_brocure" name="training_brocure">
					</div>
					<div class="form-group">
						<label>Silabus</label><br>
						<?php if(isset($training)) { ?>
							<a href="<?php echo upload_url('silabus/'.$training['training_silabus']) ?>"><?php echo $training['training_silabus'] ?></a>
						<?php } ?>
						<input type="file" name="training_silabus">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<div class="">
							<label>
								<input type="radio" name="training_status" value="1" <?php echo ($inputStatusValue == 1) ? 'checked' : ''; ?>> Aktif
							</label>
						</div>
						<div class="">
							<label>
								<input type="radio" name="training_status" value="0" <?php echo ($inputStatusValue == 0) ? 'checked' : ''; ?>> Tidak Aktif
							</label>
						</div>
					</div>
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/training') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#target').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#training_brocure").change(function() {
		readURL(this);
	});
</script>