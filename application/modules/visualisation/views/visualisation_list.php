<section class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h4 class="m-b-lg"><?php echo ($title != NULL) ? $title : '' ?> <a href="<?php echo site_url('manage/visualisation/add') ?>" class="btn btn-danger btn-sm pull-right">Add Visualisation</a></h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Created Date</th>
							<th>Action</th>
						</tr>
						<tbody>
							<?php
							if (!empty($visualisation)) {
								$i = 1;
								foreach ($visualisation as $row):
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['visualisation_name']; ?></td>
										<td><?php echo pretty_date($row['visualisation_input_date'],'d F Y',false); ?></td>
										<td>
											<a href="<?php echo site_url('manage/visualisation/edit/'.$row['visualisation_id']) ?>" class="btn btn-success btn-xs">Edit</a>
											<a href="<?php echo site_url('manage/visualisation/view/'.$row['visualisation_id']) ?>" class="btn btn-primary btn-xs">View</a>
										</td>	
									</tr>
									<?php
									$i++;
								endforeach;
							} else {
								?>
								<tr id="row">
									<td colspan="4" align="center">Data Empty</td>
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