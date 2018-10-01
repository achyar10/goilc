<?php

if (isset($category)) {
	$id 						= $category['category_id'];
	$inputNameValue = $category['category_name'];
} else {
	$inputNameValue = set_value('category_name');

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
					<?php if (isset($category)) { ?>
						<input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
					<?php } ?>

					<div class="form-group">
						<label>Nama Kategori</label>
						<input name="category_name" type="text" class="form-control" value="<?php echo $inputNameValue ?>" placeholder="Nama Kategori">
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-body">
					<button type="submit" class="btn btn-success btn-md btn-block">Save</button>
					<a href="<?php echo site_url('manage/category') ?>" class="btn btn-primary btn-md btn-block">Cancel</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>