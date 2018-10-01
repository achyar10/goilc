<div id="content" class="container">
  <div class="flash-messages">
  </div>
  <div class="toolbar">
    <ol class="breadcrumb">
      <li class="home"><a href="/">Beranda<span> Beranda</span></a></li>
      <li class="active"><a href="<?php echo site_url('visualisation') ?>"><?php echo ($title != NULL) ? $title : '' ?></a></li>
    </ol>
  </div>
  <hr class="datasets">
  <div class="row wrapper">
    <div class="span12">
      <section class="module">
        <h3><?php echo $visualisation['visualisation_name'] ?></h3>
        <p><?php echo pretty_date($visualisation['visualisation_input_date'],'d F Y',false) ?><br>
        <?php echo $visualisation['visualisation_desc'] ?></p>
        <p>Dataset : <a href="<?php echo $visualisation['visualisation_dataset'] ?>"><?php echo $visualisation['visualisation_dataset'] ?></a></p>
        <p>Sumber  : <?php echo $visualisation['visualisation_source'] ?></p>
        <?php echo $visualisation['visualisation_link'] ?>
        
      </section>

    </div>

  </div>

</div>