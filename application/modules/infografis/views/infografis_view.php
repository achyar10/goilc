<section class="app-content">
	<div class="row">
		<div class="col-md-4">
			<div class="widget p-lg">
				<?php if (isset($infografis) AND $infografis['infografis_image'] != NULL) { ?>
					<img src="<?php echo upload_url('infografis/' . $infografis['infografis_image']) ?>" class="img-responsive">
				<?php } else { ?>
					<img src="<?php echo upload_url('infografis/'.$infografis['infografis_image']) ?>" class="img-responsive">
				<?php } ?>
			</div>
		</div>
		<div class="col-md-8">
			<div class="widget p-lg">
				<h3><?php echo ($title!=NULL) ? $title : ''  ?></h3>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<td>Title</td>
							<td>:</td>
							<td><?php echo $infografis['infografis_name'] ?></td>
						</tr>
						<tr>
							<td>Description</td>
							<td>:</td>
							<td><?php echo $infografis['infografis_desc'] ?></td>
						</tr>
						<tr>
							<td>Data Source</td>
							<td>:</td>
							<td><?php echo $infografis['infografis_source'] ?></td>
						</tr>
						<tr>
							<td>User Input</td>
							<td>:</td>
							<td><?php echo $infografis['user_full_name'] ?></td>
						</tr>
						<tr>
							<td>Created Date</td>
							<td>:</td>
							<td><?php echo pretty_date($infografis['infografis_input_date'],'d F Y',false) ?></td>
						</tr>
					</table>
				</div>
				<a href="<?php echo site_url('manage/infografis') ?>" class="btn btn-primary btn-sm">Back</a>
				<a href="<?php echo site_url('manage/infografis/'.$infografis['infografis_id']) ?>" class="btn btn-success btn-sm">Edit</a>
				<a href="<?php echo site_url('manage/infografis/delete/'.$infografis['infografis_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this data?')" >Delete</a>
			</div>
		</div>
	</div>
</section>