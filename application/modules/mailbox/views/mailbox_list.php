<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Perusahaan</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($mailbox)) {
								$i = 1;
								foreach ($mailbox as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['mailbox_name']; ?></td>
										<td><?php echo $row['mailbox_email']; ?></td>
										<td><?php echo $row['mailbox_corporate']; ?></td>
										<td>
											<a href="<?php echo site_url('manage/mailbox/view/'.$row['mailbox_id']) ?>" class="btn btn-success btn-xs">Lihat</a>
										</td>
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="5" align="center">Data Empty</td>
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