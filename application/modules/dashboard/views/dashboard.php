<section class="app-content">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="widget p-md clearfix">
        <div class="pull-left">
          <h3 class="widget-title">Last Login</h3>
          <small class="text-color"><?php echo pretty_date($this->session->userdata('user_last_login'),'l, d F Y H:i',false); ?></small>
        </div>
      </div><!-- .widget -->
    </div>
</section><!-- #dash-content -->