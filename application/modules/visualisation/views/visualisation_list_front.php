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
    <div class="primary span9">
      <section class="module">
        <div class="module-content">
          <?php echo form_open(current_url(), array('class' => 'search-form', 'method' => 'get', 'id'=>'dataset-search-form', 'style'=>'padding-bottom: 0px !important')) ?>
            <div class="search-input control-group search-giant">
              <input type="text" class="search" name="n" <?php echo (isset($f['n'])) ? 'placeholder="'.$f['n'].'"' : 'placeholder="Cari Visualisasi..."' ?> autocomplete="off">
              <button type="submit" value="search">
                <i class="fa fa-search"></i>
                <span>Submit</span>
              </button>
            </div>    
          <?php echo form_close(); ?>
        </div>
        <table class="stripe" id="example">
          <thead>
            <tr role="row">
              <th width="20%" class="sorting_desc" rowspan="1" colspan="1" aria-label="" style="width: 200px;">
              </th>
              <th width="80%" class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 386px;">                
              </th>
            </tr>
          </thead>
          <tbody>  
            <?php foreach($visualisation as $row) : ?>                     
              <tr role="row" class="odd">
                <td class="sorting_1">
                  <a target="_blank" href="<?php echo visualisation_url($row) ?>">
                    <div class="batas">
                      <img class="imagerad" src="<?php echo upload_url('visualisation/'.$row['visualisation_image']) ?>">
                    </div>
                  </a>
                </td>
                <td>
                  <a class="get_href" target="_blank" href="<?php echo visualisation_url($row) ?>">
                    <h2 class="title-vis"><?php echo $row['visualisation_name'] ?></h2>
                  </a>
                  <div class="desc-vis">
                    <p>
                      <?php echo character_limiter($row['visualisation_desc'],100) ?>                           
                      <br>Sumber : <?php echo $row['visualisation_source'] ?>
                      <br>Lihat Data : <a href="<?php echo $row['visualisation_dataset'] ?>">Data</a>                   
                    </p>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div>
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </section>

    </div>
    <aside class="secondary span3">
      <div class="filters">
        <div>
          <section class="module module-narrow module-shallow">
            <h2 class="module-heading">
              <i class="fa fa-info"></i>
              &nbsp;Apa itu <?php echo ($title != NULL) ? $title : '' ?> ?
            </h2>
            <p class="module-content">Infografik adalah representasi visual informasi, data atau ilmu pengetahuan secara grafis. Grafik ini memperlihatkan informasi rumit dengan singkat dan jelas.</p>
          </section>

        </div>
        <a class="close no-text hide-filters"><i class="fa fa-times-circle"></i><span class="text">close</span></a>
      </div>

    </aside>

  </div>

</div>

