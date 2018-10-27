<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>Tanggal Input</th>
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
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="3" align="center">Data Empty</td>
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