<style type="text/css">
	a{
		color: #fff;
	}
</style>
<section class="app-content">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="widget p-md clearfix">
				<div class="pull-left">
					<h3 class="widget-title">Last Login</h3>
					<small class="text-color"><?php echo pretty_date($this->session->userdata('user_last_login'),'l, d F Y H:i',false); ?></small>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?php echo $register ?></span></h3>
						<small class="text-color">Total Pendaftar</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-users"></i></span>
				</div>
				<footer class="widget-footer bg-danger"><small><a href="<?php echo site_url('manage/register') ?>">Detail</a></small> 
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas>
					</span>
				</footer>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp"><?php echo $training ?></span></h3>
						<small class="text-color">Total Pelatihan</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
				</div>
				<footer class="widget-footer bg-warning"><small><a href="<?php echo site_url('manage/training') ?>">Detail</a></small> 
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas>
					</span>
				</footer>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp"><?php echo $subscriber ?></span></h3>
						<small class="text-color">Total Subscriber</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-bell"></i></span>
				</div>
				<footer class="widget-footer bg-success"><small><a href="<?php echo site_url('manage/subscriber') ?>">Detail</a></small> 
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas>
					</span>
				</footer>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?php echo $user ?></span></h3>
						<small class="text-color">Total Pengguna</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-user"></i></span>
				</div>
				<footer class="widget-footer bg-primary"><small><a href="<?php echo site_url('manage/users') ?>">Detail</a></small> 
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas>
					</span>
				</footer>
			</div>
		</div>
	</div>
</section>