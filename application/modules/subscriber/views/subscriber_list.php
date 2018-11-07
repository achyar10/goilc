<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> 
				<?php echo form_open(current_url(), array('class' => 'form-horizontal pull-right', 'method' => 'get')) ?>
					<div class="input-group input-group-sm" style="width: 200px;">
						<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="'.$f['n'].'"' : 'placeholder="Email"' ?> class="form-control">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<?php echo form_close(); ?>
					<a href="<?php echo site_url('manage/subscriber/import') ?>" class="btn btn-success btn-xs"><i class="fa fa-upload"></i> Upload Subscribers</a>
				</h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>Tanggal Input</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($subscriber)) {
								$i = 1;
								foreach ($subscriber as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['subscriber_email']; ?></td>
										<td><?php echo pretty_date($row['subscriber_input_date'],'d F Y',false); ?></td>
										<td><a href="<?php echo site_url('manage/subscriber/delete/'.$row['subscriber_id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda akan menghapus data ini?')"><i class="fa fa-trash"></i> Delete</a></td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="3" align="center">Data Kosong</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</section>