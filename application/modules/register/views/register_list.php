<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?>
					<?php echo form_open(current_url(), array('class' => 'form-horizontal pull-right', 'method' => 'get')) ?>
					<div class="input-group input-group-sm" style="width: 200px;">
						<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="'.$f['n'].'"' : 'placeholder="No Register / Nama Perusahaan"' ?> class="form-control">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Nomor Register</th>
							<th>Nama Pelatihan</th>
							<th>Nama Perusahaan</th>
							<th>Tanggal Buat</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($register)) {
								$i = 1;
								foreach ($register as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['register_no']; ?></td>
										<td><?php echo $row['training_name']; ?></td>
										<td><?php echo $row['register_corporate']; ?></td>
										<td><?php echo pretty_date($row['register_input_date'],'d F Y',false); ?></td>
										<td><label class="label <?php echo ($row['register_status']==0) ? 'label-warning' : (($row['register_status']==1) ? 'label-success' : 'label-danger') ?>"><?php echo ($row['register_status']==0) ? 'Belum Proses' : (($row['register_status']==1) ? 'Sudah Proses' : 'Ditolak') ?></label></td>
										<td>
											<a href="<?php echo site_url('manage/register/view/'.$row['register_id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
										</td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="6" align="center">Data Kosong</td>
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