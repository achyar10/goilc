<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<?php echo form_open(current_url(), array('method' => 'get')) ?>
				<div class="row">
					<div class="col-md-3">  
						<div class="form-group">
							<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input class="form-control" type="text" name="ds" readonly="readonly" <?php echo (isset($f['ds'])) ? 'value="'.$f['ds'].'"' : '' ?> placeholder="Tanggal Awal">
							</div>
						</div>
					</div>
					<div class="col-md-3">  
						<div class="form-group">
							<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input class="form-control" type="text" name="de" readonly="readonly" <?php echo (isset($f['de'])) ? 'value="'.$f['de'].'"' : '' ?> placeholder="Tanggal Akhir">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Filter</button>
					<?php if ($f) { ?>
						<a class="btn btn-success" href="<?php echo site_url('manage/report/reg_export' . '/?' . http_build_query($f)) ?>"><i class="fa fa-file-excel-o" ></i> Export Excel</a>
					<?php } ?>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>