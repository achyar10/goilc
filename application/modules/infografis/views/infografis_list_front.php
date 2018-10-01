<style type="text/css">
  #fullResImage{height: 100%!important;
      width: auto!important;
    }
    #pp_full_res{text-align: center;background: #e9e9e9;}
    #pp_full_res{
      /*width: 70%!important;
      height: auto;
      float: left;*/
      width: 70%!important;
      height: 100%;
      float: left;
      position: absolute;
    }
    .pp_details{
      position: absolute!important;
      padding: 0px;
      width: 25%!important;
      right: 25px!important;
      /*width: 30%!important;
      padding: 20px;*/
    }
    a.pp_expand, a.pp_contract{
      right: 33%;
    }
</style>
<div id="content" class="container">
  <div class="flash-messages">
  </div>
  <div class="toolbar">
    <ol class="breadcrumb">
      <li class="home"><a href="/">Beranda<span> Beranda</span></a></li>
      <li class="active"><a href="<?php echo site_url('infografis') ?>"><?php echo ($title != NULL) ? $title : '' ?></a></li>
    </ol>
  </div>
  <hr class="datasets">
  <div class="row wrapper">
    <div class="primary span9">
      <section class="module">
        <div class="module-content">
            <?php echo form_open(current_url(), array('class' => 'search-form', 'method' => 'get', 'id'=>'dataset-search-form', 'style'=>'padding-bottom: 0px !important')) ?>
            <div class="search-input control-group search-giant">
              <input type="text" class="search" name="n" <?php echo (isset($f['n'])) ? 'placeholder="'.$f['n'].'"' : 'placeholder="Cari Infografis..."' ?> autocomplete="off">
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
            <?php foreach($infografis as $row) : ?>                     
              <tr role="row" class="odd">
                <td class="sorting_1">
                  <a class="imgpopup hide2" href="<?php echo upload_url('infografis/'.$row['infografis_image']) ?>" rel="prettyPhoto" rev_title="<h3><?php echo $row['infografis_name'] ?></h3><?php echo $row['infografis_desc'] ?> ">
                    <div class="batas">
                      <img class="imagerad" src="<?php echo upload_url('infografis/'.$row['infografis_image']) ?>">
                    </div>
                  </a>
                </td>
                <td>
                    <h2 class="title-vis"><?php echo $row['infografis_name'] ?></h2>
                  <div class="desc-vis">
                    <p>
                      <?php echo character_limiter($row['infografis_desc'],100) ?>                           
                      <br>Sumber : <?php echo $row['infografis_source'] ?>                 
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
            <p class="module-content">Bentuk penyajian data dengan konsep visual yang terdiri teks dan gambar ilustrasi yang menarik. Secara umum, visualisasi dalam bentuk gambar baik yang bersifat abstrak maupun nyata telah dikenal sejak awal dari peradaban manusia.</p>
          </section>

        </div>
        <a class="close no-text hide-filters"><i class="fa fa-times-circle"></i><span class="text">close</span></a>
      </div>

    </aside>

  </div>

</div>

 <link rel="stylesheet" href="<?php echo media_url('library/prettyphoto/css/prettyPhoto.css') ?>">
 <script type="text/javascript" src="<?php echo media_url('library/prettyphoto/js/jquery.prettyPhoto.js') ?>"></script>

 <script type="text/javascript">
            $(document).ready(function() {
              $( ".imgpopup" )
                .mouseover(function() {
                  $( this ).attr("title","");
                })
                .mouseout(function() {
                  var tmp_title = $( this ).attr("rev_title");
                  $( this ).attr( "title", tmp_title );
                }).on("click",function(){
                  var tmp_title = $( this ).attr("rev_title");
                  $( this ).attr( "title", tmp_title );
                });
             prettyphoto();  
              
              $('.next').click(function () {
                prettyphoto();
               });

              $('.paginate_button').click(function () {
                prettyphoto();
               });              

            });

            function prettyphoto() {
              $("a[rel^='prettyPhoto']").prettyPhoto({
                animation_speed: 'fast', /* fast/slow/normal */
                slideshow: 5000, /* false OR interval time in ms */
                autoplay_slideshow: false, /* true/false */
                opacity: 0.80, /* Value between 0 and 1 */
                show_title: true, /* true/false */
                allow_resize: false, /* Resize the photos bigger than viewport. true/false */
                default_width: 800,
                default_height: 344,
                counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
                theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
                horizontal_padding: 20, /* The padding on each side of the picture */
                hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
                wmode: 'opaque', /* Set the flash wmode attribute */
                autoplay: true, /* Automatically start videos: True/False */
                modal: false, /* If set to true, only the close button will close the window */
                deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
                overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
                keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
                changepicturecallback: function(){
                  $("body").css("overflow-y","hidden");
                }, /* Called everytime an item is shown/changed */
                callback: function(){
                  $("body").css("overflow-y","scroll");
                }, /* Called when prettyPhoto is closed */
                ie6_fallback: true,
                social_tools:''
              }); 
            }
            function overflowhide(){

            }
    </script>